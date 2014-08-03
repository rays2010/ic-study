<?php 

	class Noname extends Public_Controller{
		public function index($id = 0){

			$this->data['page'] = array(
				'title' => '匿名箱',
				'name' => 'index',
			);

			// 模板输出
			$this->load->view('pages/noname', $this->data);
		}
	}

?>