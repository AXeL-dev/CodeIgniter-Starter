<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller
{
    // constr.
    function __construct()
    {
        parent::__construct();

        // load ion_auth library
        $this->load->library('ion_auth');

        // load languauge files
        $this->lang->load('admin');

        // load templates module
        $this->load->module('templates');
    }
    
    // functions
    
    function index()
    {
        if (! $this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        elseif (! $this->ion_auth->is_admin())
        {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }
        else
        {
            $data['title'] = $this->lang->line('dashboard');
            $data['view'] = 'admin/dashboard';
            $this->templates->_admin($data);
        }
    }
}