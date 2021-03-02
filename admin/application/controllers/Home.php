<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('getdb');
	}
	public function getdata(){
		$dbs['select'] = "*,GROUP_CONCAT(category_name) as cates";
		$dbs['from'] = 'article ar';
		$dbs['join'] = [
			'article_cate ac' => 'ac.id_article_fk = ar.id_article',
			'category ca' => 'ca.idcate = ac.idcate_fk',
			'author au' => 'au.id_author = ar.id_author_fk',
		];
		$dbs['group'] = ['ar.id_article'];
		$dbs['sort'] = ['ar.id_article' => 'desc'];
		return $this->getdb->getall($dbs);
	}
	public function index(){
		if($this->session->userdata('adminstate') !== null){
			$data['article'] = $this->getdata();
			$this->template->content->view('home',$data);
			$this->template->publish();
		} else {
			$this->template->content->view('login');
			$this->template->publish();
		}
	}
	
	public function removerec(){
		$json['msg'] = 'دوبارە هەوڵبدەرەوە!';
		$json['class'] = 'warning';
		$json['states'] = 'failed';
		echo json_encode($json);
	}

	
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */