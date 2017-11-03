<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Admin_index extends CI_Controller{
	public $data;
	public function __construct(){
		parent::__construct();
	// Kiểm tra đã đăng nhập hay chưa
		if(!$this->session->userdata('User_Info')){
			redirect(base_url('login/dologin'));
			exit();
		}
	}
	public function index(){
		// Kiểm tra đã đăng nhập hay chưa
		$this->data['title'] = "Home - Back-end";
		$this->load->view("layout/admin/layout",$this->data);
	}
	
}