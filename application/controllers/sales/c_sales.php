<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_sales extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		//memanggil function dari MY_Controller
    $this->cekLogin();
    //validasi jika session dengan level sales mengakses halaman ini maka akan dialihkan ke halaman sales
    if ($this->session->userdata('level') == "director") {
      redirect('sales/c_sales');
    }
		$this->load->library('form_validation','session');
		$this->load->model('m_sales');
    $this->load->helper(array('form','url'));
	}

	public function index()
	{
		$data['event'] = $this->m_sales->tampil_event()->result();
		$data['company'] = $this->m_sales->tampil_data();
    $this->load->view('templates/sales/header', $data);
		$this->load->view('pages/sales/index', $data);
    $this->load->view('templates/sales/footer');
	}

  public function myclient()
  {
		// $data['users'] = $this->m_sales->tampil_users()->result();
		$data['event'] = $this->m_sales->tampil_event()->result();
		$query = $this->m_sales->tampil_client();
		$data['booking'] = null;
	  if($query){
	   $data['booking'] =  $query;
	  }
    $this->load->view('templates/sales/header', $data);
    $this->load->view('pages/sales/myclient', $data);
    $this->load->view('templates/sales/footer');
  }

  public function company()
  {
		$data['event'] = $this->m_sales->tampil_event()->result();
		$query = $this->m_sales->tampil_data();
		$data['company'] = null;
	  if($query){
	   $data['company'] =  $query;
	  }
    $this->load->view('templates/sales/header', $data);
    $this->load->view('pages/sales/company',$data);
    $this->load->view('templates/sales/footer');
  }

	public function event1($event_id)
	{
		$data2['event'] = $this->m_sales->tampil_event()->result();
		$where = $event_id;
		$query = $this->m_sales->event1_book($where);
		$data['booking'] = null;
		if($query){
		$data['booking'] =  $query;
	}
		// $data['status'] = $this->m_sales->tampil_status()->result();
		$this->load->view('templates/sales/header', $data2);
		$this->load->view('pages/sales/event',$data);
		$this->load->view('templates/sales/footer');
	}

	public function add_company()
	{
		$data['event'] = $this->m_sales->tampil_event()->result();
		$data['category'] = $this->m_sales->tampil_category()->result();
		$this->load->view('templates/sales/header', $data);
		$this->load->view('pages/sales/add_company',$data);
		$this->load->view('templates/sales/footer');
	}

	function add_company_save()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('company_name','Company Name','trim|required|is_unique[company.company_name]');
		$this->form_validation->set_rules('category_id','Category','required');
    $this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('pic','PIC','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('pic_contact','PIC Contact','required');

		if($this->form_validation->run() != false){
		$id_category = $this->input->post('category_id');
		$name = $this->input->post('company_name');
		$address = $this->input->post('address');
		$website = $this->input->post('website');
		$pic = $this->input->post('pic');
		$email = $this->input->post('email');
		$pic_contact = $this->input->post('pic_contact');
		$company_created_by = $this->session->userdata('username');
		$data = array(
			'category_id' => $id_category,
			'company_name' => $name,
			'address' => $address,
			'website' => $website,
			'pic' => $pic,
			'email' => $email,
			'pic_contact' => $pic_contact,
			'company_created_by' => $company_created_by
			);
		$this->m_sales->input_data($data,'company');
		$this->session->set_flashdata('success','Data saved');
		redirect('sales/c_sales/company');
	}else{
		$this->session->set_flashdata('error','Failed to save');
		$data['category'] = $this->m_sales->tampil_category()->result();
		$this->load->view('templates/sales/header');
		$this->load->view('pages/sales/add_company',$data);
		$this->load->view('templates/sales/footer');
	}
}

	function delete_company($company_id){
			$where = array('company_id' => $company_id );
			$this->m_sales->delete_data($where,'company');
			$this->session->set_flashdata('success','data deleted');
			redirect('sales/c_sales/company/');
	}

	function edit_company($company_id){
		$data2['event'] = $this->m_sales->tampil_event()->result();
			$data['category'] = $this->m_sales->tampil_category()->result();
			$where = $company_id;
			$query = $this->m_sales->edit_data($where)->result();
			$data['company'] = null;
		  if($query){
		   $data['company'] =  $query;
		  }
			// $data['company'] = $this->m_sales->edit_data($where,'company')->result();
			$this->load->view('templates/sales/header', $data2);
			$this->load->view('pages/sales/edit_company',$data);
			$this->load->view('templates/sales/footer');
	}

	function edit_myclient($booking_id)
	{
		$data2['event'] = $this->m_sales->tampil_event()->result();
				$where = $booking_id;
				$query = $this->m_sales->edit_clientdata($where)->result();
				$data['booking'] = null;
				if($query){
				$data['booking'] =  $query;
			}
				 $data['status'] = $this->m_sales->tampil_status()->result();
				$this->load->view('templates/sales/header', $data2);
				$this->load->view('pages/sales/edit_myclient',$data);
				$this->load->view('templates/sales/footer');
	}

	function update_company(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('company_name','Company Name','required');
		$this->form_validation->set_rules('category_id','Category','required');
    $this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('pic','PIC','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('pic_contact','PIC Contact','required');

		if($this->form_validation->run() != false){
		$company_id = $this->input->post('company_id');
		$category_id = $this->input->post('category_id');
		$name = $this->input->post('company_name');
		$address = $this->input->post('address');
		$website = $this->input->post('website');
		$pic = $this->input->post('pic');
		$email = $this->input->post('email');
		$pic_contact = $this->input->post('pic_contact');
		$company_updated_by = $this->session->userdata('username');
		$data = array(
			'category_id' => $category_id,
			'company_name' => $name,
			'address' => $address,
			'website' => $website,
			'pic' => $pic,
			'email' => $email,
			'pic_contact' => $pic_contact,
			'company_updated_by' => $company_updated_by
		);
	$where = array(
		'company_id' => $company_id
	);
	$this->m_sales->update_data($where,$data,'company');
	$this->session->set_flashdata('success','Data updated');
	redirect('sales/c_sales/company');
}else{
	$this->session->set_flashdata('error','Data failed to update');
	redirect('sales/c_sales/company');
}

}
	function choose_client()
	{
		$data['event'] = $this->m_sales->tampil_event()->result();
		$query = $this->m_sales->tampil_data();
		$data['company'] = null;
	  if($query){
	   $data['company'] =  $query;
	  }
		$this->load->view('templates/sales/header', $data);
		$this->load->view('pages/sales/choose_client',$data);
		$this->load->view('templates/sales/footer');
	}

	function add_myclient($company_id)
	{
		$data['event'] = $this->m_sales->tampil_event()->result();
		$where = $company_id;
		$query = $this->m_sales->edit_data($where)->result();
		$data['company'] = null;
		if($query){
		$data['company'] =  $query;
	}
		$data['status'] = $this->m_sales->tampil_status()->result();
		$this->load->view('templates/sales/header', $data);
		$this->load->view('pages/sales/add_myclient',$data);
		$this->load->view('templates/sales/footer');
	}

	function save_myclient()
	{
		$this->load->library('form_validation');
    $this->form_validation->set_rules('event_id','event id','required');
		$this->form_validation->set_rules('status_id','status id','required');

		if($this->form_validation->run() != false){
		$event_id = $this->input->post('event_id');
		$company_id = $this->input->post('company_id');
		$status_id = $this->input->post('status_id');
		$user_id = $this->session->userdata('id');
		$stand = $this->input->post('stand');
		$sqm = $this->input->post('sqm');
		$notes = $this->input->post('notes');
		$booking_created_by = $this->session->userdata('username');
		$data = array(
			'event_id' => $event_id,
			'company_id' => $company_id,
			'status_id' => $status_id,
			'user_id' => $user_id,
			'stand' => $stand,
			'sqm' => $sqm,
			'notes' => $notes,
			'booking_created_by' => $booking_created_by
			);
		$this->m_sales->input_clientdata($data,'booking');
		$this->session->set_flashdata('success','Data saved');
		redirect('sales/c_sales/myclient');
	}else{
		$this->session->set_flashdata('error','Failed to save');
		redirect('sales/c_sales/myclient');
		}
	}


	function update_myclient()
	{
		$booking_id = $this->input->post('booking_id');
		$event_id = $this->input->post('event_id');
		$company_id = $this->input->post('company_id');
		$status_id = $this->input->post('status_id');
		$user_id = $this->session->userdata('id');
		$stand = $this->input->post('stand');
		$sqm = $this->input->post('sqm');
		$notes = $this->input->post('notes');
		$booking_created_by = $this->session->userdata('username');
		$data = array(
			'event_id' => $event_id,
			'company_id' => $company_id,
			'status_id' => $status_id,
			'user_id' => $user_id,
			'stand' => $stand,
			'sqm' => $sqm,
			'notes' => $notes,
			'booking_created_by' => $booking_created_by
			);
			$where = array(
				'booking_id' => $booking_id
			);
			$this->m_sales->update_myclient($where,$data,'booking');
			$this->session->set_flashdata('success','Data updated');
			redirect('sales/c_sales/myclient');
	}

	function myprofile(){
		$this->load->view('templates/sales/header');
		$this->load->view('pages/sales/myprofile');
		$this->load->view('templates/sales/footer');
	}



	public function change_password()
	{
		$this->form_validation->set_rules('new','New','required|alpha_numeric');
		$this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/sales/header');
			$this->load->view('pages/sales/change_password');
			$this->load->view('templates/sales/footer');
			$this->session->set_flashdata('error','Your new password doesnt match !' );
		}else{
		$this->m_sales->update_password();
		$this->session->sess_destroy();
		$this->session->set_flashdata('success','Your password success to change, please relogin !' );
		$this->load->view('templates/sales/header');
		$this->load->view('pages/sales/myprofile');
		$this->load->view('templates/sales/footer');

		}//end if valid_user
		}

		function floorplan($event_id){
			$data['event'] = $this->m_sales->tampil_event()->result();
			$where = $event_id;
			$query = $this->m_sales->tampil_floorplan($where);
			$data['floorplan'] = null;
			if($query){
			$data['floorplan'] =  $query;
		}
			$this->load->view('templates/sales/header', $data);
			$this->load->view('pages/sales/floorplan',$data);
			$this->load->view('templates/sales/footer');
		}


}
