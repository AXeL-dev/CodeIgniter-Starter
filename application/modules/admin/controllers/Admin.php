<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller
{
    // constr.
    public function __construct()
    {
        parent::__construct();

        // load ion_auth library
        $this->load->library('ion_auth');

        // load custom helper
        $this->load->helper('custom');

        // load templates module
        $this->load->module('templates');

        // load languauge files
        $this->lang->load('admin');
    }
    
    //================
    //  Url functions
    //================
    
    public function index()
    {
        if (is_admin($this))
        {
            // get statistic data from db
            $data['users_count'] = $this->db->query('SELECT id FROM users')->num_rows();

            // load template
            $data['title'] = $this->lang->line('dashboard');
            $data['view'] = 'admin/dashboard';

            $this->templates->_admin($data);
        }
    }

    public function settings()
    {
        if (is_admin($this))
        {
            // set data
            $data['settings'] = $this->_get_settings();
            $data['message'] = $this->session->flashdata('message');
            $data['message_type'] = $this->session->flashdata('message_type');

            // load template
            $data['title'] = $this->lang->line('settings');
            $data['view'] = 'admin/settings';

            $this->templates->_admin($data);
        }
    }

    public function save_settings()
    {
        if (is_admin($this))
        {
            $settings = array(
                            array('name'  => 'DASHBOARD_LEFTMENU',
                                  'value' => $this->input->post('dashboard_leftmenu')
                            ),

                            array('name'  => 'DASHBOARD_LEFTMENU_COLOR',
                                  'value' => $this->input->post('dashboard_leftmenu_color')
                            ),

                            array('name'  => 'DASHBOARD_TOPMENU_COLOR',
                                  'value' => $this->input->post('dashboard_topmenu_color')
                            )
                        );

            // delete old settings
            $this->db->truncate('settings');

            // insert new one(s)
            foreach ($settings as $row) {
                $this->db->insert('settings', $row);
            }

            // clear session data
            $this->session->unset_userdata('default_menu');
            $this->session->unset_userdata('leftmenu_color');
            $this->session->unset_userdata('topmenu_color');

            // set success message
            $this->session->set_flashdata('message', lang('settings_saved'));
            $this->session->set_flashdata('message_type', 'success');

            redirect('admin/settings');
        }
    }

    public function _get_settings()
    {
        $settings = array();

        $query = $this->db->get('settings');

        foreach($query->result() as $param) {
            $settings[$param->name] = $param->value;
        }

        return $settings;
    }

    public function switch_menu()
    {
        if (is_admin($this))
        {
            $default_menu = $this->session->userdata('default_menu');
            $menu = $default_menu == 'thin' ? 'default' : 'thin';

            $this->session->set_userdata('default_menu', $menu);

            redirect_back('admin');
        }
    }

    public function set_lang($abbr = '')
    {
        if (is_admin($this))
        {
            if (! empty($abbr))
            {
                // check if language abbreviation exists
                $query = $this->db->where('abbr', $abbr)->get('languages');

                if ($query->num_rows() > 0) {
                    // deactivate old activated language
                    $this->db->where('active', '1')->update('languages', array('active' => '0'));

                    // activate new language
                    $lang = $query->row();
                    $this->db->where('id', $lang->id)->update('languages', array('active' => '1'));

                    // set session data
                    $this->session->set_userdata('lang', $lang->name);
                }
            }
            
            redirect_back('admin');
        }
    }

    //===================
    // Non url functions
    //===================

    public function _get_languages()
    {
        return $this->db->get('languages')->result();
    }

    public function _get_active_lang()
    {
        return $this->db->where('active', '1')->get('languages')->row();
    }
}