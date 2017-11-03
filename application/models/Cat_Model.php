<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Cat_Model extends CI_Model{
	public $table;
	public function __construct(){
		parent::__construct();
		$this->table = "category";
	}
	public function getAllCat(){
		$this->db->order_by('id_cat', 'DESC');
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
	public function getNameCat($id_cat){
		$query = $this->db->get_where($this->table, array('id_cat' => $id_cat));
		return $query->row_array();
	}
	/* ADMIN */
	public function a_getCat($id_cat){
		$query = $this->db->get_where($this->table, array('id_cat' => $id_cat));
		return $query->row_array();
	}
	public function a_DelCat($id_cat){
		return $this->db->delete($this->table, array('id_cat' => $id_cat));
	}
	public function a_EditCat($id_cat, $arrData){
		$this->db->where('id_cat',$id_cat);
		return $this->db->update($this->table, $arrData);
	}
	public function a_AddCat($arrData){
		return $this->db->insert($this->table,$arrData);
	}
}