<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    function login_check(){
        $username=$this->input->post('username');
		$password=$this->input->post('password');
		
		$this->db->select('*');
		$this->db->from('admin_login');
		$this->db->where('admin_username',$username);
		$this->db->where('admin_password',$password);
		$query=$this->db->get();
		$login=$query->row();
        
		if($login){
			$this->session->set_userdata('admin_name',$login->admin_name);
			$this->session->set_userdata('admin_username',$login->admin_username);
            $this->session->set_userdata('admin_login_id',$login->admin_login_id);
            
			return 1;
		} else {
			return 0;
		}
    }
	
}
