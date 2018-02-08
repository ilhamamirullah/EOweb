<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class debindo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_data');
    $this->load->helper(array('form','url'));
	}

	public function index()
	{
    $this->load->view('templates/header');
		$this->load->view('index');
    $this->load->view('templates/footer');
	}

  public function myclient()
  {
    $this->load->view('templates/header');
    $this->load->view('pages/myclient');
    $this->load->view('templates/footer');
  }

  public function company()
  {
		$query = $this->m_data->tampil_data();
		$data['company'] = null;
	  if($query){
	   $data['company'] =  $query;
	  }
    $this->load->view('templates/header');
    $this->load->view('pages/company',$data);
    $this->load->view('templates/footer');
  }

	public function event1()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/event');
		$this->load->view('templates/footer');
	}

	public function add_company()
	{
		$data['category'] = $this->m_data->tampil_category()->result();
		$this->load->view('templates/header');
		$this->load->view('pages/add_company',$data);
		$this->load->view('templates/footer');
	}

	function add_company_save()
	{

		$this->form_validation->set_rules('company_name','Name','required');
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
		$data = array(
			'category_id' => $id_category,
			'company_name' => $name,
			'address' => $address,
			'website' => $website,
			'pic' => $pic,
			'email' => $email,
			'pic_contact' => $pic_contact
			);
		$this->m_data->input_data($data,'company');
		redirect('debindo/company');
	}else{
		$data['category'] = $this->m_data->tampil_category()->result();
		$this->load->view('templates/header');
		$this->load->view('pages/add_company',$data);
		$this->load->view('templates/footer');
	}
}

	function delete_company($id){
			$where = array('id' => $id );
			$this->m_data->delete_data($where,'company');
			redirect('debindo/company/');
	}

	function edit_company($id){
			$where = array('id' => $id);
			$data['company'] = $this->m_data->edit_data($where,'company')->result();
			$this->load->view('templates/header');
			$this->load->view('pages/edit_company',$data);
			$this->load->view('templates/footer');
	}

	function update_company(){
		$id = $this->input->post('id');
		$id_category = $this->input->post('category_id');
		$name = $this->input->post('company_name');
		$address = $this->input->post('address');
		$website = $this->input->post('website');
		$pic = $this->input->post('pic');
		$email = $this->input->post('email');
		$pic_contact = $this->input->post('pic_contact');
		$data = array(
			'category_id' => $id_category,
			'company_name' => $name,
			'address' => $address,
			'website' => $website,
			'pic' => $pic,
			'email' => $email,
			'pic_contact' => $pic_contact
		);
	$where = array(
		'id' => $id
	);
	$this->m_data->update_data($where,$data,'company');
	redirect('debindo/company/');
}


}
