<?php 

	class Topic extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model(array('items', 'users', 'topics'));
		}

		public function index($id = 0){

			// 模板变量
			if($id == 0){
				$data = array(
					'title' => '历史话题',
					'page' => 'index',
					'topics' => $this->topics->get_topics(),
					'current_user'  => $this->auth->get_current_user(),
				);
			} else {
				$data = array(
					'title' => '话题',
					'page' => 'single',
					'topic' => $this->topics->get_topic($id),
					'current_user'  => $this->auth->get_current_user(),
				);
			}

			// 模板输出
			$this->load->view('pages/topic', $data);
		}

		public function add(){

			// 请求处理
			$text = $this->input->post('text');

			if(!empty($text)){
				$this->topics->add_topic($text);
				redirect('/topic');
			}

			// 模板变量
			$data = array(
				'title' => '添加话题',
				'page' => 'add',
			);

			// 模板输出
			$this->load->view('pages/topic', $data);
		}

		public function del(){

		}

		public function update(){

		}
	}

?>