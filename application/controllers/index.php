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
			$this->data['items'] = $this->items->get_items();

			// 输出模板
			$this->load->view('pages/index', $this->data);
		}
	}
?>