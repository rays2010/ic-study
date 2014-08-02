<?php 
	
	class Public_Controller extends MY_Controller{
	    function __construct()
	    {
	        parent::__construct();
	        
	        // 网站状态
	        if($this->config->item('site_open') === FALSE)
	        {
	            show_error('网站维护中……', 500, '错误');
	        }

	        // 手机版
	        if( $this->agent->is_mobile() )
	        {
	            /*
	             * Use my template library to set a theme for your staff
	             *     http://philsturgeon.co.uk/code/codeigniter-template
	             */
	            // $this->template->set_theme('mobile');
	            show_error('手机版还没做好...', 500, '错误');
	        }
	    }
	}

?>