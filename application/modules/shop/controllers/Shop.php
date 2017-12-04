<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MX_Controller
{
    // constr.
    public function __construct()
    {
        parent::__construct();

        // load ion_auth library
        $this->load->library('ion_auth');

        // load templates module
        $this->load->module('templates');

        // load language files
        $this->lang->load('shop');
    }
    
    // functions
    
    public function index()
    {
        $data['title'] = $this->lang->line('home');
        $data['view'] = 'shop/home';

        $this->templates->_shop($data);
    }

    public function contact()
    {
        $data['title'] = $this->lang->line('contact');
        $data['view'] = 'shop/contact';

        $this->templates->_shop($data);
    }
}