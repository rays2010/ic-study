<?php 
	class Index extends Public_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model(array('users', 'items', 'topics'));
		}

		public function index(){

			// 模板变量
			$this->data['page'] = array(
				'title' => '首页',
				'name' => 'index',
			);
			$this->data['item'] = $this->items->get_items();
			$this->data['topic'] = $this->topics->get_recent_topic();

			// 输出模板
			$this->load->view('pages/index', $this->data);
		}
	}
?>