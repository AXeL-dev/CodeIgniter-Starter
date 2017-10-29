<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends MX_Controller
{
    // constr.
    function __construct()
    {
        parent::__construct();

        // load languauge files
        $this->lang->load(array('auth', 'admin')); // not needed if already loaded
    }
    
    // functions
    
    // load semantic template
    function _semantic($data = array())
    {
        $data['title'] = '';
        $this->load->view('semantic_template', $data);
    }
    
    // load admin template
    // @! Use data['view'] to send the full view name (including module name) or $data['view_name'] to send the view name only
    function _admin($data = array(), $returnhtml = false)
    {
        // set default data
        if (! isset($data['title'])) {
            $data['title'] = $this->lang->line('admin_panel');
        }

        if (! isset($data['view']) && isset($data['view_name'])) {
            $view_module = $this->uri->segment(1);
            $data['view'] = $view_module.'/'.$data['view_name'];
        }

        $view_html = $this->load->view('admin_template', $data, $returnhtml);

        if ($returnhtml) return $view_html; // will return html on 2nd argument being true
    }

    // load authentication template
    // @! Use data['view'] to send the full view name (including module name) or $data['view_name'] to send the view name only
    function _auth($data = array(), $returnhtml = false)
    {
        // set default data
        if (! isset($data['title'])) {
            $data['title'] = '';
        }

        if (! isset($data['view']) && isset($data['view_name'])) {
            $view_module = $this->uri->segment(1);
            $data['view'] = $view_module.'/'.$data['view_name'];
        }

        $view_html = $this->load->view('auth_template', $data, $returnhtml);

        if ($returnhtml) return $view_html; // will return html on 2nd argument being true
    }
}