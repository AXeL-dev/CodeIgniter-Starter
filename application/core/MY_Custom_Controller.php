<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Custom_Controller extends MX_Controller
{
	// attr.
	private $model = 'modelname'; // @! Model class name & file name must start with uppercase

    // constr.
    function __construct() {
        parent::__construct();

        $this->load->model($this->model);
    }
    
    // functions

    function get($order_by) {
        $query = $this->{$this->model}->get($order_by);
        
        return $query;
    }
    
    function get_with_limit($limit, $offset, $order_by) {
        $query = $this->{$this->model}->get_with_limit($limit, $offset, $order_by);
        
        return $query;
    }
    
    function get_where($id) {
        $query = $this->{$this->model}->get_where($id);
        
        return $query;
    }
    
    function get_where_custom($col, $value) {
        $query = $this->{$this->model}->get_where_custom($col, $value);
        
        return $query;
    }
    
    function _insert($data) {
        $this->{$this->model}->_insert($data);
    }
    
    function _update($id, $data) {
        $this->{$this->model}->_update($id, $data);
    }
    
    function _delete($id) {
        $this->{$this->model}->_delete($id);
    }
    
    function count_where($column, $value) {
        $count = $this->{$this->model}->count_where($column, $value);
        
        return $count;
    }

    function count_all() {
        $count = $this->{$this->model}->count_all();
        
        return $count;
    }
    
    function get_max() {
        $max_id = $this->{$this->model}->get_max();
        
        return $max_id;
    }
    
    function _custom_query($mysql_query) {
        $query = $this->{$this->model}->_custom_query($mysql_query);
        
        return $query;
    }
}