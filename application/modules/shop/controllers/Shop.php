<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MX_Controller
{
    // constr.
    function __construct() {
        parent::__construct();

        // load ion_auth library
        $this->load->library('ion_auth');

        // load language files
        $this->lang->load('shop');

        // load templates module
        $this->load->module('templates');
    }
    
    // functions
    
    function index() {
        $data['title'] = $this->lang->line('home');
        $data['view'] = 'shop/home';

        $this->templates->_shop($data);
    }
}