<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_Model extends CI_Model
{
    // attr.
    protected $table = "tablename";
    
    // constr.
    public function __construct() {
        parent::__construct();
    }
    
    // functions
    
    // we may need this function to get the value of $table private attribute, if ever we need it outside of the model
    public function get_table() {
        return $this->table;
    }
    
    // Ex: SELECT * FROM tablename ORDER BY $order_by
    public function get($order_by, $selection = '*') {
        $this->db->select($selection);
        if (! empty($order_by)) {
            $this->db->order_by($order_by);
        }
        $query = $this->db->get($this->table);
        
        return $query;
    }
    
    // Ex: SELECT * FROM tablename ORDER BY $order_by LIMIT $offset, $limit
    public function get_with_limit($limit, $offset, $order_by) {
        $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query = $this->db->get($this->table);
        
        return $query;
    }
    
    // Ex: SELECT * FROM tablename WHERE id = $id
    public function get_where($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        
        return $query;
    }

    // Ex: SELECT * FROM tablename WHERE $col LIKE $value
    public function get_where_like($col, $value, $or_like = false) {
        if ($or_like) {
            $this->db->or_like($col, $value);
        }
        else {
            $this->db->like($col, $value);
        }
        $query = $this->db->get($this->table);
        
        return $query;
    }
    
    // Ex: SELECT * FROM tablename WHERE $where_array[key] = $where_array[value]
    public function get_where_array($where_array) {
        $this->db->where($where_array);
        $query = $this->db->get($this->table);
        
        return $query;
    }

    // Ex: SELECT $selection FROM tablename WHERE $col = $value ORDER BY $order_by LIMIT $offset, $limit
    public function get_where_custom($col, $value, $selection = '*', $limit = 0, $offset = 0, $order_by = '') {
        $this->db->select($selection);
        $this->db->where($col, $value);
        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        if (! empty($order_by)) {
            $this->db->order_by($order_by);
        }
        $query = $this->db->get($this->table);
        
        return $query;
    }
    
    // Ex: INSERT INTO tablename($data[key]) VALUES($data[value])
    public function _insert($data) {
        $this->db->insert($this->table, $data);
    }
    
    // Ex: UPDATE tablename SET $data[key] = $data[value] WHERE id = $id
    public function _update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    // Ex: UPDATE tablename SET $data[key] = $data[value] WHERE $where_array[key] = $where_array[value]
    public function _update_where($where_array, $data) {
        $this->db->where($where_array);
        $this->db->update($this->table, $data);
    }
    
    // Ex: DELETE FROM tablename WHERE id = $id
    public function _delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
    
    // Ex: SELECT COUNT(*) FROM tablename WHERE $column = $value
    public function count_where($column, $value) {
        $this->db->where($column, $value);
        $query = $this->db->get($this->table);
        $num_rows = $query->num_rows();
        
        return $num_rows;
    }

    // Ex: SELECT COUNT(*) FROM tablename WHERE $columns[0] = $values[0] OR $columns[1] = $values[1] ...
    /*public function count_where_custom($columns, $values, $conditions = array()) {
        foreach ($columns as $key => $column) {
            if ($key > 0 && isset($conditions[$key]) && strtolower($conditions[$key]) == 'or') {
                $this->db->or_where($column, $values[$key]);
            }
            else {
                $this->db->where($column, $values[$key]);
            }
        }
        $query = $this->db->get($this->table);
        $num_rows = $query->num_rows();
        
        return $num_rows;
    }*/
    
    // Ex: SELECT COUNT(*) FROM tablename
    public function count_all() {
        $query = $this->db->get($this->table);
        $num_rows = $query->num_rows();
        
        return $num_rows;
    }
    
    // Ex: SELECT MAX(id) FROM tablename
    public function get_max() {
        $this->db->select_max('id');
        $query = $this->db->get($this->table);
        $row = $query->row();
        $id = $row->id;
        
        return $id;
    }
    
    // Yes, this function seems useless, but i'll leave it here for the moment
    public function _custom_query($mysql_query) {
        $query = $this->db->query($mysql_query);
        
        return $query;
    }

    // Ex: SELECT * FROM my_table LEFT JOIN snd_table ON my_table.id = snd_table.id (ORDER BY $order_by)
    public function join($table_to_join, $join_on, $selection = '*', $order_by = '', $join_type = 'left')
    {
        $this->db->select($selection);
        $this->db->from($this->table);
        if (is_array($table_to_join) && is_array($join_on)) {
            $i = 0;
            foreach ($table_to_join as $table)
            {
                $this->db->join($table, $join_on[$i], $join_type);
                $i++;
            }
        }
        else {
            $this->db->join($table_to_join, $join_on, $join_type);
        }
        if (! empty($order_by)) {
            $this->db->order_by($order_by);
        }
        $query = $this->db->get();

        return $query;
    }

    // Ex: SELECT * FROM my_table LEFT JOIN snd_table ON my_table.id = snd_table.id WHERE $where_column = $where_value
    public function join_where($where_column, $where_value, $table_to_join, $join_on, $selection = '*', $join_type = 'left')
    {
        $this->db->select($selection);
        $this->db->from($this->table);
        if (is_array($table_to_join) && is_array($join_on)) {
            $i = 0;
            foreach ($table_to_join as $table)
            {
                $this->db->join($table, $join_on[$i], $join_type);
                $i++;
            }
        }
        else {
            $this->db->join($table_to_join, $join_on, $join_type);
        }
        $this->db->where($where_column, $where_value);
        $query = $this->db->get();

        return $query;
    }

    // Ex: SELECT * FROM my_table LEFT JOIN snd_table ON my_table.id = snd_table.id WHERE $where_column = $where_value
    public function join_where_array($where_array, $table_to_join, $join_on, $selection = '*', $join_type = 'left')
    {
        $this->db->select($selection);
        $this->db->from($this->table);
        if (is_array($table_to_join) && is_array($join_on)) {
            $i = 0;
            foreach ($table_to_join as $table)
            {
                $this->db->join($table, $join_on[$i], $join_type);
                $i++;
            }
        }
        else {
            $this->db->join($table_to_join, $join_on, $join_type);
        }
        $this->db->where($where_array);
        $query = $this->db->get();

        return $query;
    }

    // Ex: SELECT * FROM my_table LEFT JOIN snd_table ON my_table.id = snd_table.id (ORDER BY $order_by) LIMIT $offset, $limit
    public function join_with_limit($table_to_join, $join_on, $limit, $offset = 0, $selection = '*', $order_by = '', $join_type = 'left')
    {
        $this->db->select($selection);
        $this->db->from($this->table);
        if (is_array($table_to_join) && is_array($join_on)) {
            $i = 0;
            foreach ($table_to_join as $table)
            {
                $this->db->join($table, $join_on[$i], $join_type);
                $i++;
            }
        }
        else {
            $this->db->join($table_to_join, $join_on, $join_type);
        }
        $this->db->limit($limit, $offset);
        if (! empty($order_by)) {
            $this->db->order_by($order_by);
        }
        $query = $this->db->get();

        return $query;
    }

    // Ex: SELECT * FROM my_table LEFT JOIN snd_table ON my_table.id = snd_table.id WHERE $where_column = $where_value (ORDER BY $order_by) LIMIT $offset, $limit
    public function join_where_with_limit($where_column, $where_value, $table_to_join, $join_on, $limit, $offset = 0, $selection = '*', $order_by = '', $join_type = 'left')
    {
        $this->db->select($selection);
        $this->db->from($this->table);
        if (is_array($table_to_join) && is_array($join_on)) {
            $i = 0;
            foreach ($table_to_join as $table)
            {
                $this->db->join($table, $join_on[$i], $join_type);
                $i++;
            }
        }
        else {
            $this->db->join($table_to_join, $join_on, $join_type);
        }
        $this->db->where($where_column, $where_value);
        $this->db->limit($limit, $offset);
        if (! empty($order_by)) {
            $this->db->order_by($order_by);
        }
        $query = $this->db->get();

        return $query;
    }

    // Ex: SELECT * FROM my_table LEFT JOIN snd_table ON my_table.id = snd_table.id WHERE $where_column LIKE $where_value (ORDER BY $order_by) LIMIT $offset, $limit
    public function join_where_like_with_limit($where_column, $where_value, $table_to_join, $join_on, $limit, $offset = 0, $selection = '*', $order_by = '', $or_like = false, $join_type = 'left')
    {
        $this->db->select($selection);
        $this->db->from($this->table);
        if (is_array($table_to_join) && is_array($join_on)) {
            $i = 0;
            foreach ($table_to_join as $table)
            {
                $this->db->join($table, $join_on[$i], $join_type);
                $i++;
            }
        }
        else {
            $this->db->join($table_to_join, $join_on, $join_type);
        }
        if ($or_like) {
            $this->db->or_like($where_column, $where_value);
        }
        else {
            $this->db->like($where_column, $where_value);
        }
        $this->db->limit($limit, $offset);
        if (! empty($order_by)) {
            $this->db->order_by($order_by);
        }
        $query = $this->db->get();

        return $query;
    }
}
