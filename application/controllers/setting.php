<?php 

	class Setting extends CI_Controller{

		public function index(){

			// 模板变量
			$data = array(
				'title' => '修改资料',
				'page' => 'profile',
				'current_user'  => $this->auth->get_current_user(),
			);

			// 模板输出
			$this->load->view('pages/setting', $data);
		}

		// 修改头像
		public function avatar(){

			$path = 'upload/avatar/'.date("Y/m/d");

			createdir('./'.$path);

			$config['upload_path'] = './'.$path;
	        $config['allowed_types'] = 'gif|jpg|png';
	        $config['max_size'] = '100';
	        $config['max_width']  = '1024';
	        $config['max_height']  = '768';
	        $config['encrypt_name'] = true;
	        
	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload()){
	           $error = array('error' => $this->upload->display_errors('', ''));
	           $img_url = '';
	        } else {
	           $error = 1;
	           $img = $this->upload->data();
	           $base_url = $this->config->base_url();
	           $img_url = $base_url.$path.'/'.$img['raw_name'].$img['file_ext'];
	        }

			// 模板变量
			$data = array(
				'title' => '修改头像',
				'page' => 'avatar',
				'current_user'  => $this->auth->get_current_user(),
				'error' => $error['error'],
				'img_url' =>  $img_url,
			);

			// 模板输出
			$this->load->view('pages/setting', $data);
		}

		// 修改密码
		public function pw(){
			// 模板变量
			$data = array(
				'title' => '修改密码',
				'page' => 'pw',
				'current_user'  => $this->auth->get_current_user(),
			);

			// 模板输出
			$this->load->view('pages/setting', $data);
		}
	}

?>