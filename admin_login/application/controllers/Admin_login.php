<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {


	public function index()
	{
		$this->load->view('admin_login');
	}

	function login_check(){
		$resutl=$this->Login_model->login_check();
		if($resutl) {
			redirect(base_url().'index.php/basic_info');
	   } else {
		$this->session->set_flashdata('msg', 'Invalid Details');
		$this->session->set_flashdata('msg_class', 'bg-danger text-white');
		   redirect(base_url());
	   }
	}

	function admin_logout()
	{
		$this->session->unset_userdata('admin_name');
		$this->session->unset_userdata('admin_username');
		$this->session->unset_userdata('admin_login_id');
		$this->session->set_flashdata('msg', 'Successfully Logged Out');
		$this->session->set_flashdata('msg_class', 'bg-success text-white');
		redirect(base_url());
	}

}
