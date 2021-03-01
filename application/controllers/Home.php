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
	public function follow(){
		if($this->session->userdata('authorstate') !== null){
			$id = $this->input->post('id');
			$type = $this->input->post('type');
			$typefollow = $this->input->post('typefollow');
			if($id > 0 and ($type == "cate" or $type == "author")){
				if($type == "cate"){
					if($typefollow == "follow"){
						$data = ['id_cate_fk' => $id , 'id_author_fk' => $this->session->userdata('authorstate')];
						$res = $this->getdb->insertdb('follow_category',$data);
					} else {
						$this->db->where('id_cate_fk' , $id);
						$this->db->where('id_author_fk' , $this->session->userdata('authorstate'));
						$res = $this->db->delete('follow_category');
					}
				} else {
					if($typefollow == "follow"){
						$data = ['id_author_f_fk' => $id , 'id_author_fk' => $this->session->userdata('authorstate')];
						$res = $this->getdb->insertdb('follow_author',$data);
					} else {
						$this->db->where('id_author_f_fk' , $id);
						$this->db->where('id_author_fk' , $this->session->userdata('authorstate'));
						$res = $this->db->delete('follow_author');
					}
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
				echo json_encode($json);

			} else {
				//$this->index();
			}
		} else {
			$json['msg'] = 'بۆ فۆلۆو کردن دەبێت خۆت تۆمارکردبێت';
			$json['class'] = 'warning';
			$json['states'] = 'failed';
			echo json_encode($json);
		}

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