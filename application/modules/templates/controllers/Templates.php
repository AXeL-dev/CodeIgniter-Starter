<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends MX_Controller
{
    // constr.
    function __construct()
    {
        parent::__construct();

        // load languauge files
        // auth lang file is needed on most templates
        $this->lang->load('auth');
    }
    
    // functions

    // load shop/main template
    function _shop($data = array(), $returnhtml = false)
    {
        // load lang file
        $this->lang->load('shop');

        // set default title (used when title is not already setted)
        $template_default_title = $this->lang->line('home');

        $view_html = $this->_load_template('shop_template', $template_default_title, $data, $returnhtml);

        if ($returnhtml) return $view_html; // will return html on 2nd argument being true
    }
    
    // load admin template
    function _admin($data = array(), $returnhtml = false)
    {
        // load lang file
        $this->lang->load('admin'); // not needed if already loaded

        // set default title (used when title is not already setted)
        $template_default_title = $this->lang->line('admin_panel');

        $view_html = $this->_load_template('admin_template', $template_default_title, $data, $returnhtml);

        if ($returnhtml) return $view_html; // will return html on 2nd argument being true
    }

    // load authentication template
    function _auth($data = array(), $returnhtml = false)
    {
        // set default title (used when title is not already setted)
        $template_default_title = $this->lang->line('login_heading');

        $view_html = $this->_load_template('auth_template', $template_default_title, $data, $returnhtml);

        if ($returnhtml) return $view_html; // will return html on 2nd argument being true
    }

    // load specified template
    // @! Use data['view'] to send the full view name (including module name) or $data['view_name'] to send the view name only
    function _load_template($template_name, $template_default_title, $data = array(), $returnhtml = false)
    {
        // set default data
        if (! isset($data['title'])) {
            $data['title'] = $template_default_title;
        }

        if (! isset($data['view']) && isset($data['view_name'])) {
            $view_module = $this->uri->segment(1);
            $data['view'] = $view_module.'/'.$data['view_name'];
        }

        // load the view
        $view_html = $this->load->view($template_name, $data, $returnhtml);

        if ($returnhtml) return $view_html; // will return html on 4th argument being true
    }
}