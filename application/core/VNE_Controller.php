<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class VNE_Controller extends CI_Controller{
	public $data;
	public function __construct(){
		parent::__construct();
			$this->data['title'] = "Dự án Bnews";
			$this->data['arrCat'] = $this->Cat_Model->getAllCat();
			$this->load->model('News_Model');
			//$this->load->helper('url');
			//$this->load->library('file_library');
	}
}