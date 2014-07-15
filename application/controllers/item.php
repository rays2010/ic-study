<?php 
	
	class Item extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model(array('items', 'users'));
		}

		public function index($id){

			// 请求处理
			if(empty($id)){
				redirect('/');
			}

			// 模板变量
			$data = array(
				'title' => '文章',
				'page' => 'index',
				'item' => $this->items->get_item_by_id($id)
			);

			// 输出模板
			$this->load->view('pages/item', $data);
		}

		public function add(){

			// 请求处理
			$text = $this->input->post('text');
			if(!empty($text)){
				$this->items->add_item($text);
				echo '添加成功';
			}

			// 模板变量
			$data = array(
				'title' => '添加文章',
				'page' => 'add',
			);

			// 输出模板
			$this->load->view('pages /item', $data);
		}

		public function edit($id = 0){

			if(!$this->items->can_edit($id)) redirect('/');

			// 请求处理
			$title = $this->input->post('title');
			$iid = $this->input->post('iid');
			if(!empty($title) && !empty($iid)){

				$this->items->edit_item($iid, array(
					'title' => $title,
					'text' => $title,
				));
				redirect('item/'.$iid);

			} else {
				// 模板变量
				$data = array(
					'title' => '修改文章',
					'page' => 'edit',
					'item' => $this->items->get_item_by_id($id)
				);

				// 输出模板
				$this->load->view('pages/item', $data);
			}

			

		}
		

		public function del($iid){
			echo 'del -'.$iid;
		}
	}

?>