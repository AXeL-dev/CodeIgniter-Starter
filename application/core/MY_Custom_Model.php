<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Custom_Model extends CI_Model
{
    // attr.
    private $table = "tablename";
    
    // constr.
    function __construct() {
        parent::__construct();
    }
    
    // functions
    
    // we may need this function to get the value of $table private attribute, if ever we need it outside of the model
    function get_table() {
        return $this->table;
    }
    
    // Ex: SELECT * FROM tablename ORDER BY $order_by
    function get($order_by) {
        $this->db->order_by($order_by);
        $query = $this->db->get($this->table);
        
        return $query;
    }
    
    // Ex: SELECT * FROM tablename ORDER BY $order_by LIMIT $offset, $limit
    function get_with_limit($limit, $offset, $order_by) {
        $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query = $this->db->get($this->table);
        
        return $query;
    }
    
    // Ex: SELECT * FROM tablename WHERE id = $id
    function get_where($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        
        return $query;
    }
    
    // Ex: SELECT * FROM tablename WHERE $col = $value
    function get_where_custom($col, $value) {
        $this->db->where($col, $value);
        $query = $this->db->get($this->table);
        
        return $query;
    }
    
    // Ex: INSERT INTO tablename($data[key]) VALUES($data[value])
    function _insert($data) {
        $this->db->insert($this->table, $data);
    }
    
    // Ex: UPDATE tablename SET $data[key] = $data[value] WHERE id = $id
    function _update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
    
    // Ex: DELETE FROM tablename WHERE id = $id
    function _delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
    
    // Ex: SELECT COUNT(*) FROM tablename WHERE $column = $value
    function count_where($column, $value) {
        $this->db->where($column, $value);
        $query = $this->db->get($this->table);
        $num_rows = $query->num_rows();
        
        return $num_rows;
    }
    
    // Ex: SELECT COUNT(*) FROM tablename
    function count_all() {
        $query = $this->db->get($this->table);
        $num_rows = $query->num_rows();
        
        return $num_rows;
    }
    
    // Ex: SELECT MAX(id) FROM tablename
    function get_max() {
        $this->db->select_max('id');
        $query = $this->db->get($this->table);
        $row = $query->row();
        $id = $row->id;
        
        return $id;
    }
    
    // Yes, this function seems useless, but i'll leave it here for the moment
    function _custom_query($mysql_query) {
        $query = $this->db->query($mysql_query);
        
        return $query;
    }
}
