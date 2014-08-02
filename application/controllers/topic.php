<?php 

	class Topic extends Public_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model(array('items', 'users', 'topics'));
		}

		public function index($id = 0){

			// 模板变量
			if($id == 0){
				$this->data['page'] = array(
					'title' => '历史话题',
					'name' => 'index',
				);
				$this->data['topics'] = $this->topics->get_topics();
			} else {
				$this->data['page'] = array(
					'title' => '话题',
					'name' => 'single',
				);
				$this->data['topic'] = $this->topics->get_topics();
			}

			// 模板输出
			$this->load->view('pages/topic', $this->data);
		}

		public function add(){

			// 请求处理
			$text = $this->input->post('text');

			if(!empty($text)){
				$this->topics->add_topic($text);
				redirect('/topic');
			}

			// 模板变量
			$this->data['page'] = array(
				'title' => '添加话题',
				'name' => 'add',
			);

			// 模板输出
			$this->load->view('pages/topic', $this->data);
		}

		public function del(){

		}

		public function update(){

		}
	}

?>