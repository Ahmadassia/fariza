<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('getdb');
	}
	public function form(){
		$id = $this->input->post('id');
		if($id != '' and $id > 0){

			$dbs['from'] = 'article';
			$dbs['where']['id_article'] = $id;
			$dbs['where']['id_author_fk'] = $this->session->userdata('authorstate');
			$data['data'] = $this->getdb->getall($dbs);
			if(count($data['data']) === 1){
				$data['data'] = $data['data'][0];
			}
			$this->load->view('author/form',$data);
		} else {
			$this->load->view('author/form');
		}
	}
	
	public function getdata($id = ''){
		$dbs['select'] = "*,GROUP_CONCAT(category_name) as cates";
		$dbs['from'] = 'article ar';
		$dbs['join'] = [
			'article_cate ac' => 'ac.id_article_fk = ar.id_article',
			'category ca' => 'ca.idcate = ac.idcate_fk'
		];
		$dbs['group'] = ['ar.id_article'];
		$dbs['sort'] = ['ar.id_article' => 'desc'];
		if($id != '' and $id > 0){
			$dbs['where']['id_article'] = $id;
		}
		$dbs['where']['id_author_fk'] = $this->session->userdata('authorstate');
		return $this->getdb->getall($dbs);
	}
	public function article(){
		$get = $this->input->post('get');
		if($get === "1"){
			$data['list'] = $this->getdata();
			$this->load->view('author/list_tbl', $data);
		} else {

		$id = $this->input->post('id');
		$data = $this->input->post('data');
		$category = $this->input->post('category');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('data[title]', 'ناونیشان', 'trim|required', [
			'required'=> 'تكایه‌ %s پڕبكه‌ره‌وه‌ .']
		);
		$this->form_validation->set_rules('data[content]', 'بابەت', 'trim|required', [
			'required'=> 'تكایه‌ %s پڕبكه‌ره‌وه‌ .']
		);
		
		$src = './assets/article/';
		if ($this->form_validation->run() == False) {
			$json['msg'] = validation_errors();
			$json['class'] = 'warning';
			$json['states'] = 'failed';
		} else {
			$data = html_escape($data);
			
			$config['upload_path']          = $src;
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['file_name'] = date('Y-m-d-Hms');
			$this->load->library('upload', $config);
			

			if($id != '' and $id > 0){ // update
				if ($this->upload->do_upload('image')) {

	            	$oldimg = $this->input->post('old_image');
	            	$oldimg = $oldimg ?? "aa.jpg";

	            	if (file_exists($src.$oldimg)) {
	            		unlink($src.$oldimg);
	            	}
	                $dataimg = $this->upload->data();
	                $data['article_image'] = $dataimg['file_name'];
	            }
				$res = $this->getdb->updatedb('article',$data,$id,'id_article');
				$res = $this->getdb->deletedb($id,'article_cate','id_article_fk');
				$cates = [];
				foreach ($category as $key => $value) {
					$cates[] = ['id_article_fk' => $id,'idcate_fk' => $value];
				}
				$res = $this->getdb->insertdbba('article_cate',$cates);
			} else { // insert
				if ( ! $this->upload->do_upload('image')){
					$json['msg'] = $this->upload->display_errors();
				} else {
					$dataimg = $this->upload->data();
					$data['article_image'] = $dataimg['file_name'];
				}
				$data['id_author_fk'] = $this->session->userdata('authorstate');
				$res = $this->getdb->insertdb('article',$data);
				$cates = [];
				foreach ($category as $key => $value) {
					$cates[] = ['id_article_fk' => $res,'idcate_fk' => $value];
				}
				$res = $this->getdb->insertdbba('article_cate',$cates);
			}
			if($res > 0){
				$json['msg'] = 'بەسەرکەوتویی جێبەجێ کرا';
				$json['class'] = 'success';
				$json['states'] = 'ok';
			} else {
				$json['msg'] = 'دوبارە هەوڵبدەرەوە!';
				$json['class'] = 'warning';
				$json['states'] = 'failed';
			}
		}
		echo json_encode($json);
	}
	}
	public function index(){
		if($this->session->userdata('authorstate') !== null){

			$data['dashbord'] = true;
			
			$data['list'] = $this->getdata();
			
			$this->template->content->view('author/list',$data);
			$this->template->publish();
		} else {
			redirect();
		}
	}
	
    public function rigister(){
        $this->load->view('rigister');
    }
	public function login(){
		$this->load->view('login');
    }
	public function logout(){
		$this->session->unset_userdata('authorstate');
		redirect();
	}
    public function action(){
		$type = $this->input->post('type');
		$data = $this->input->post('data');
		$this->load->library('form_validation');
		if($type == 'rigister'){
            $this->form_validation->set_rules('data[fullname]', 'ناوى تەواو', 'trim|required', [
                'required'=> 'تكایه‌ %s پڕبكه‌ره‌وه‌ .']
            );
        }
		$this->form_validation->set_rules('data[email]', 'ئیمەیل', 'trim|required', [
			'required'=> 'تكایه‌ %s پڕبكه‌ره‌وه‌ .']
		);
		$this->form_validation->set_rules('data[password]', 'پاسۆرد', 'trim|required', [
			'required'=> 'تكایه‌ %s پڕبكه‌ره‌وه‌ .']
		);
		
		if ($this->form_validation->run() == false) {
			$json['msg'] = validation_errors();
			$json['class'] = 'warning';
			$json['states'] = 'failed';
		} else {
			$data = html_escape($data);
            if($type == 'rigister'){
                $res = $this->getdb->insertdb('author',$data);
				$this->session->set_userdata('authorstate',$res);
                $json['redirect'] = 'author';
            } else {
                $dbs['from'] = 'author';
                $dbs['where']['email'] = $data['email'];
                $dbs['where']['password'] = $data['password'];
                
                $res = $this->getdb->getall($dbs);
				
                if(sizeof($res) === 1){
                    $this->session->set_userdata('authorstate',$res[0]['id_author']);
                    $json['redirect'] = './';
                }
				$res = sizeof($res);
            }
			if($res > 0){
				$json['msg'] = 'بەسەرکەوتویی جێبەجێ کرا';
				$json['class'] = 'success';
				$json['states'] = 'ok';
			} else {
				$json['msg'] = 'دوبارە هەوڵبدەرەوە!';
				$json['class'] = 'warning';
				$json['states'] = 'failed';
			}
		}
		echo json_encode($json);

	}
	public function removerec(){
		$id = $this->input->post('id');
		$json['msg'] = 'دوبارە هەوڵبدەرەوە!';
		$json['class'] = 'warning';
		$json['states'] = 'failed';
		if($id != '' and $id > 0){
			$res = $this->getdb->deletedb($id,'article','id_article');
			if($res > 0){
				$json['msg'] = 'بەسەرکەوتویی جێبەجێ کرا';
				$json['class'] = 'success';
				$json['states'] = 'ok';
			}
		}
		echo json_encode($json);
	}

	
}

/* End of file author.php */
/* Location: ./application/controllers/author.php */