<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModule extends Custom_Controller
{
	// attr.
	protected $model = 'Mdl_mymodel';
    // @! you must define $upload_path & $default_image attributes if you're going to upload something (image for example)
    protected $upload_path   = 'public/uploads';
    protected $default_image = '';//'rsc/not-available.jpg';
    // fields to fetch from post/db or to validate
    // @! leave validation_rules empty if you don't want to validate the field
    // @! add 'type' => 'timestamp' to auto convert your date field to timestamp & vice versa
    protected $fields = array(
        array('name' => 'myfield',
              'label' => 'myfield_label',
              'validation_rules' => 'required|max_length[255]')
    );
	
    // constr.
    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model($this->model);

        // load language file
        //$this->lang->load('myfile');
    }
    
    // functions
    
    public function index()
    {
        echo "index function executed!";
    }
}