<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_Controller extends MX_Controller
{
	// attr.
	protected $model = 'Modelname'; // @! Model class name & file name must start with uppercase
    protected $fields = array();
    protected $upload_path = 'public/uploads';
    protected $default_image = '';
    // TODO: add support for uploading more files type in create & update functions (only images are supported currently)

    // const.
    const DATE_STRING_FORMAT = 'd/m/Y';
    const DATETIME_STRING_FORMAT = 'd/m/Y H:i';

    // constr.
    public function __construct() {
        parent::__construct();

        //$this->load->model($this->model); // Don't use this here, but use it on each inherits controller constructor

        // load ion_auth & custom libraries
        $this->load->library(array('ion_auth', 'custom'));

        // load custom helper
        $this->load->helper('custom');

        // load templates module
        $this->load->module('templates');
    }

    // getters

    public function _get_upload_path()
    {
        return $this->upload_path;
    }
    
    public function _get_default_image()
    {
        return $this->default_image;
    }
    
    // functions

    public function _get($order_by, $selection = '*') {
        $query = $this->{$this->model}->get($order_by, $selection);
        
        return $query;
    }
    
    public function _get_with_limit($limit, $offset, $order_by) {
        $query = $this->{$this->model}->get_with_limit($limit, $offset, $order_by);
        
        return $query;
    }
    
    public function _get_where($id) {
        $query = $this->{$this->model}->get_where($id);
        
        return $query;
    }

    public function _get_where_like($col, $value, $or_like = false) {
        $query = $this->{$this->model}->get_where_like($col, $value, $or_like);
        
        return $query;
    }

    public function _get_where_array($where_array) {
        $query = $this->{$this->model}->get_where_array($where_array);
        
        return $query;
    }
    
    public function _get_where_custom($col, $value, $selection = '*', $limit = 0, $offset = 0, $order_by = '') {
        $query = $this->{$this->model}->get_where_custom($col, $value, $selection, $limit, $offset, $order_by);
        
        return $query;
    }
    
    public function _insert($data) {
        $this->{$this->model}->_insert($data);
    }
    
    public function _update($id, $data) {
        $this->{$this->model}->_update($id, $data);
    }

    public function _update_where($where_array, $data) {
        $this->{$this->model}->_update_where($where_array, $data);
    }
    
    public function _delete($id) {
        $this->{$this->model}->_delete($id);
    }
    
    public function _count_where($column, $value) {
        $count = $this->{$this->model}->count_where($column, $value);
        
        return $count;
    }

    /*public function _count_where_custom($columns, $values, $conditions = array()) {
        $count = $this->{$this->model}->count_where_custom($columns, $values, $conditions);
        
        return $count;
    }*/

    public function _count_all() {
        $count = $this->{$this->model}->count_all();
        
        return $count;
    }
    
    public function _get_max() {
        $max_id = $this->{$this->model}->get_max();
        
        return $max_id;
    }
    
    public function _custom_query($mysql_query) {
        $query = $this->{$this->model}->_custom_query($mysql_query);
        
        return $query;
    }

    public function _join($table_to_join, $join_on, $selection = '*', $order_by = '', $join_type = 'left') {
        $query = $this->{$this->model}->join($table_to_join, $join_on, $selection, $order_by, $join_type);
        
        return $query;
    }

    public function _join_where($where_column, $where_value, $table_to_join, $join_on, $selection = '*', $join_type = 'left') {
        $query = $this->{$this->model}->join_where($where_column, $where_value, $table_to_join, $join_on, $selection, $join_type);
        
        return $query;
    }

    public function _join_where_array($where_array, $table_to_join, $join_on, $selection = '*', $join_type = 'left') {
        $query = $this->{$this->model}->join_where_array($where_array, $table_to_join, $join_on, $selection, $join_type);
        
        return $query;
    }

    public function _join_with_limit($table_to_join, $join_on, $limit, $offset = 0, $selection = '*', $order_by = '', $join_type = 'left') {
        $query = $this->{$this->model}->join_with_limit($table_to_join, $join_on, $limit, $offset, $selection, $order_by, $join_type);
        
        return $query;
    }

    public function _join_where_with_limit($where_column, $where_value, $table_to_join, $join_on, $limit, $offset = 0, $selection = '*', $order_by = '', $join_type = 'left') {
        $query = $this->{$this->model}->join_where_with_limit($where_column, $where_value, $table_to_join, $join_on, $limit, $offset, $selection, $order_by, $join_type);
        
        return $query;
    }

    public function _join_where_like_with_limit($where_column, $where_value, $table_to_join, $join_on, $limit, $offset = 0, $selection = '*', $order_by = '', $or_like = false, $join_type = 'left') {
        $query = $this->{$this->model}->join_where_like_with_limit($where_column, $where_value, $table_to_join, $join_on, $limit, $offset, $selection, $order_by, $or_like, $join_type);
        
        return $query;
    }

    //======================
    //   data functions
    //======================

    // initialise data fields with empty string ''
    public function _initialise_data($fields, $format = true) {
        $data = array(); // initialisation

        foreach ($fields as $field) {
            $fieldname = is_array($field) ? $field['name'] : $field;

            $data[$fieldname] = '';
        }

        return $format ? $this->_format_data($data, $fields) : $data;
    }

    // fetch data fields from post
    public function _fetch_data_from_post($fields, $format = true, $auto_convert = false) {
        $data = array(); // initialisation

        foreach ($fields as $field) {
            $fieldname = is_array($field) ? $field['name'] : $field;

            $data[$fieldname] = $this->input->post($fieldname, true);

            // doing some convertion if asked for
            if ($auto_convert && is_array($field) && isset($field['type']))
            {
                switch ($field['type'])
                {
                    case 'timestamp': // convert date string => (to) timestamp
                        if (! is_numeric($data[$fieldname])) {
                            $date_string = substr(Custom_Controller::DATE_STRING_FORMAT, 0, 1) == 'd' ? str_replace('/', '-', $data[$fieldname]) : $data[$fieldname]; // convert to the European format (for strtotime function)
                            $data[$fieldname] = strtotime($date_string);
                        }
                        break;
                }
            }
        }

        return $format ? $this->_format_data($data, $fields) : $data;
    }

    // fetch data fields from database
    public function _fetch_data_from_db($fields, $id, $format = true, $auto_convert = false) {
        $data = array();

        if(is_numeric($id) && $id > 0) {
            $query = $this->_get_where($id);

            foreach ($query->result() as $row) {
                foreach ($fields as $field) {
                    $fieldname = is_array($field) ? $field['name'] : $field;

                    $data[$fieldname] = $row->$fieldname;

                    // doing some convertion if asked for
                    if ($auto_convert && is_array($field) && isset($field['type']))
                    {
                        switch ($field['type'])
                        {
                            case 'timestamp': // convert timestamp => (to) date string
                                if (is_numeric($data[$fieldname])) {
                                    $data[$fieldname] = date(Custom_Controller::DATE_STRING_FORMAT, $data[$fieldname]);
                                }
                                break;
                        }
                    }
                }
            }
        }

        if (empty($data)) {
            return $this->_initialise_data($fields);
        }
        
        return $format ? $this->_format_data($data, $fields) : $data;
    }

    // format data fields to simplify use on form_xxx functions
    public function _format_data($data, $fields, $ignore_fields = array()) {
        $formatted_data = array();

        // ensure that $data is not empty
        if (is_array($data) && ! empty($data))
        {
            foreach ($fields as $field) {
                $fieldname = is_array($field) ? $field['name'] : $field;

                if (! empty($ignore_fields) && in_array($fieldname, $ignore_fields)) {
                    continue;
                }

                $formatted_data[$fieldname] = array(
                    'name'  => $fieldname,
                    'id'    => $fieldname,
                    'value' => $data[$fieldname]
                );
            }
        }
        
        return $formatted_data;
    }

    // validate data fields
    public function _validate_data($fields, $translate_labels = true) {
        // load form validation library
        $this->load->library('form_validation');

        // validate fields
        foreach ($fields as $field) {
            if (is_array($field) && ! empty($field['validation_rules'])) {
                $fieldlabel = $translate_labels ? $this->lang->line($field['label']) : $field['label'];

                $this->form_validation->set_rules($field['name'], $fieldlabel, $field['validation_rules']);
            }
        }

        return $this->form_validation->run();
    }

    //======================
    //   CRUD functions
    //======================

    // custom read function: list_with_pagination
    public function _custom_list_with_pagination($query, $object_name, $view, $title, $pagination_base_url, $pagination_limit, $template_name = '_admin', $allow_access_for_non_admin = false, $total_rows = -1, $pagination_template = 'default')
    {
        if ($allow_access_for_non_admin || is_admin($this))
        {
            // load pagination library (if not loaded)
            if(! $this->load->is_loaded('custom_pagination'))
            {
                 $this->load->library('custom_pagination');
            }

            // set data list from db
            $data[$object_name] = $query->result();

            // set data message
            $data['message'] = $this->session->flashdata('message');
            $data['message_type'] = $this->session->flashdata('message_type');

            // set pagination data
            $pagination_data['target_base_url'] = base_url($pagination_base_url);
            $pagination_data['total_rows'] = $total_rows == -1 ? $this->_count_all() : $total_rows;
            $pagination_data['offset_segment'] = $this->custom_pagination->get_default_offset_segment();
            $pagination_data['limit'] = $pagination_limit;

            // generate pagination
            $data['pagination'] = $this->custom_pagination->generate($pagination_data, $pagination_template);
            $data['showing_statement'] = $this->custom_pagination->get_showing_statement($pagination_data['total_rows'], $this->custom_pagination->get_offset(), $pagination_limit);

            // load template
            $data['title'] = $title;
            $data['view'] = $view;

            $this->templates->$template_name($data);
        }
    }

    // custom function: create
    // @! leave $image_input_name empty if you don't have an image to upload
    public function _custom_create($view, $success_message, $redirect_url, $title, $more_data = array(), $template_name = '_admin', $image_input_name = '', $thumbnail_input_name = '', $allow_access_for_non_admin = false, $force_redirect_to_url = false)
    {
        if ($allow_access_for_non_admin || is_admin($this))
        {
            $form_submitted = ! is_null($this->input->post('submit')) ? true : false;

            if ($form_submitted) // validate create
            {
                // validate form
                if ($this->_validate_data($this->fields)) {

                    // fetch data from post (without formatting + with auto convert)
                    $data = $this->_fetch_data_from_post($this->fields, false, true);
                    // set more data
                    foreach ($more_data as $key => $value) {
                        $data[$key] = $value;
                    }

                    // upload image if exists/choosed
                    if (! empty($image_input_name)) {
                        $upload_results = $this->custom->upload_image($this->upload_path, $image_input_name);
                        $data[$image_input_name] = $upload_results == -1 ? '' : $upload_results;
                        if (! empty($thumbnail_input_name)) {
                            $data[$thumbnail_input_name] = $this->custom->get_thumbnail_name($data[$image_input_name]);
                        }
                    }

                    // if no picture selected or no upload errors
                    if (empty($image_input_name) || empty($_FILES[$image_input_name]['name']) || $upload_results != -1)
                    {
                        // create
                        $this->_insert($data);
                        // redirection
                        $id = $this->_get_max();
                        $this->session->set_flashdata('message', $success_message);
                        $this->session->set_flashdata('message_type', 'success');
                        
                        redirect(sprintf($redirect_url, $id));
                    }
                    else
                    {
                        // fetch data from post (with formatting this time)
                        $data = $this->_fetch_data_from_post($this->fields);
                    }
                }
                else {
                    // fetch data from post
                    $data = $this->_fetch_data_from_post($this->fields);
                }
            }
            else // create form
            {
                // initialise data
                $data = $this->_initialise_data($this->fields);
            }

            // forced redirection
            if ($force_redirect_to_url) {
                $this->session->set_flashdata('message', validation_errors('<li>', '</li>'));
                $this->session->set_flashdata('message_type', 'error');
                redirect($redirect_url);
            }
            
            // set the flash data error message if there is one
            $data['message'] = (validation_errors()) ? validation_errors('<li>', '</li>') : $this->session->flashdata('message');
            $data['message_type'] = $this->session->flashdata('message_type');

            // load template
            $data['title'] = $title;
            $data['view'] = $view;

            $this->templates->$template_name($data);
        }
    }

    // short create function
    public function _validate_create($redirect_url, $more_data = array(), $success_message = '')
    {
        // validate form
        if ($this->_validate_data($this->fields)) {

            // fetch data from post (without formatting + with auto convert)
            $data = $this->_fetch_data_from_post($this->fields, false, true);
            // set more data
            foreach ($more_data as $key => $value) {
                $data[$key] = $value;
            }

            // create
            $this->_insert($data);

            $this->session->set_flashdata('message', $success_message);
            $this->session->set_flashdata('message_type', 'success');
            
            redirect($redirect_url);
        }
        else {
            // fetch data from post
            $data = $this->_fetch_data_from_post($this->fields);

            $this->session->set_flashdata('message', validation_errors('<li>', '</li>'));
            $this->session->set_flashdata('message_type', 'error');
        }

        // redirection
        redirect($redirect_url);
    }

    // custom function: update
    // @! leave $image_input_name empty if you don't have an image to upload
    // @! $fields parameter added here to give us the possibility of adding more validation rules & apply them on update only
    public function _custom_update($fields, $id, $view, $redirect_url, $success_message, $error_message, $title, $more_data_to_show = array(), $more_data_to_update = array(), $template_name = '_admin', $image_input_name = '', $thumbnail_input_name = '', $allow_access_for_non_admin = false, $force_redirect_to_url = false)
    {
        if ($allow_access_for_non_admin || is_admin($this))
        {
            $update_allowed = is_numeric($id) && $id > 0 ? true : false;

            if ($update_allowed)
            {
                $form_submitted = ! is_null($this->input->post('submit')) ? true : false;

                if ($form_submitted) // validate update
                {
                    // validate form
                    if ($this->_validate_data($fields)) {

                        // fetch data from post (without formatting + with auto convert)
                        $data = $this->_fetch_data_from_post($fields, false, true);
                        // set more data (to update)
                        foreach ($more_data_to_update as $key => $value) {
                            $data[$key] = $value;
                        }

                        // check if the id exists
                        $id_exists = $this->_count_where('id', $id) > 0 ? true : false;

                        // if id exists (to avoid uploading image for a non existing post)
                        // + there is no image (to avoid deleting the current image)
                        if ($id_exists && ! empty($image_input_name) && empty($data[$image_input_name])) {
                            // try to upload image if exists/choosed
                            $upload_results = $this->custom->upload_image($this->upload_path, $image_input_name);
                            $data[$image_input_name] = $upload_results == -1 ? '' : $upload_results;
                            if (! empty($thumbnail_input_name)) {
                                $data[$thumbnail_input_name] = $this->custom->get_thumbnail_name($data[$image_input_name]);
                            }
                        }
                        else {
                            $upload_results = 0; // initialisation (must be != from -1)
                        }

                        // if no picture selected or no upload errors
                        if (empty($image_input_name) || empty($_FILES[$image_input_name]['name']) || $upload_results != -1)
                        {
                            // update
                            if ($id_exists) {
                                $this->_update($id, $data);
                                $this->session->set_flashdata('message', $success_message);
                                $this->session->set_flashdata('message_type', 'success');
                            }
                            else {
                                $this->session->set_flashdata('message', $error_message);
                            }
                        }

                        // redirection
                        redirect(sprintf($redirect_url, $id));
                    }
                    else {
                        // fetch data from post
                        $data = $this->_fetch_data_from_post($fields);
                    }
                }
                else // update form
                {
                    // fetch data from db (with formatting + auto convert)
                    $data = $this->_fetch_data_from_db($fields, $id, true, true);
                }

                // forced redirection
                if ($force_redirect_to_url) {
                    $this->session->set_flashdata('message', validation_errors('<li>', '</li>'));
                    $this->session->set_flashdata('message_type', 'error');
                    redirect($redirect_url);
                }

                // set the flash data error message if there is one
                $data['message'] = (validation_errors()) ? validation_errors('<li>', '</li>') : $this->session->flashdata('message');
                $data['message_type'] = $this->session->flashdata('message_type');

                // set more data (to send to view)
                foreach ($more_data_to_show as $key => $value) {
                    $data[$key] = $value;
                }

                // load template
                $data['title'] = $title;
                $data['view'] = $view;

                $this->templates->$template_name($data);
            } // end if ($update_allowed)
        }
    }

    // short udpate function
    public function _validate_update($id, $redirect_url, $more_data_to_update = array(), $success_message = '', $error_message = '', $fields = array())
    {
        $update_allowed = is_numeric($id) && $id > 0 ? true : false;

        if ($update_allowed)
        {
            // use Class fields attribute if $fields is empty
            $fields = empty($fields) ? $this->fields : $fields;

            // validate form
            if ($this->_validate_data($fields)) {

                // fetch data from post (without formatting + with auto convert)
                $data = $this->_fetch_data_from_post($fields, false, true);
                // set more data (to update)
                foreach ($more_data_to_update as $key => $value) {
                    $data[$key] = $value;
                }

                // check if the id exists
                $id_exists = $this->_count_where('id', $id) > 0 ? true : false;

                // update
                if ($id_exists) {
                    $this->_update($id, $data);
                    $this->session->set_flashdata('message', $success_message);
                    $this->session->set_flashdata('message_type', 'success');
                }
                else {
                    $this->session->set_flashdata('message', $error_message);
                }
            }
            else {
                // fetch data from post
                $data = $this->_fetch_data_from_post($fields);

                $this->session->set_flashdata('message', validation_errors('<li>', '</li>'));
                $this->session->set_flashdata('message_type', 'error');
            }

            // redirection
            redirect($redirect_url);

        } // end if ($update_allowed)
    }

    // custom function: delete
    // @! leave $image_field_name empty if you don't have an image field in your table
    public function _custom_delete($id, $redirect_url, $success_message, $error_message, $image_field_name = '', $allow_access_for_non_admin = false)
    {
        if ($allow_access_for_non_admin || is_admin($this))
        {
            $delete_allowed = is_numeric($id) && $id > 0 ? true : false;

            if ($delete_allowed)
            {
                // delete
                if ($this->_count_where('id', $id) > 0) { // check if the id exists

                    // delete image files if exists
                    if (! empty($image_field_name)) {
                        // get data from database (without formatting)
                        $data = $this->_fetch_data_from_db(array($image_field_name), $id, false);
                        $this->custom->delete_image($this->upload_path, $data[$image_field_name]);
                    }

                    $this->_delete($id);
                    $this->session->set_flashdata('message', $success_message);
                    $this->session->set_flashdata('message_type', 'success');
                }
                else {
                    $this->session->set_flashdata('message', $error_message);
                }

                // redirection
                redirect_back($redirect_url);
            } // end if ($delete_allowed)
        }
    }

    // custom function: delete_image
    // @! use $thumbnail_field_name if you have a second image field in your table (example: mytable.small_image)
    public function _custom_delete_image($id, $redirect_url, $success_message, $error_message, $image_field_name, $thumbnail_field_name = '')
    {
        if (is_admin($this))
        {
            $delete_allowed = is_numeric($id) && $id > 0 ? true : false;

            if ($delete_allowed)
            {
                // check if the id exists
                if ($this->_count_where('id', $id) > 0)
                {
                    // get data from database (without formatting)
                    $data = $this->_fetch_data_from_db(array($image_field_name), $id, false);
                    $delete_result = $this->custom->delete_image($this->upload_path, $data[$image_field_name]);

                    // if success
                    if ($delete_result > 0) {
                        // update table row
                        $data[$image_field_name] = '';
                        if (! empty($thumbnail_field_name)) {
                            $data[$thumbnail_field_name] = '';
                        }
                        $this->_update($id, $data);
                        $this->session->set_flashdata('message', $success_message);
                        $this->session->set_flashdata('message_type', 'success');
                    }
                    else {
                        $this->session->set_flashdata('message', $error_message);
                    }
                }

                // redirection
                redirect(sprintf($redirect_url, $id));
            } // end if ($delete_allowed)
        }
    }
}