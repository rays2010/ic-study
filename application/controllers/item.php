<?php 
	
	class Item extends Public_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model(array('items', 'users', 'comments'));
			$this->is_login(); //设置需要登录的页面
			$this->check_param('id', array('item', 'edit', 'up', 'unup')); // 检查页面传值
		}

		public function index($id=0){

			// 请求处理
			if($id<=0){
				show_404();
			}
			
			// 模板变量
			$this->data['page'] = array(
				'title' => '文章',
				'name' => 'index',
			);

			$this->data['item'] = $this->items->get_item_by_id($id);
			if(!$this->data['item']){
				show_404();
			}
			$this->data['comment'] = $this->comments->get_comments($id);

			// 输出模板
			$this->load->view('pages/item', $this->data);
		}

		public function add(){

			// 上传图片
	    	$folder = $this->input->post('folder');
	    	if($folder){
				$this->data['upload'] = $this->upload($folder);
	    	}

			// 请求处理
			$text = $this->input->post('text');
			$cover = $this->input->post('cover');
			if($text){
				$this->items->add_item($text, $cover);
				redirect('/');
			}

			// 模板变量
			$this->data['page'] = array(
				'title' => '添加文章',
				'name' => 'add',
			);

			// 输出模板
			$this->load->view('pages/item', $this->data);
		}

		public function edit($id = 0){

			// 请求处理
			$title = $this->input->post('title');
			$iid = $this->input->post('iid');
			if(!empty($title) && !empty($iid)){

				if(!$this->items->can_edit($iid)) redirect('/');

				$this->items->edit_item($iid, array(
					'title' => $title,
					'text' => $title,
				));
				redirect('item/'.$iid);

			} else {
				// 模板变量
				$this->data['page'] = array(
					'title' => '修改文章',
					'name' => 'edit',
				);
				$this->data['item'] = $this->items->get_item_by_id($id);

				// 输出模板
				$this->load->view('pages/item', $this->data);
			}
		}

		public function del($id = 0){
			if($id !== 0 && $this->items->can_edit($id)){
				$this->items->del_item($id);
				$user = $this->data['my'];
				redirect('user/'.$user['uid']);
			} else {
				redirect('/');
			}
		}

		public function up($id){
			$this->items->up($id);
			$ref = $this->input->server('HTTP_REFERER', TRUE);
			redirect($ref, 'location'); 
		}

		public function unup($id){
			$this->items->unup($id);
			$ref = $this->input->server('HTTP_REFERER', TRUE);
			redirect($ref, 'location'); 
		}

	}

?>