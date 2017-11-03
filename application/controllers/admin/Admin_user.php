<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Admin_user extends CI_Controller{
	public $data;
	public function __construct(){
		parent::__construct();
		$this->load->model('User_Model');
		// Kiểm tra đã đăng nhập hay chưa
		if(!$this->session->userdata('User_Info')){
			redirect(base_url('login/dologin'));
			exit();
		}
		$this->data['arrUserInfo'] = $this->session->userdata('User_Info');
	}
	public function index(){
		$this->data['arrUser'] = $this->User_Model->a_getAllUser();
		$this->data['title'] = "User - Back-end";
		$this->load->view("layout/admin/layout",$this->data);
	}
	public function edit($id_user){
		$this->data['arrUser'] = $this->User_Model->a_getUser($id_user);
		if (count($this->data['arrUser']) <= 0){
			redirect(base_url('admin/admin_user/index'));
			exit();
		}
		if($this->input->post('editUser')){
			$arrInput = $this->input->post();
			$arrUpdate = array();
			$arrUpdate['fullname'] = $arrInput['fullname'];
			if($arrInput['password'] != ""){
				$arrUpdate['password'] = md5($arrInput['password']);
			}
			$result = $this->User_Model->a_EditUser($id_user, $arrUpdate);
			if($result){
				redirect(base_url('admin/admin_user/index?msg=Sửa người dùng thành công'));
				exit();
			}else {
				$this->data['error'] = 'Có lỗi xảy ra khi sửa người dùng';
			}
		}
		$this->data['title'] = "Edit User - Back-end";
		$this->load->view("layout/admin/layout",$this->data);
	}
	public function del($id_user){
		if($id_user == 1 || $this->session->userdata('User_Info')['id_user'] == $id_user){
			redirect(base_url('admin/admin_user/index'));
			exit();
		}
		$this->data['arrUser'] = $this->User_Model->a_getUser($id_user);
		if (count($this->data['arrUser']) <= 0){
			redirect(base_url('admin/admin_user/index'));
			exit();
		}
		$result = $this->User_Model->a_DelUser($id_user);
		if($result){
			redirect(base_url('admin/admin_user/index?msg=Xóa người dùng thành công'));
			exit();
		}else {
			$this->data['error'] = 'Lỗi khi xóa người dùng';
		}
		$this->data['title'] = "Delete User - Back-end";
		$this->load->view("layout/admin/layout",$this->data);
	}
	public function add(){
		$this->data['arrUser'] = $this->User_Model->a_getAllUser();
		if($this->input->post('addUser')){
			$arrInput = $this->input->post();
			$arrInsert = array();
			$arrInsert['username'] = $arrInput['userName'];
			$arrInsert['fullname'] = $arrInput['fullName'];
			$arrInsert['password'] = md5($arrInput['password']);
			$this->data['arrCkUser'] = $this->User_Model->a_CkUser($arrInsert['username']);
			if(count($this->data['arrCkUser']) > 0){
				redirect(base_url('admin/admin_user/index?msg=Tên người dùng đã tồn tại'));
				exit();
			}
			$result = $this->User_Model->a_AddUser($arrInsert);
			if ($result){
				redirect(base_url('admin/admin_user/index?msg=Thêm người dùng thành công'));
				exit();
			}else {
				$this->data['error'] = 'Lỗi khi thêm người dùng';
			}
		}
		$this->data['title'] = "Add User - Back-end";
		$this->load->view("layout/admin/layout",$this->data);
	}
	
}