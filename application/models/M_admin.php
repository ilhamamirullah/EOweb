<?php

class M_admin extends CI_Model{

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

	function tampil_user_list(){
		$this->db->select('*');
		$this->db->from('users');
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

	function edit_user_data($where){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where("id",$where);
		return $query = $this->db->get();
}

	function edit_data($where){
		$this->db->select('*');
		$this->db->from('company');
		$this->db->join('category', 'category.category_id = company.category_id');
		$this->db->where("company_id",$where);
		return $query = $this->db->get();
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

	function update_data($where,$data,$table){
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

	function tampil_floorplan($where){
		$this->db->select('*');
		$this->db->from('floorplan');
		$this->db->join('event', 'event.event_id = floorplan.event_id');
		$this->db->where("floorplan.event_id",$where);
		$query = $this->db->get();
		return $query->result();
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
$odl = md5($this->input->post('old'));
$this->db->where('password',$old);
$query = $this->db->get('users');
return $query->result();;
}

public function insert_floorplan($data = array()){
		$insert = $this->db->insert_batch('floorplan',$data);
		return $insert?true:false;
}

public function latest_book(){
	$this->db->select('*');
	$this->db->from('booking');
	$this->db->join('event', 'event.event_id = booking.event_id');
	$this->db->join('company', 'company.company_id = booking.company_id');
	$this->db->join('status', 'status.status_id = booking.status_id');
	$this->db->join('users', 'users.id = booking.user_id');
	$this->db->order_by('booking_updated_at', 'desc')->limit(5);
	$query = $this->db->get();
	return $query->result();
}

public function booking(){
	return $this->db->get('booking');
}

function edit_event($where){
	$this->db->select('*');
	$this->db->from('event');
	$this->db->where("event_id",$where);
	return $query = $this->db->get();
}

function update_event($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
}

function record_book(){
	$this->db->select('*');
	$this->db->from('record_booking');
	$this->db->join('booking', 'booking.booking_id = record_booking.booking_id');
	$this->db->join('users', 'users.id = record_booking.user_id');
	$this->db->join('event', 'event.event_id = record_booking.event_id');
	$this->db->join('company', 'company.company_id = record_booking.company_id');
	$this->db->join('status', 'status.status_id = record_booking.status_id');
	$this->db->order_by('record_booking.booking_id', "asc");
	$query = $this->db->get();
	return $query->result();
}

}
