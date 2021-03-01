<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('getdb');
	}
	public function category(){
		$this->index();
	}
	
	public function index(){
		$data['list'] = $this->getdata();
		$data['article'] = $this->getdata(5);
		$this->template->content->view('home',$data);
		$this->template->publish();
	}

	public function getdata($limit = 0){
		$dbs['select'] = "*,GROUP_CONCAT(category_name) as cates";
		$dbs['from'] = 'article ar';
		$dbs['join'] = [
			'article_cate ac' => 'ac.id_article_fk = ar.id_article',
			'category ca' => 'ca.idcate = ac.idcate_fk',
			'author au' => 'au.id_author = ar.id_author_fk',
		];
		$dbs['group'] = ['ar.id_article'];
		$dbs['sort'] = ['ar.id_article' => 'desc'];
		$dbs['limit'] = [6,$limit];
		return $this->getdb->getall($dbs);
	}
	public function view($id = ''){
		if($id != '' and $id > 0){
			$dbs['select'] = "*,GROUP_CONCAT(category_name) as cates";
			$dbs['from'] = 'article ar';
			$dbs['join'] = [
				'article_cate ac' => 'ac.id_article_fk = ar.id_article',
				'category ca' => 'ca.idcate = ac.idcate_fk',
				'author au' => 'au.id_author = ar.id_author_fk',
			];
			$dbs['group'] = ['ar.id_article'];
			$dbs['sort'] = ['ar.id_article' => 'desc'];
			$dbs['where']['id_article'] = $id;
			$data['article'] = $this->getdb->getall($dbs);
			$this->template->content->view('view',$data);
			$this->template->publish();
		} else {
			$this->index();
		}
	}

	
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */