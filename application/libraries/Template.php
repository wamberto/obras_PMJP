<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
    
		var $template_data = array();
 		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
	
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
                        $this->CI =& get_instance();
                        $this->CI->load->helper('breadcrumb');
                        $title = $this->CI->router->class;
                        $breadcrumb = set_breadcrumb();
                        $this->set('title_page', $title);
                        $this->set('breadcrumb', $breadcrumb);
			$this->set('show_contents', $this->CI->load->view($view, $view_data, TRUE));	
  			return $this->CI->load->view($template, $this->template_data, $return);
		}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */