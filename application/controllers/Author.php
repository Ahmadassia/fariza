<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('getdb');
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
}

/* End of file author.php */
/* Location: ./application/controllers/author.php */