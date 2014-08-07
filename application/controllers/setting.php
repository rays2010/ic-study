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

			// 上传图片
	    	$folder = $this->input->post('folder');
	    	if($folder){
				$this->data['upload'] = $this->upload($folder);
	    	}

	    	// 设置头像
	    	if(isset($this->data['upload']['url'])){
	    		$this->users->update_user($this->data['my']['uid'], array('avatar'=> $this->data['upload']['url']));
	    	}

			// 模板变量
			$this->data['page'] = array(
				'title' => '修改头像',
				'name' => 'avatar',
			);

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