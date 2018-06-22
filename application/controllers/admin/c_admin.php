<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_admin extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		//memanggil function dari MY_Controller
    $this->cekLogin();
    //validasi jika session dengan level admin mengakses halaman ini maka akan dialihkan ke halaman admin
    if ($this->session->userdata('level') == "sales") {
      redirect('admin/c_admin');
    }   else if ($this->session->userdata('level') == "director") {
          redirect('admin/c_admin');
        }
		$this->load->library('form_validation','session');
		$this->load->model('m_admin');
    $this->load->helper(array('form','url'));
	}

	public function index()
	{
		$data['event'] = $this->m_admin->tampil_event()->result();
		$data['company'] = $this->m_admin->tampil_data();
    $this->load->view('templates/admin/header', $data);
		$this->load->view('pages/admin/index', $data);
    $this->load->view('templates/admin/footer');
	}

  //public function myclient()
  //{
		// $data['users'] = $this->m_sales->tampil_users()->result();
		//$data['event'] = $this->m_sales->tampil_event()->result();
		//$query = $this->m_sales->tampil_client();
		//$data['booking'] = null;
	  //if($query){
	   //$data['booking'] =  $query;
	  //}
    //$this->load->view('templates/sales/header', $data);
    //$this->load->view('pages/sales/myclient', $data);
    //$this->load->view('templates/sales/footer');
  //}

  public function company()
  {
		$data['event'] = $this->m_admin->tampil_event()->result();
		$query = $this->m_admin->tampil_data();
		$data['company'] = null;
	  if($query){
	   $data['company'] =  $query;
	  }
    $this->load->view('templates/admin/header', $data);
    $this->load->view('pages/admin/company',$data);
    $this->load->view('templates/admin/footer');
  }

	public function event1($event_id)
	{
		$data2['event'] = $this->m_admin->tampil_event()->result();
		$where = $event_id;
		$query = $this->m_admin->event1_book($where);
		$data['booking'] = null;
		if($query){
		$data['booking'] =  $query;
	}
		// $data['status'] = $this->m_sales->tampil_status()->result();
		$this->load->view('templates/admin/header', $data2);
		$this->load->view('pages/admin/event',$data);
		$this->load->view('templates/admin/footer');
	}


		function myprofile()
		{
		$this->load->view('templates/admin/header');
		$this->load->view('pages/admin/myprofile');
		$this->load->view('templates/admin/footer');
	}



	public function change_password()
	{
		$this->form_validation->set_rules('new','New','required|alpha_numeric');
		$this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/admin/header');
			$this->load->view('pages/admin/change_password');
			$this->load->view('templates/admin/footer');
			$this->session->set_flashdata('error','Your new password doesnt match !' );
		}else{
		$this->m_admin->update_password();
		$this->session->sess_destroy();
		$this->session->set_flashdata('success','Your password success to change, please relogin !' );
		$this->load->view('templates/admin/header');
		$this->load->view('pages/admin/myprofile');
		$this->load->view('templates/admin/footer');

		}//end if valid_user
	}
}
