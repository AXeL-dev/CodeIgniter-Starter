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
            // load template
            $data['title'] = $this->lang->line('settings');
            $data['view'] = 'admin/settings';

            $this->templates->_admin($data);
        }
    }

    public function switch_menu()
    {
        if (is_admin($this))
        {
            $default_menu = $this->session->userdata('default_menu');
            $menu = $default_menu == 'thin' ? '' : 'thin';

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