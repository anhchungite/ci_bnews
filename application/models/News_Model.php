<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class News_Model extends CI_Model{
	public $table;
	public function __construct(){
		parent::__construct();
		$this->table = "news";
	}
	public function getAllNews($page){
		$offset = ($page * PER_PAGE) - PER_PAGE;
		$this->db->order_by('id_news','DESC');
		$this->db->limit(PER_PAGE, $offset);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
	public function getNewsCat($id_cat, $page){
		$offset = ($page * PER_PAGE) - PER_PAGE;
		$this->db->order_by("id_news","DESC");
		$this->db->limit(PER_PAGE, $offset);
		$query = $this->db->get_where($this->table, array('id_cat'=>$id_cat));
		return $query->result_array();
	}
	public function getDetailNews($id_news){
		$query = $this->db->get_where($this->table, array('id_news' => $id_news));
		return $query->row_array();
	}
	public function getRelatedNews($id_cat, $id_news){
		$sql = "SELECT * FROM {$this->table} WHERE id_cat = ? && id_news != ? ORDER BY id_news DESC LIMIT 3";
		$query = $this->db->query($sql, array($id_cat, $id_news));
		return $query->result_array();
	}
	//Phân trang
	public function NumRow(){
		//return $this->db->count_all($this->table);
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}
	public function NumRowCat($id_cat){
		$query = $this->db->get_where($this->table,array('id_cat' => $id_cat));
		return $query->num_rows();
	}
	/* ADMIN */
	
	public function a_GetNews($page){
		$offset = ($page * PER_PAGE_ADMIN) - PER_PAGE_ADMIN;
		$this->db->select('n.id_news,n.name as tentt,n.picture, c.name as tendmt');
		$this->db->from("{$this->table} n");
		$this->db->join("category c", "c.id_cat = n.id_cat");
		$this->db->order_by('id_news','DESC');
		$this->db->limit(PER_PAGE_ADMIN, $offset);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function a_DelNews($id_news){
		return $this->db->delete($this->table,array("id_news" => $id_news));
	}
	public function a_AddNews($arrData){
		return $this->db->insert($this->table,$arrData);
	}
	public function a_EditNews($id_news, $arrData){
		$this->db->where('id_news', $id_news);
		return $this->db->update($this->table, $arrData);
	}
}