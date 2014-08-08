<?php 

	class User extends Public_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model(array('items', 'users', 'topics'));
			$this->check_param('id', array('item')); // 检查页面传值
			$id = $this->uri->segment(3);
		}

		public function index($id = null){

			if(!is_numeric($id)) show_error('无效参数', 500, '错误');

			// 模板变量
			$this->data['page'] = array(
				'title' => '个人主页',
			);
			$this->data['user'] = $this->users->get_user($id);
			$this->data['items'] = $this->items->get_items(array('author_id'=>$id));

			// 模板输出
			$this->load->view('pages/user', $this->data);
		}

		public function item($id){

			// 模板变量
			$this->data['page'] = array(
				'title' => '发布的文章 - 个人主页',
			);
			$this->data['user'] = $this->users->get_user($id);
			$this->data['items'] = $this->items->get_items(array('author_id'=>$id, 'type'=>'item'));

			// 模板输出
			$this->load->view('pages/user/item', $this->data);
		}

		public function topic($id){
			// 模板变量
			$this->data['page'] = array(
				'title' => '创建的话题 - 个人主页',
			);
			$this->data['user'] = $this->users->get_user($id);
			$this->data['topics'] = $this->topics->get_topics(array('author_id'=>$id));

			// 模板输出
			$this->load->view('pages/user/topic', $this->data);
		}

		public function join($id){
			// 模板变量
			$this->data['page'] = array(
				'title' => '参与的话题 - 个人主页',
			);
			$this->data['user'] = $this->users->get_user($id);
			$this->data['items'] = $this->items->get_items(array('author_id'=>$id, 'type'=>'join'));

			// 模板输出
			$this->load->view('pages/user/join', $this->data);
		}
	}

?>