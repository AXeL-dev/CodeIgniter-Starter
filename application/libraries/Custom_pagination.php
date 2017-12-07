<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Custom_pagination
{
	// attr.
	private $CI;

	// const.
	const DEFAULT_LIMIT = 10;
	const OFFSET_SEGMENT = 3;

	// constr.
    function __construct()
    {
        // Assign by reference with "&" so we don't create a copy
        $this->CI =& get_instance();

        // load pagination library
        $this->CI->load->library('pagination');
    }

	// generate pagination using a specific template
    public function generate($data, $template = 'default')
    {
        switch ($template) {
            case 'custom':
                $settings = $this->get_custom_settings();
                break;
            
            default:
                $settings = $this->get_default_settings();
                break;
        }

        $config['base_url'] = $data['target_base_url'];
        $config['total_rows'] = $data['total_rows'];
        $config['uri_segment'] = $data['offset_segment'];

        $config['per_page'] = $data['limit'];
        $config['num_links'] = $settings['num_links'];
        $config['attributes'] = $settings['attributes'];

        $config['full_tag_open'] = $settings['full_tag_open'];
        $config['full_tag_close'] = $settings['full_tag_close'];

        $config['cur_tag_open'] = $settings['cur_tag_open'];
        $config['cur_tag_close'] = $settings['cur_tag_close'];

        $config['num_tag_open'] = $settings['num_tag_open'];
        $config['num_tag_close'] = $settings['num_tag_close'];

        $config['first_link'] = $settings['first_link'];
        $config['first_tag_open'] = $settings['first_tag_open'];
        $config['first_tag_close'] = $settings['first_tag_close'];

        $config['last_link'] = $settings['last_link'];
        $config['last_tag_open'] = $settings['last_tag_open'];
        $config['last_tag_close'] = $settings['last_tag_close'];

        $config['prev_link'] = $settings['prev_link'];
        $config['prev_tag_open'] = $settings['prev_tag_open'];
        $config['prev_tag_close'] = $settings['prev_tag_close'];

        $config['next_link'] = $settings['next_link'];
        $config['next_tag_open'] = $settings['next_tag_open'];
        $config['next_tag_close'] = $settings['next_tag_close'];

        $config['reuse_query_string'] = true;

        $this->CI->pagination->initialize($config);
        return $this->CI->pagination->create_links();
    }

    // return default template settings
    public function get_default_settings()
    {
        $settings['num_links'] = 10;
        $settings['attributes'] = array('class' => 'item icon');

        $settings['full_tag_open'] = '<div class="ui pagination menu">';
        $settings['full_tag_close'] = '</div>';

        $settings['num_tag_open'] = '';
        $settings['num_tag_close'] = '';

        $settings['cur_tag_open'] = '<div class="active item">';
        $settings['cur_tag_close'] = '</div>';

        $settings['next_link'] = '<i class="right chevron icon"></i>';
        $settings['next_tag_open'] = '';
        $settings['next_tag_close'] = '';

        $settings['prev_link'] = '<i class="left chevron icon"></i>';
        $settings['prev_tag_open'] = '';
        $settings['prev_tag_close'] = '';

        $settings['first_link'] = false;
        $settings['first_tag_open'] = '';
        $settings['first_tag_close'] = '';

        $settings['last_link'] = false;
        $settings['last_tag_open'] = '';
        $settings['last_tag_close'] = '';

        return $settings;
    }

    // return custom template settings
    public function get_custom_settings()
    {
        $settings['num_links'] = 3;
        $settings['attributes'] = array('class' => 'item icon');

        $settings['full_tag_open'] = '<div class="ui pagination secondary pointing menu">';
        $settings['full_tag_close'] = '</div>';

        $settings['num_tag_open'] = '';
        $settings['num_tag_close'] = '';

        $settings['cur_tag_open'] = '<div class="active item">';
        $settings['cur_tag_close'] = '</div>';

        $settings['next_link'] = '<i class="arrow right icon"></i>';
        $settings['next_tag_open'] = '';
        $settings['next_tag_close'] = '';

        $settings['prev_link'] = '<i class="arrow left icon"></i>';
        $settings['prev_tag_open'] = '';
        $settings['prev_tag_close'] = '';

        $settings['first_link'] = false;
        $settings['first_tag_open'] = '';
        $settings['first_tag_close'] = '';

        $settings['last_link'] = false;
        $settings['last_tag_open'] = '';
        $settings['last_tag_close'] = '';

        return $settings;
    }

    // return pagination showing statement
    public function get_showing_statement($total_rows, $offset, $limit = self::DEFAULT_LIMIT)
    {
        $from  = $offset + 1;
        $to    = $offset + $limit;

        if($to > $total_rows) {
            $to = $total_rows;
        }

        $this->CI->lang->load('pagination');

        $showing_statement = sprintf($this->CI->lang->line('showing_statement'), $from, $to, $total_rows);

        return $showing_statement;
    }

    // return default limit
    public function get_default_limit()
    {
    	return self::DEFAULT_LIMIT;
    }

    // return default offset segment
    public function get_default_offset_segment()
    {
    	return self::OFFSET_SEGMENT;
    }

    // return current offset
    public function get_offset($segment = self::OFFSET_SEGMENT)
    {
        $offset = $this->CI->uri->segment($segment);

        if (is_null($offset) || ! is_numeric($offset)) {
        	return 0;
        }

        return $offset;
    }
}
