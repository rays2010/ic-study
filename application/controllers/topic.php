<?php 

	class Topic extends Public_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model(array('items', 'users', 'topics'));
			$this->is_login(array('index')); //设置不需要登录的页面
			$this->check_param('id', array('in', 'add')); // 检查页面传值
		}

		public function index($id = 0){

			// 模板变量
			if($id == 0){
				$this->data['page'] = array(
					'title' => '话题列表',
					'name' => 'index',
				);
				$this->data['topics'] = $this->topics->get_topics();
			} else {
				$this->data['page'] = array(
					'title' => '话题',
					'name' => 'single',
				);
				$this->data['topic'] = $this->topics->get_topic($id);
				$this->data['items'] = $this->items->get_items(array('parent_id'=>$id));
			}

			// 模板输出
			$this->load->view('pages/topic', $this->data);
		}

		// 创建话题
		public function create(){

			// 上传图片
	    	$folder = $this->input->post('folder');
	    	if($folder){
				$this->data['upload'] = $this->upload($folder);
	    	}

			// 请求处理
			$text  = $this->input->post('text');
			$title = $this->input->post('title');
			$cover = $this->input->post('cover');

			if(!$title){
				$this->data['msg'] = '必须填写标题';
			} else if(!$cover){
				$this->data['msg'] = '必须添加封面';
			} else {
				$result = $this->topics->add_topic($title, $text, $this->data['my']['uid'], $cover);
				if($result) {
					redirect('/topic');
				} else {
					show_error('添加话题失败', 500, '错误');
				}
			}

			// 模板变量
			$this->data['page'] = array(
				'title' => '添加话题',
				'name' => 'create',
			);

			// 模板输出
			$this->load->view('pages/topic', $this->data);
		}

		// 向话题中添加内容
		public function add($id){

			// 上传图片
	    	$folder = $this->input->post('folder');
	    	if($folder){
				$this->data['upload'] = $this->upload($folder);
	    	}

	    	// 请求处理
			$text = $this->input->post('text');
			$cover = $this->input->post('cover');
			$parent = $this->input->post('parent');

			if($text && $parent){
				$this->items->add_item($text, $cover, $parent);
				redirect('/topic/'.$id);
			} else {
				$this->data['msg'] = '正文不能为空';
			}

			// 模板变量
			$this->data['page'] = array(
				'title' => '添加内容',
				'name' => 'add',
			);

			$this->data['topic'] = $this->topics->get_topic($id);

			// 模板输出
			$this->load->view('pages/topic', $this->data);
		}

		public function del(){

		}

		public function update(){

		}
	}

?>