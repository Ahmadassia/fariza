<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        redirect();
    }
    public function action(){
		$type = $this->input->post('type');
		$data = $this->input->post('data');
		$this->load->library('form_validation');
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
            
			$dbs['from'] = 'admin';
			$dbs['where']['email'] = $data['email'];
			$dbs['where']['password'] = $data['password'];
			
			$res = $this->getdb->getall($dbs);
			
			if(sizeof($res) === 1){
				$this->session->set_userdata('adminstate',$res[0]['idadm']);
				$json['redirect'] = './';
			}
			$res = sizeof($res);
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
    public function logout(){
		$this->session->unset_userdata('adminstate');
		redirect();
	}

}

/* End of file Login.php */
