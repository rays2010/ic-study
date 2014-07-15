<?php 

	class Logout extends CI_Controller{

		public function index(){
			$this->auth->logout();
			redirect('/', 'refresh');
		}
	}

?>