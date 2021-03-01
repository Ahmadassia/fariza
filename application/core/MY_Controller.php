<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public $category,$webop,$authorData,$author;
	public $followAuthor = [],$followCate = [];
	public function __construct(){
		parent::__construct();
		$this->webop = $this->getdb->getall(['from' => 'op_site']);
		$this->category = $this->getdb->getall(['from' => 'category']);
		$this->webop = $this->webop[0];
		
		$db['from'] = 'author au';
		$db['sort'] = ['au.id_author' => 'desc'];
		$db['limit'] = [6,0];
		$this->author =  $this->getdb->getall($db);
		

		if($this->session->userdata('authorstate') !== null){
			$dbas['from'] = 'author';
			$dbas['where']['id_author'] = $this->session->userdata('authorstate');
			$this->authorData = $this->getdb->getall($dbas);
			$this->authorData = $this->authorData[0];


			$dbs['from'] = 'follow_category';
			$dbs['where']['	id_author_fk'] = $this->session->userdata('authorstate');
			$fc = $this->getdb->getall($dbs);

			foreach ($fc as $key => $value) {
				$this->followCate[] = $value['id_cate_fk'];
			}


			$dba['from'] = 'follow_author';
			$dba['where']['id_author_fk'] = $this->session->userdata('authorstate');
			$fa = $this->getdb->getall($dba);

			foreach ($fa as $key => $value) {
				$this->followAuthor[] = $value['id_author_f_fk'];
			}



		}
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */