<?php 

	class Globals{
	                             
	    function __construct($config = array() ){
	        foreach ($config as $key => $value) {
	            $data[$key] = $value;
	        }
	                         
	        $CI =& get_instance();//这一行必须加
	                         
	        $CI->load->vars($data);
	    }
	}

?>