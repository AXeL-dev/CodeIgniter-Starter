<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends MX_Controller
{
    // constr.
    public function __construct()
    {
        parent::__construct();

        // load default/active language
        $session_lang = $this->session->userdata('lang');

        if (empty($session_lang)) {
            $active_lang = Modules::run('admin/_get_active_lang');
            $lang = $active_lang->name;
            $this->session->set_userdata('lang', $lang); // set session data
        }
        else {
            $lang = $session_lang;
        }

        if ($this->config->item('language') != $lang) {
            
            $this->config->set_item('language', $lang);
        }

        // load languauge files
        $this->lang->load('auth'); // !@! auth lang file is needed on the most of templates

        // load custom helper
        $this->load->helper('custom');
    }
    
    // functions

    // load shop/main template
    public function _shop($data = array(), $returnhtml = false)
    {
        // load lang files
        $this->lang->load('shop');

        // set default title (used when title is not already setted)
        $template_default_title = $this->lang->line('home');

        $view_html = $this->_load_template('shop_template', $template_default_title, $data, $returnhtml);

        if ($returnhtml) return $view_html; // will return html on 2nd argument being true
    }
    
    // load admin template
    public function _admin($data = array(), $returnhtml = false)
    {
        // load lang files
        $this->lang->load('admin'); // not needed if already loaded

        // set default title (used when title is not already setted)
        $template_default_title = $this->lang->line('admin_panel');

        $view_html = $this->_load_template('admin_template', $template_default_title, $data, $returnhtml);

        if ($returnhtml) return $view_html; // will return html on 2nd argument being true
    }

    // load authentication template
    public function _auth($data = array(), $returnhtml = false)
    {
        // set default title (used when title is not already setted)
        $template_default_title = $this->lang->line('login_heading');

        $view_html = $this->_load_template('auth_template', $template_default_title, $data, $returnhtml);

        if ($returnhtml) return $view_html; // will return html on 2nd argument being true
    }

    // load specific template
    // @! Use data['view'] to send the full view name (including module name) or $data['view_name'] to send the view name only
    private function _load_template($template_name, $template_default_title, $data = array(), $returnhtml = false)
    {
        // set default meta data
        if (! isset($data['meta_keywords'])) {
            $data['meta_keywords'] = get_default_meta_keywords();
        }

        if (! isset($data['meta_description'])) {
            $data['meta_description'] = get_default_meta_description();
        }

        if (! isset($data['meta_author'])) {
            $data['meta_author'] = get_default_meta_author();
        }

        // set default data
        if (! isset($data['title'])) {
            $data['title'] = $template_default_title;
        }

        if (! isset($data['view']) && isset($data['view_name'])) {
            $view_module = $this->uri->segment(1);
            $data['view'] = $view_module.'/'.$data['view_name'];
        }

        // set additional css & js
        $data['more_css'] = get_more_css($data['view']);
        $data['more_js']  = get_more_js($data['view']);

        // load the view
        $view_html = $this->load->view($template_name, $data, $returnhtml);

        if ($returnhtml) return $view_html; // will return html on 4th argument being true
    }
}