<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->webop = $this->getdb->getall(['from' => 'op_site']);
		$this->webop = $this->webop[0];
		if($this->session->userdata('adminstate') !== null){
			$dbs['from'] = 'admin';
			$dbs['where']['idadm'] = $this->session->userdata('adminstate');
			$this->adminData = $this->getdb->getall($dbs);
			$this->adminData = $this->adminData[0];

		} else {
			$this->template->content->view('login');
			$this->template->publish();
		}

	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */