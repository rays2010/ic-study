<?php 

	class Setting extends Public_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('users');
		}

		public function index(){

			// 模板变量
			$this->data['page'] = array(
				'title' => '修改资料',
				'name' => 'profile',
			);

			// 模板输出
			$this->load->view('pages/setting', $this->data);
		}

		public function profile(){

			$current_user = $this->auth->get_current_user();
			$nickname = $this->input->post('nickname');
			$location = $this->input->post('location');

			if(isset($nickname) || isset($location)){
				$this->users->update_user($current_user['uid'], array('nickname'=> $nickname, 'location'=> $location));
			}

			redirect('/setting');
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
	           $avatar_url = '';
	        } else {
	           $error = 1;
	           $img = $this->upload->data();
	           $avatar_url = $path.'/'.$img['raw_name'].$img['file_ext'];
	           $base_url = $this->config->base_url();
	           $this->users->update_user($this->data['my']['uid'], array('avatar'=> $avatar_url));
	        }

			// 模板变量
			$this->data['page'] = array(
				'title' => '修改头像',
				'name' => 'avatar',
				'img_url' =>  $avatar_url,
			);
			$this->data['error'] = $error['error'];

			// 模板输出
			$this->load->view('pages/setting', $this->data);
		}

		public function pw(){

			// 模板变量
			$this->data['page'] = array(
				'title' => '修改密码',
				'name' => 'pw',
			);

			// 模板输出
			$this->load->view('pages/setting', $this->data);
		}
	}

?>