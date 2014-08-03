<?php 
	
	class Item extends Public_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model(array('items', 'users', 'comments'));
		}

		public function index($id){

			// 请求处理
			if(empty($id)){
				redirect('/');
			}

			// 模板变量
			$this->data['page'] = array(
				'title' => '文章',
				'name' => 'index',
			);
			$this->data['item'] = $this->items->get_item_by_id($id);
			$this->data['comment'] = $this->comments->get_comments($id);

			// 输出模板
			$this->load->view('pages/item', $this->data);
		}

		public function add(){

			// 是否登录
			if(empty($this->data['my'])) redirect('/login');

			// 请求处理
			$text = $this->input->post('text');
			$cover = $this->input->post('cover');
			if(!empty($text)){
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

		public function add_cover(){

			$path = 'upload/img/'.date("Y/m/d");

			createdir('./'.$path);

			$config['upload_path'] = './'.$path;
	        $config['allowed_types'] = 'gif|jpg|png';
	        $config['max_size'] = '500';
	        $config['max_width']  = '1024';
	        $config['max_height']  = '768';
	        $config['encrypt_name'] = true;
	        
	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload()){
	           $error = array('error' => $this->upload->display_errors('', ''));
	           $img_url = '';
	        } else {
	           $error = 1;
	           $img = $this->upload->data();
	           $img_url = $path.'/'.$img['raw_name'].$img['file_ext'];
	        }

	        // 模板变量
			$this->data['page'] = array(
				'title' => '添加文章',
				'name' => 'add',
			);
			$this->data['img_url'] = $img_url;
			$this->data['error'] = $error['error'];

	        $this->load->view('pages/item', $this->data);
		}

		public function edit($id = 0){

			// if(!$this->items->can_edit($id)) redirect('/');

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