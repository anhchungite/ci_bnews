<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Public_bnews extends VNE_Controller{
	public function index(){
		$this->load->view("layout/public/layout", $this->data);
	}
	public function tintuc($page = 1){
		// Phân trang
		$total_rows = $this->News_Model->NumRow();
		$maxpage = ceil($total_rows / PER_PAGE);
		if($page < 1 || $page > $maxpage){
			redirect(base_url('tin-tuc'));
			exit();
		}
		$config['base_url'] = base_url('tin-tuc');
		$config['total_rows'] = $total_rows;
		$config['per_page'] = PER_PAGE;
		$config['uri_segment'] = 2;
		$this->pagination->initialize($config);
		
		$this->data['arrAllNews'] = $this->News_Model->getAllNews($page);
		$this->data['title'] = "Tin tức - Dự án Bnews";
		$this->load->view("layout/public/layout", $this->data);
	}
	public function danhmuc($id_cat, $page = 1){
		$this->data['arrNameCat'] = $this->Cat_Model->getNameCat($id_cat);
		$url_cat = convertUrl($this->data['arrNameCat']['name']);
		if(count($this->data['arrNameCat']) <= 0){
			redirect(base_url('public_bnews/index'));
			exit();
		}
		//Phân trang
		$total_rows = $this->News_Model->NumRowCat($id_cat);
		
		$config['base_url'] = base_url().'danh-muc/'.$url_cat.'-'.$id_cat;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = PER_PAGE;
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		
		$this->data['arrNewsCat'] = $this->News_Model->getNewsCat($id_cat, $page);
		$this->data['title'] = "Danh mục - Dự án Bnews";
		$this->load->view("layout/public/layout", $this->data);
	}
	public function chitiet($id_news){
		$this->data['arrDetail'] = $this->News_Model->getDetailNews($id_news);
		if(count($this->data['arrDetail']) <= 0){
			redirect(base_url('public_bnews/index'));
			exit();
		}
		$id_cat = $this->data['arrDetail']['id_cat'];
		$this->data['arrRelated'] = $this->News_Model->getRelatedNews($id_cat, $id_news);
		$this->data['title'] = "Chi tiết - Dự án Bnews";
		$this->load->view("layout/public/layout", $this->data);
	}
}