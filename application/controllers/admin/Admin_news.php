<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Admin_news extends CI_Controller{
	public $data;
	public function __construct(){
		parent::__construct();
		// Kiểm tra đã đăng nhập hay chưa
		if(!$this->session->userdata('User_Info')){
			redirect(base_url('login/dologin'));
			exit();
		}
		$this->load->model('News_Model');
		$this->load->model('Cat_Model');
		
		$this->data['arrCat'] = $this->Cat_Model->getAllCat();
	}
	public function index($page = 1){
		$this->load->library('pagination');
		$total_rows = $this->News_Model->NumRow();
		$maxpage = ceil($total_rows / PER_PAGE);
		// Kiểm tra số trang hợp lệ
		if($page < 1){
			$page = 1;
		}
		if($page > $maxpage){
			$page = $maxpage;
		}
		$this->data['arrGetNews'] = $this->News_Model->a_GetNews($page);
		$config['cur_tag_open'] = '<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['base_url'] = base_url('admin/admin_news/index');
		$config['total_rows'] = $total_rows;
		$config['per_page'] = PER_PAGE_ADMIN;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		
		$this->data['title'] = "News - Back-end";
		$this->load->view("layout/admin/layout",$this->data);
	}
	public function edit($id_news){
		// Kiểm tra id hợp lệ
		$this->data['arrDetail'] = $this->News_Model->getDetailNews($id_news);
		if(count($this->data['arrDetail']) <= 0){
			redirect(base_url('admin/admin_news/index'));
			exit();
		}
		$picture_old = $this->data['arrDetail']['picture'];
		// Xử lý nút Xóa
		if($this->input->post('delPic')){
			$this->file_library->del_file($picture_old);
			$arrUpdate['picture'] = "";
			$result = $this->News_Model->a_EditNews($id_news, $arrUpdate);
			if($result){
				redirect(base_url("admin/admin_news/edit/{$id_news}"));
				exit();
			}else {
				$this->data['error'] = "Có lỗi khi xóa hình";
			}
		}
		// Xử lý nút Sửa
		if($this->input->post('editNews')){
			$arrInput = $this->input->post();
			$arrUpdate = array();
			$arrUpdate['name'] = $arrInput['tentin'];
			$arrUpdate['id_cat'] = $arrInput['danhmuc'];
			$arrUpdate['preview_text'] = $arrInput['mota'];
			$arrUpdate['detail_text'] = $arrInput['chitiet'];
			
			$picture = $_FILES['hinhanh']['name'];
			if($picture == ""){
				$result = $this->News_Model->a_EditNews($id_news, $arrUpdate);
				if($result){
					redirect(base_url('admin/admin_news/index?msg=Sửa tin thành công'));
					exit();
				}else {
					$this->data['error'] = "Có lỗi khi sửa tin";
				}
			}else {
				$result_upload = $this->file_library->upload_file("hinhanh");
				if(count($result_upload) <= 1){
					$this->data['error'] = "Có lỗi xảy ra khi upload";
				}else{
					$this->file_library->del_file($picture_old);
					$arrUpdate['picture'] = $result_upload['arrFile']['file_name'];
					$result = $this->News_Model->a_EditNews($id_news, $arrUpdate);
					if($result){
						redirect(base_url('admin/admin_news/index?msg=Sửa tin thành công'));
						exit();
					}else {
						$this->data['error'] = "Có lỗi khi sửa tin";
					}
				}
			}
			
		}
		$this->data['title'] = "Edit News - Back-end";
		$this->load->view("layout/admin/layout",$this->data);
	}
	public function del($id_news){
		$this->data['arrDetail'] = $this->News_Model->getDetailNews($id_news);
		if(count($this->data['arrDetail']) <= 0){
			redirect(base_url('admin/admin_news/index'));
			exit();
		}
		if($id_news <= 0){
			redirect(base_url('admin/admin_news/index'));
			exit();
		}
		$result = $this->News_Model->a_DelNews($id_news);
		if($result){
			redirect(base_url('admin/admin_news/index?msg=Xóa thành công'));
			exit();
		}else {
			$this->data['error'] = "Có lỗi xảy ra";
		}
		$this->data['title'] = "Delete News - Back-end";
		$this->load->view("layout/admin/layout",$this->data);
	}
	public function add(){
		if($this->input->post('addNews')){
			$arrInput = $this->input->post();
			$arrInsert = array();
			$arrInsert['name'] = $arrInput['tentin'];
			$arrInsert['id_cat'] = $arrInput['danhmuc'];
			$arrInsert['preview_text'] = $arrInput['mota'];
			$arrInsert['detail_text'] = $arrInput['chitiet'];
			
			$picture = $_FILES['hinhanh']['name'];
			if($picture == ""){
				$result = $this->News_Model->a_AddNews($arrInsert);
				if($result){
					redirect(base_url('admin/admin_news/index?msg=Thêm tin thành công'));
					exit();
				}else {
					$this->data['error'] = "Có lỗi khi thêm tin";
				}
			}else{
				$result_upload = $this->file_library->upload_file("hinhanh");
				if(count($result_upload) <= 1){
					$this->data['error'] = "Có lỗi xảy ra khi upload";
				}else{
					$arrInsert['picture'] = $result_upload['arrFile']['file_name'];
					$result = $this->News_Model->a_AddNews($arrInsert);
					if($result){
						redirect(base_url('admin/admin_news/index?msg=Thêm tin thành công'));
						exit();
					}else {
						$this->data['error'] = "Có lỗi khi thêm tin";
					}
				}
				
			}
		}
		$this->data['title'] = "Add News - Back-end";
		$this->load->view("layout/admin/layout",$this->data);
	}
	
}