<?php 

	class User extends Public_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model(array('items', 'users'));
		}

		public function index($id = '0'){

			// 请求处理
			if($id == 0){
				redirect('/');
			}

			if($id == $this->data['my']['uid']){
				$is_master = TRUE;
			} else {
				$is_master = FALSE;
			}

			// 模板变量
			$this->data['page'] = array(
				'title' => '个人主页',
				'is_master' => $is_master,
			);
			$this->data['user'] = $this->users->get_user($id);
			$this->data['item'] = $this->items->get_item_by_user($id);

			// 模板输出
			$this->load->view('pages/user', $this->data);
		}
	}

?>