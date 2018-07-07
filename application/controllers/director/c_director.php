<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_director extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		//memanggil function dari MY_Controller
    $this->cekLogin();
    //validasi jika session dengan level director mengakses halaman ini maka akan dialihkan ke halaman director
    if ($this->session->userdata('level') == "sales") {
      redirect('director/c_director');
    }else if ($this->session->userdata('level') == "admin") {
	      redirect('director/c_director');
	    }
		$this->load->library('form_validation','session');
		$this->load->model('m_director');
    $this->load->helper(array('form','url'));
	}

	public function index()
	{
		$data['event'] = $this->m_director->tampil_event()->result();
		$data['company'] = $this->m_director->tampil_data();
		$data['users'] = $this->m_director->tampil_users();
		$data['booking'] = $this->m_director->booking();

				$query = $this->m_director->latest_book();
				$data['booking'] = null;
				if($query){
				$data['booking'] =  $query;
			}

    $this->load->view('templates/director/header', $data);
		$this->load->view('pages/director/index', $data);
    $this->load->view('templates/director/footer');
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
		$data['event'] = $this->m_director->tampil_event()->result();
		$query = $this->m_director->tampil_data();
		$data['company'] = null;
	  if($query){
	   $data['company'] =  $query;
	  }
    $this->load->view('templates/director/header', $data);
    $this->load->view('pages/director/company',$data);
    $this->load->view('templates/director/footer');
  }

	public function event1($event_id)
	{
		$data2['event'] = $this->m_director->tampil_event()->result();
		$where = $event_id;
		$data['whereid'] = $event_id;
		$query = $this->m_director->event1_book($where);
		$data['booking'] = null;
		if($query){
		$data['booking'] =  $query;
	}
		// $data['status'] = $this->m_sales->tampil_status()->result();
		$this->load->view('templates/director/header', $data2);
		$this->load->view('pages/director/event',$data);
		$this->load->view('templates/director/footer');
	}


		function myprofile()
		{
		$data['event'] = $this->m_director->tampil_event()->result();
		$this->load->view('templates/director/header', $data);
		$this->load->view('pages/director/myprofile', $data);
		$this->load->view('templates/director/footer');
	}



	public function change_password()
	{
		$this->form_validation->set_rules('new','New','required|alpha_numeric');
		$this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/director/header');
			$this->load->view('pages/director/change_password');
			$this->load->view('templates/director/footer');
			$this->session->set_flashdata('error','Your new password doesnt match !' );
		}else{
		$this->m_director->update_password();
		$this->session->sess_destroy();
		$this->session->set_flashdata('success','Your password success to change, please relogin !' );
		$this->load->view('templates/director/header');
		$this->load->view('pages/director/myprofile');
		$this->load->view('templates/director/footer');

		}//end if valid_user
	}
	function menu_floorplan(){
		$data['event'] = $this->m_director->tampil_event()->result();
		$this->load->view('templates/director/header', $data);
		$this->load->view('pages/director/menu_floorplan',$data);
		$this->load->view('templates/director/footer');
	}

	function floorplan($event_id){
		$data['event'] = $this->m_director->tampil_event()->result();
		$where = $event_id;
		$query = $this->m_director->tampil_floorplan($where);
		$data['floorplan'] = null;
		if($query){
		$data['floorplan'] =  $query;
	}
		$this->load->view('templates/director/header', $data);
		$this->load->view('pages/director/floorplan',$data);
		$this->load->view('templates/director/footer');
	}


			public function download_file($floorplan_id){
				$this->db->where('floorplan_id',$floorplan_id);
				$query = $this->db->get('floorplan');
				$row = $query->row();
				// fopen("./uploads/files/$row->file_name", "r");
				// force_download("./uploads/files/$row->file_name", NULL);
				$file = "./uploads/files/$row->file_name";
				$filename = "./uploads/files/$row->file_name";
				header('Content-type: application/pdf');
				header('Content-Disposition: inline; filename:"' . $filename . '"' );
				header('Content-Transfer-Encoding: binary');
				header('Accept-Ranger');
				@readfile($file);
			}

			public function print_company(){
						$data['event'] = $this->m_director->tampil_event()->result();
						$query = $this->m_director->tampil_data();
						$data['company'] = null;
						if($query){
						 $data['company'] =  $query;
						}
					 $this->load->library('pdf');
					 $this->pdf->setPaper('A4', 'potrait');
					 $this->pdf->filename = "company_print.pdf";
					 $this->pdf->load_view('pages/director/company_print_pdf', $data);
			}

			public function print_book($event_id){
				$data['event'] = $this->m_director->tampil_event()->result();
				$where = $event_id;
				$data['whereid'] = $event_id;
				$query = $this->m_director->event1_book($where);
				$data['booking'] = null;
				if($query){
				$data['booking'] =  $query;
			}
					 $this->load->library('pdf');
					 $this->pdf->setPaper('A4', 'potrait');
					 $this->pdf->filename = "book_print.pdf";
					 $this->pdf->load_view('pages/director/book_print_pdf', $data);
			}

			public function print_book_form($event_id){
				$data['event'] = $this->m_director->tampil_event()->result();
				$where = $event_id;
				$data['whereid'] = $event_id;
				$query = $this->m_director->event1_book($where);
				$data['booking'] = null;
				if($query){
				$data['booking'] =  $query;
			}
					 $this->load->library('pdf');
					 $this->pdf->setPaper('A4', 'potrait');
					 $this->pdf->filename = "book_print.pdf";
					 $this->pdf->load_view('pages/director/book_form_print_pdf', $data);
			}

			public function record_book()
			{
				$data['event'] = $this->m_director->tampil_event()->result();
				$query = $this->m_director->record_book();
				$data['record_book'] = null;
				if($query){
				 $data['record_book'] =  $query;
				}
				$this->load->view('templates/director/header', $data);
				$this->load->view('pages/director/record_book',$data);
				$this->load->view('templates/director/footer');
			}

			public function print_record_book(){
				$data['event'] = $this->m_director->tampil_event()->result();
				$query = $this->m_director->record_book();
				$data['record_book'] = null;
				if($query){
				$data['record_book'] =  $query;
			}
					 $this->load->library('pdf');
					 $this->pdf->setPaper('A4', 'potrait');
					 $this->pdf->filename = "record_book_print.pdf";
					 $this->pdf->load_view('pages/director/record_book_print_pdf', $data);
			}

}
