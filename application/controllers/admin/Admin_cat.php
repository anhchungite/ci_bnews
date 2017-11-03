<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Admin_cat extends CI_Controller{
	public $data;
	public function __construct(){
		parent::__construct();
		// Kiểm tra đã đăng nhập hay chưa
		if(!$this->session->userdata('User_Info')){
			redirect(base_url('login/dologin'));
			exit();
		}
		$this->load->model('Cat_Model');
	}
	public function index(){
		$this->data['arrCat'] = $this->Cat_Model->getAllCat();
		$this->data['title'] = "Category - Back-end";
		$this->load->view("layout/admin/layout",$this->data);
	}
	public function edit($id_cat){
		if($this->session->userdata('User_Info')['id_user'] != 1){
			redirect(base_url('admin/admin_cat/index'));
			exit();
		}
		$this->data['arrCat'] = $this->Cat_Model->a_getCat($id_cat);
		if(count($this->data['arrCat']) <= 0){
			redirect(base_url('admin/admin_cat/index'));
			exit();
		}
		if($this->input->post('editCat')){
			$arrUpdate = array();
			$arrInput = $this->input->post();
			$arrUpdate['name'] = $arrInput['name_cat'];
			$result = $this->Cat_Model->a_EditCat($id_cat, $arrUpdate);
			if($result){
				redirect(base_url('admin/admin_cat/index?msg=Sửa danh mục thành công'));
				exit();
			}else{
				$this->data['error'] = "Có lỗi khi sửa danh mục";
			}
		}
		$this->data['title'] = "Edit Category - Back-end";
		$this->load->view("layout/admin/layout",$this->data);
	}
	public function del($id_cat){
		if($this->session->userdata('User_Info')['id_user'] != 1){
			redirect(base_url('admin/admin_cat/index'));
			exit();
		}
		$this->data['arrCat'] = $this->Cat_Model->a_getCat($id_cat);
		if(count($this->data['arrCat']) <= 0){
			redirect(base_url('admin/admin_cat/index'));
			exit();
		}
		$result = $this->Cat_Model->a_DelCat($id_cat);
		if($result){
			redirect(base_url('admin/admin_cat/index?msg=Xóa danh mục thành công'));
			exit();
		}else {
			$this->data['error'] = "Có lỗi khi xóa danh mục";
		}
		$this->data['title'] = "Delete Category - Back-end";
		$this->load->view("layout/admin/layout",$this->data);
	}
	public function add(){
		if($this->input->post('addCat')){
			$arrInsert = array();
			$arrInput = $this->input->post();
			$arrInsert['name'] = $arrInput['name_cat'];
			$result = $this->Cat_Model->a_AddCat($arrInsert);
			if($result){
				redirect(base_url('admin/admin_cat/index?msg=Thêm danh mục thành công'));
				exit();
			}else{
				$this->data['error'] = "Có lỗi khi thêm danh mục";
			}
		}
		$this->data['title'] = "Add Category - Back-end";
		$this->load->view("layout/admin/layout",$this->data);
	}
	
}