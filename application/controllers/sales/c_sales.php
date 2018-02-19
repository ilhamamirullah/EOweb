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
    $this->load->view('templates/sales/header');
		$this->load->view('pages/sales/index');
    $this->load->view('templates/sales/footer');
	}

  public function myclient()
  {
    $this->load->view('templates/sales/header');
    $this->load->view('pages/sales/myclient');
    $this->load->view('templates/sales/footer');
  }

  public function company()
  {
		$query = $this->m_sales->tampil_data();
		$data['company'] = null;
	  if($query){
	   $data['company'] =  $query;
	  }
    $this->load->view('templates/sales/header');
    $this->load->view('pages/sales/company',$data);
    $this->load->view('templates/sales/footer');
  }

	public function event1()
	{
		$this->load->view('templates/sales/header');
		$this->load->view('pages/sales/event');
		$this->load->view('templates/sales/footer');
	}

	public function add_company()
	{
		$data['category'] = $this->m_sales->tampil_category()->result();
		$this->load->view('templates/sales/header');
		$this->load->view('pages/sales/add_company',$data);
		$this->load->view('templates/sales/footer');
	}

	function add_company_save()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('company_name','Company Name','required');
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
		$created_by = $this->session->userdata('username');
		$data = array(
			'category_id' => $id_category,
			'company_name' => $name,
			'address' => $address,
			'website' => $website,
			'pic' => $pic,
			'email' => $email,
			'pic_contact' => $pic_contact,
			'created_by' => $created_by
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
			$data['category'] = $this->m_sales->tampil_category()->result();
			$where = $company_id;
			$query = $this->m_sales->edit_data($where)->result();
			$data['company'] = null;
		  if($query){
		   $data['company'] =  $query;
		  }
			// $data['company'] = $this->m_sales->edit_data($where,'company')->result();
			$this->load->view('templates/sales/header');
			$this->load->view('pages/sales/edit_company',$data);
			$this->load->view('templates/sales/footer');
	}

	function update_company(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('company_name','Company Name','required');
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
		$updated_by = $this->session->userdata('username');
		$data = array(
			'category_id' => $category_id,
			'company_name' => $name,
			'address' => $address,
			'website' => $website,
			'pic' => $pic,
			'email' => $email,
			'pic_contact' => $pic_contact,
			'updated_by' => $updated_by
		);
	$where = array(
		'company_id' => $company_id
	);
	$this->m_sales->update_data($where,$data,'company');
	$this->session->set_flashdata('success','Data updated');
	redirect('sales/c_sales/company/edit_company');
}else{
	$this->session->set_flashdata('error','Data failed to update');
	redirect('sales/c_sales/company/edit_company');
}

}
}
