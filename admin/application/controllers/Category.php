<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class category extends MY_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->model('getdb');
	}

	public function getdata(){
		$get = $this->input->post('get');

		$data['list'] = $this->getdb->getall(['from' => 'category']);
		if($get == 1){
			$this->load->view('category/list_tbl', $data);
		} else {
			return $data;
		}

	}
	public function index(){
        $data = $this->getdata();
		$this->template->content->view('category/list',$data);
		$this->template->publish();
	}
	public function action(){
		$id = $this->input->post('id');
		$data = $this->input->post('data');
		$this->load->library('form_validation');
			
		$this->form_validation->set_rules('data[category_name]', 'ناوى تەواو', 'trim|required', [
			'required'=> 'تكایه‌ %s پڕبكه‌ره‌وه‌ .']
		);
		
		
		if ($this->form_validation->run() == False) {
			$json['msg'] = validation_errors();
			$json['class'] = 'warning';
			$json['states'] = 'failed';
		} else {
			$data = html_escape($data);
			
			if($id != '' and $id > 0){ // update
				$res = $this->getdb->updatedb('category',$data,$id,'idcate');
			} else { // insert
				$res = $this->getdb->insertdb('category',$data);
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
	public function form(){
		$id = $this->input->post('id');
		if($id != '' and $id > 0){
			$dbs['from'] = 'category';
			$dbs['where']['idcate'] = $id;
			$data['data'] = $this->getdb->getall($dbs);
			if(count($data['data']) === 1){
				$data['data'] = $data['data'][0];
			}
			$this->load->view('category/form',$data);
		} else {
			$this->load->view('category/form');
		}
	}

	public function removerec(){
		$id = $this->input->post('id');
		$json['msg'] = 'دوبارە هەوڵبدەرەوە!';
		$json['class'] = 'warning';
		$json['states'] = 'failed';
		if($id != '' and $id > 0){
			$res = $this->getdb->deletedb($id,'category','idcate');
			if($res > 0){
				$json['msg'] = 'بەسەرکەوتویی جێبەجێ کرا';
				$json['class'] = 'success';
				$json['states'] = 'ok';
			}
		}
		echo json_encode($json);
	}

}

/* End of file category.php */
