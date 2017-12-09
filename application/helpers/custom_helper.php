<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// function to check if user is logged in using ion auth
if ( ! function_exists('is_logged_in'))
{
	function is_logged_in($CI = null, $redirect_to_url = '', $error_message = '')
	{
		if (is_null($CI))
		{
			$CI =& get_instance();
			$CI->load->library('ion_auth');
		}

		if (! $CI->ion_auth->logged_in())
        {
            // set error message
            if (! empty($error_message)) {
            	$CI->session->set_flashdata('message', $error_message);
            }

            // set redirection url
            if (! empty($redirect_to_url)) {
            	$CI->session->set_userdata('redirect_to_url', $redirect_to_url);
            }

            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else
        {
        	return true;
        }
	}
}

// function to check if user is admin using ion auth
if ( ! function_exists('is_admin'))
{
	function is_admin($CI = null)
	{
		if (is_null($CI))
		{
			$CI =& get_instance();
			$CI->load->library('ion_auth');
		}

		if (! $CI->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        elseif (! $CI->ion_auth->is_admin())
        {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }
        else
        {
        	return true;
        }
	}
}

// function to redirect to the previous link
if ( ! function_exists('redirect_back'))
{
	function redirect_back($default_url = '')
	{
		$CI =& get_instance();
		$CI->load->library('ion_auth');

		// redirection
        $CI->load->library('user_agent');
        $redirect_url = $CI->agent->referrer();

        if (empty($redirect_url)) {
            $redirect_url = $default_url;
        }

        redirect($redirect_url);
    }
}

// function to get default currency
if ( ! function_exists('get_currency'))
{
	function get_currency($add_space = true)
	{
		return ($add_space ? ' ' : '').'DH';
	}
}

// function to parse a string with a prefix
if ( ! function_exists('str_prefix'))
{
	function str_prefix($str, $prefix = '')
	{
		if (empty($str)) {
			return '';
		}
		else {
			return $prefix.$str;
		}
	}
}

// function to sanitize a url title
if ( ! function_exists('sanitize_url_title'))
{
	function sanitize_url_title($url_title)
	{
		$CI =& get_instance();
		$CI->load->helper('text');

		$sanitized_url = convert_accented_characters($url_title); // remove accented characters
		$sanitized_url = url_title($sanitized_url, '-', true); // sanitize

		return $sanitized_url;
	}
}

// filter css / js array
if ( ! function_exists('filter_array'))
{
	function filter_array($array_to_filter, $view_name)
	{
		$f_array = array();

		foreach ($array_to_filter as $element)
		{
			if (isset($element['load_on_view']))
			{
				if (empty($element['load_on_view']))
				{
					$f_array[] = $element; // add css or js to view
				}
				else
				{
					// split views name
					$views = explode('|', $element['load_on_view']);

					foreach ($views as $view)
					{
						if ($view == $view_name) {
							$f_array[] = $element;
							break;
						}
					}
				}
			}
		}

		return $f_array;
	}
}

// return separated array values
if ( ! function_exists('separate_array'))
{
	function separate_array($array, $key)
	{
		$separated_array = array();

		if (is_array($array))
        {
            foreach ($array as $row) {
            	$separated_array[] = is_object($row) ? $row->$key : $row[$key];
            }
        }

        return $separated_array;
	}
}

// generate color from an index
if ( ! function_exists('generate_color'))
{
	function generate_color($index = 0)
	{
		$colors = ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#FFE066", "#2D9BCA"];

		$highlight_colors = ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774", "#FFE580", "#3DA7D3"];

		if ($index < 0) {
			$index = 0;
		}
		else if ($index >= count($colors)) {
			$index = count($colors) - 1;
		}

		return array('color' => $colors[$index], 'highlight' => $highlight_colors[$index]);
	}
}

// convert an std class to an array
if ( ! function_exists('stdToArray'))
{
	function stdToArray($obj)
	{
		$reaged = (array) $obj;

		foreach($reaged as $key => &$field)
		{
			if(is_object($field)) {
				$field = stdToArray($field);
			}
		}

		return $reaged;
	}
}

// more css
if ( ! function_exists('get_more_css'))
{
	function get_more_css($view_name)
	{
		$path = base_url('public/assets/');

		// @! load_on_view can take the 'module_name/view_name' or only the 'view_name' depending on what you use to call/load your template views
		// @! leave load_on_view empty if you want the css file to be loaded on any view
		// @! use '|' to separate your views if you have more than one
		$css_array = array(
				array('href' => $path.'admin/plugins/tinymce/skins/lightgray/skin.min.css',
					  'load_on_view' => ''),

				array('href' => $path.'semantic-ui/calendar/calendar.min.css',
					  'load_on_view' => '')
		);

		$view_css = filter_array($css_array, $view_name);

		return $view_css;
	}
}

// more js
if ( ! function_exists('get_more_js'))
{
	function get_more_js($view_name)
	{
		$path = base_url('public/assets/');

		// @! load_on_view can take the 'module_name/view_name' or only the 'view_name' depending on what you use to call/load your template views
		// @! leave load_on_view empty if you want the css file to be loaded on any view
		// @! use '|' to separate your views if you have more than one
		$js_array = array(
				array('src' => $path.'admin/plugins/tablesort/jquery.tablesort.js',
					  'load_on_view' => 'auth/index'),

				array('src' => $path.'custom/js/tablesort.js',
					  'load_on_view' => 'auth/index'),

				array('src' => $path.'semantic-ui/calendar/calendar.min.js',
					  'load_on_view' => ''),

				array('src' => $path.'custom/js/datepicker.js',
					  'load_on_view' => ''),

				array('src' => $path.'custom/js/timepicker.js',
					  'load_on_view' => ''),

				array('src' => $path.'admin/plugins/tinymce/tinymce.min.js',
					  'load_on_view' => ''),

				array('src' => $path.'custom/js/htmleditor.js',
					  'load_on_view' => ''),

				array('src' => $path.'admin/plugins/chartjs/Chart.min.js',
					  'load_on_view' => 'admin/dashboard'),

				array('src' => $path.'admin/plugins/chartjs/Chart.HorizontalBar.js',
					  'load_on_view' => 'admin/dashboard'),

				array('src' => $path.'custom/js/dashboard_chart.js',
					  'load_on_view' => 'admin/dashboard')
		);

		$view_js = filter_array($js_array, $view_name);

		return $view_js;
	}
}

// load css array
if ( ! function_exists('load_css_array'))
{
	function load_css_array($array_to_load)
	{
		if (is_array($array_to_load))
        {
            foreach ($array_to_load as $css) {
            	echo '<link href="'.$css['href'].'" rel="stylesheet" />'."\n";
            }
        }
	}
}

// load js array
if ( ! function_exists('load_js_array'))
{
	function load_js_array($array_to_load)
	{
		if (is_array($array_to_load))
        {
            foreach ($array_to_load as $js) {
            	echo '<script src="'.$js['src'].'"></script>'."\n";
            }
        }
	}
}

// html meta keywords
if ( ! function_exists('get_default_meta_keywords'))
{
	function get_default_meta_keywords()
	{
		// TODO: add a lang file (meta_lang) so we can translate keywords
		return "shop";
	}
}

// html meta description
if ( ! function_exists('get_default_meta_description'))
{
	function get_default_meta_description()
	{
		return "shop";
	}
}

// html meta author
if ( ! function_exists('get_default_meta_author'))
{
	function get_default_meta_author()
	{
		return "AXeL";
	}
}
