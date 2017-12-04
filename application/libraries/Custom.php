<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Custom
{
	// attr.
	private $CI;

	// constr.
    function __construct()
    {
        // Assign by reference with "&" so we don't create a copy
        $this->CI =& get_instance();

        // load session library
        $this->CI->load->library('session');
    }

	// upload image function
    public function upload_image($path = './public/uploads', $input_name)
    {
        if (substr($path, 0, 2) != './') {
            $path = './'.$path;
        }

        $config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;
        $config['file_name']            = $this->generate_random_string(16);

        $this->CI->load->library('upload', $config);

        if (! $this->CI->upload->do_upload($input_name))
        {
            $this->CI->session->set_flashdata('message', $this->CI->upload->display_errors('<li>','</li>'));

            return -1;
        }
        else
        {
            $upload_data = $this->CI->upload->data();

            // generate a thumbnail name
            $thumbnail_name = $upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];
            $file_name = $upload_data['file_name'];
            $this->generate_thumbnail($path, $file_name, $thumbnail_name);

            return $file_name;
        }
    }

	// delete image function
	public function delete_image($path, $filename)
    {
        $deleted_count = 0;

        if (! empty($filename))
        {
            if (substr($path, 0, 2) != './') {
                $path = './'.$path;
            }

            $picture_path = $path.'/'.$filename;
            $thumbnail_path = $path.'/'.$this->get_thumbnail_name($filename);

            // delete picture(s)
            if (file_exists($picture_path)) {
                if (unlink($picture_path)) {
                	$deleted_count++;
                }
            }
            if (file_exists($thumbnail_path)) {
            	if (unlink($thumbnail_path)) {
                	$deleted_count++;
                }
            }
        }

        return $deleted_count;
    }

	// generate random string function
	public function generate_random_string($length)
    {
        $characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $randomString = '';

        for($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

	// generate thumbnail function
	private function generate_thumbnail($path, $file_name, $thumbnail_name)
    {
        if (substr($path, 0, 2) != './') {
            $path = './'.$path;
        }

        // resize image
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path.'/'.$file_name;
        $config['new_image'] = $path.'/'.$thumbnail_name;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 200;
        $config['height']       = 200;
        $this->CI->load->library('image_lib', $config);
        $this->CI->image_lib->resize();
    }

	// generate thumbnail name function
	public function get_thumbnail_name($file_name, $default = '')
    {
        if (empty($file_name)) {
            return $default;
        }

        $file_parts = pathinfo($file_name);

        $thumbnail_name = $file_parts['filename'].'_thumb.'.$file_parts['extension'];

        return $thumbnail_name;
    }
}
