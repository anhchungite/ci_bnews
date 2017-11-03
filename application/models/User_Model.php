<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class User_Model extends CI_Model{
	public $table;
	public function __construct(){
		parent::__construct();
		$this->table = "users";
	}
	public function a_Login($username, $password){
		$query = $this->db->get_where($this->table, array('username' => $username, 'password' => $password));
		return $query->row_array();
	}
	public function a_getAllUser(){
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
	public function a_getUser($id_user){
		$query = $this->db->get_where($this->table, array('id_user' => $id_user));
		return $query->row_array();
	}
	public function a_CkUser($username){
		$query = $this->db->get_where($this->table, array('username' => $username));
		return $query->row_array();
	}
	public function a_AddUser($arrData){
		return $this->db->insert($this->table, $arrData);
	}
	public function a_EditUser($id_user, $arrData){
		$this->db->where('id_user', $id_user);
		return $this->db->update($this->table, $arrData);
	}
	public function a_DelUser($id_user){
		return $this->db->delete($this->table, array('id_user' => $id_user));
	}
}