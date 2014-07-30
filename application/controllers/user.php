<?php 

	class User extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model(array('items', 'users'));
		}

		public function index($id = '0'){

			// 请求处理
			if($id == 0){
				redirect('/');
			}

			$user = $this->auth->get_current_user();

			if($id == $user['uid']){
				$is_owner = TRUE;
			} else {
				$is_owner = FALSE;
			}

			// 模板变量
			$data = array(
				'title' => '个人主页',
				'current_user'  => $this->auth->get_current_user(),
				'user' => $this->users->get_user($id),
				'item' => $this->items->get_item_by_user($id),
				'is_owner' => $is_owner,
			);

			// 模板输出
			$this->load->view('pages/user', $data);
		}
	}

?>