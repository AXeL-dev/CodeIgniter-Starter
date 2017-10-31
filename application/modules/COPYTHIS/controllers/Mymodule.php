<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModule extends MY_Custom_Controller
{
	// attr.
	private $model = 'Mdl_mymodel';
	
    // constr.
    function __construct() {
        parent::__construct();
    }
    
    // functions
    
    function index() {
        echo "index function executed!";
    }
}