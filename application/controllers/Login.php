<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login extends VNE_Controller{
	public $data;
	public function __construct(){
		parent::__construct();
		$this->load->model('User_Model');
	}
	public function dologin(){
		// Kiểm tra đã đăng nhập hay chưa
		if($this->session->userdata('User_Info')){
			redirect(base_url('admin'));
			exit();
		}
		if($this->input->post('login')){
			$arrInput = $this->input->post();
			$username = $arrInput['username'];
			$password = md5($arrInput['password']);
			if($username != "" && $password != ""){
				
				$arrUserInfo = $this->User_Model->a_Login($username, $password);
				if(count($arrUserInfo) <= 0){
					$this->data['error'] = "Sai mật khẩu hoặc tên đăng nhập";
				}else {
					$this->session->set_userdata('User_Info', $arrUserInfo);
					redirect(base_url('admin/admin_index'));
					exit();
				}
			}else {
				$this->data['error'] = "Vui lòng nhập User Name & Password";
			}
		}
		$this->data['title'] = "Đăng nhập - Back-end";
		$this->load->view("layout/login/layout",$this->data);
	}
	public function logout(){
		if($this->session->userdata('User_Info')){
			$this->session->unset_userdata('User_Info');
			redirect(base_url('login/dologin'));
			exit();
		}
	}
	
}