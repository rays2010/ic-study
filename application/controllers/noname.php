<?php 

	class Noname extends CI_Controller{
		public function index($id = 0){

			$data = array(
				'title' => '匿名箱',
				'page' => 'index',
				'current_user'  => $this->auth->get_current_user(),
			);

			// 模板输出
			$this->load->view('pages/noname', $data);
		}
	}

?>