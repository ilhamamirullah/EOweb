<?php

class m_sales extends CI_Model{

	function tampil_data(){
		$this->db->select('*');
		$this->db->from('company');
		$this->db->join('category', 'category.category_id = company.category_id');
		$query = $this->db->get();
		return $query->result();
	}

	function tampil_category(){
		return $this->db->get('category');
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_data($where){
		$this->db->select('*');
		$this->db->from('company');
		$this->db->join('category', 'category.category_id = company.category_id');
		$this->db->where("company_id",$where);
		return $query = $this->db->get();
}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function tampil_status()
	{
		return $this->db->get('status');
	}

	function tampil_event()
	{
		return $this->db->get('event	');
	}

}
