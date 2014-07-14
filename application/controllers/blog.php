<?php 
	class Blog extends CI_Controller{
		function __construct(){
			parent::__construct();
		}

		public function index(){
			$this->load->helper('url');
			// log_message('error', 'test ets');
			$this->load->view('blogview');
			$this->load->library('calendar');

		}

		public function comments(){
			echo 'comments';
		}

		public function abc(){
			echo 'abc';
		}

		// public function _remap($method)
		// {
		//     if ($method == 'abc')
		//     {
		//         $this->$method();
		//     }
		//     else
		//     {
		//         $this->comments();
		//     }
		// }
		// public function _output($output)
		// {
		//     echo '-';
		// }
	}
?>