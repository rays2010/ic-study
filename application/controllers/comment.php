<?php 

	class comment extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model(array('comments'));
		}

		public function index(){
			echo 'ok';
		}

		public function add($id = 0){
			if($id == 0){
				redirect('/');
			} else {
				$text = $this->input->post('text');
				$iid = $this->input->post('iid');

				if(!empty($text) && !empty($iid)){
					$this->comments->add_comment($iid, $text);
					redirect('/item/'.$iid);
				}
			}
		}

		public function del($id){
			echo 'del';
		}

	}


?>