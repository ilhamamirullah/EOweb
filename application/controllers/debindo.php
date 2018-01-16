<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class debindo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
    $this->load->helper('url');
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
		$data['company'] = $this->m_data->tampil_data()->result();
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
		$data['company'] = $this->m_data->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('pages/add_company',$data);
		$this->load->view('templates/footer');
	}

	function add_company_save(){
		$id_category = $this->input->post('id_category');
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$email = $this->input->post('email');
		$website = $this->input->post('website');
		$pic = $this->input->post('pic');
		$pic_contact = $this->input->post('pic_contact');
		$data = array(
			'id_category' => $id_category,
			'name' => $name,
			'address' => $address,
			'email' => $email,
			'website' => $website,
			'pic' => $pic,
			'pic_contact' => $pic_contact
			);
		$this->m_data->input_data($data,'company');
		redirect('debindo');
	}

}
