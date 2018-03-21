<?php

class m_sales extends CI_Model{

	function tampil_data(){
		$this->db->select('*');
		$this->db->from('company');
		$this->db->join('category', 'category.category_id = company.category_id');
		$query = $this->db->get();
		return $query->result();
	}

	function company(){
		return $this->db->get('company');
	}

	function tampil_client(){
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('event', 'event.event_id = booking.event_id');
		$this->db->join('company', 'company.company_id = booking.company_id');
		$this->db->join('status', 'status.status_id = booking.status_id');
		$this->db->join('users', 'users.id = booking.user_id');

		$query = $this->db->get();
		return $query->result();
	}


		function tampil_users(){
			return $this->db->get('users');
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

	function update_myclient($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function event1_book($where){
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('event', 'event.event_id = booking.event_id');
		$this->db->join('company', 'company.company_id = booking.company_id');
		$this->db->join('status', 'status.status_id = booking.status_id');
		$this->db->join('users', 'users.id = booking.user_id');
		$this->db->where("booking.event_id",$where);
		$query = $this->db->get();
		return $query->result();
	}

	function tampil_status()
	{
		return $this->db->get('status');
	}

	function tampil_event()
	{
		return $this->db->get('event');
	}

	function input_clientdata($data,$table){
		$this->db->insert($table,$data);
	}

	function edit_clientdata($where){
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('event', 'event.event_id = booking.event_id');
		$this->db->join('company', 'company.company_id = booking.company_id');
		$this->db->join('status', 'status.status_id = booking.status_id');
		$this->db->join('users', 'users.id = booking.user_id');
		$this->db->where("booking_id",$where);
		return $query = $this->db->get();
	}

	public function update_password()
 {
  $password = md5($this->input->post('new'));
  $data = array (
   'password' => $password
   );
  $this->db->where('id', $this->session->userdata('id'));
  $this->db->update('users', $data);
 }

 public function cek_old()
{
 	$old = md5($this->input->post('old'));
	$this->db->where('password',$old);
 	$query = $this->db->get('users');
		return $query->result();;
	}

}
