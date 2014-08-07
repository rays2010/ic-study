<?php  

	class MY_Controller extends CI_Controller
	{
	 	function __construct(){
	  		parent::__construct();
	  		// 从session中取得当前用户信息
	    	$this->data['my'] = $this->auth->get_current_user();
	    	$this->data['class'] = $this->router->fetch_class();
			$this->data['method'] = $this->router->fetch_method();
	    }

	    /**
		 * 检查用户是否登录，未登录则跳至首页
		 * 参数中不检查的页面
		 *
		 * @access	protected
		 * @param	array
		 */
	    protected function is_login($methods = null){
	    	$method = $this->router->fetch_method(); 
	    	if(isset($methods)){
	    		if(!in_array($method, $methods) && !$this->data['my']){
	    			redirect('/login');
	    		}
	    	} else {
	    		if(!$this->data['my']){
	    			redirect('/login');
	    		}
	    	}
	    }

	    /**
		 * 检查用户是否正确传值
		 *
		 * @access	protected
		 */
	    protected function check_param($type, $methods){
	    	$method = $this->router->fetch_method(); 
	    	if($type == 'id'){
	    		$id = $this->uri->segment(3);
	    		if(!is_numeric($id) && in_array($method, $methods)){
	    			show_error('非法参数', 500, '错误');
	    		}
	    	}
	    }

	    // 通用上传方法
	    protected function upload($folder){

	    	$upload = array();

	    	//图片上传路径
	    	$path = 'upload/'.$folder.'/'.date("Y/m/d");
			createdir('./'.$path);

			// 配置
			$config['upload_path'] = './'.$path;
	        $config['allowed_types'] = 'gif|jpg|png';
	        $config['max_size'] = '500';
	        $config['max_width']  = '1024';
	        $config['max_height']  = '768';
	        $config['encrypt_name'] = true;
	        $this->load->library('upload', $config);

	        // 执行上传
	        if (!$this->upload->do_upload()){
	           $upload['msg'] = $this->upload->display_errors('', '');
	        } else {
	           $img = $this->upload->data();
	           $upload['url'] = $path.'/'.$img['raw_name'].$img['file_ext'];
	        }

			return $upload;
	    }
	}

?>