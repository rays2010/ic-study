<?php 

	class Letter extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model(array('letters', 'users'));
		}

		public function index($id = 0){

			if($id == 0){

				$list = $this->letters->fetch_list();
				$id = $this->auth->get_ID();
				$data = array(
					'title' => '私信列表',
					'page' => 'list',
					'list' => $list,
					'id' => $id,
				);

			} else {

				$nickname = $this->users->get_nickname($id);
				if(empty($nickname)) show_404();

				$list = $this->letters->fetch($id);

				// 模板变量
				$data = array(
					'title' => '私信',
					'nickname' => $nickname,
					'id' => $id,
					'page' => 'sendto',
					'list' => $list,
				);
			}
			
			// 模板输出
			$this->load->view('pages/letter', $data);
			
		}

		public function send($id){
			$text = $this->input->post('text');
			if(!empty($text)){
				$this->letters->add($id, $text);
			}
		}
	}

?>