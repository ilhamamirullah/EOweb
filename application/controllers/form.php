<?php

class Form extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_data');
		$this->load->helper(array('form','url'));
	}

	function index(){
		$data['company'] = $this->m_data->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('pages/add_company',$data);
		$this->load->view('templates/footer');
	}

	function aksi(){
		$this->form_validation->set_rules('name','Name','required');
    $this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('pic','PIC','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('pic_contact','PIC Contact','required');

		if($this->form_validation->run() != false){
			$id_category = $this->input->post('id_category');
			$name = $this->input->post('name');
			$address = $this->input->post('address');
			$website = $this->input->post('website');
			$pic = $this->input->post('pic');
			$email = $this->input->post('email');
			$pic_contact = $this->input->post('pic_contact');
			$data = array(
				'id_category' => $id_category,
				'name' => $name,
				'address' => $address,
				'website' => $website,
				'pic' => $pic,
				'email' => $email,
				'pic_contact' => $pic_contact
				);
			$this->m_data->input_data($data,'company');
			redirect('debindo/company');
		}else{
			$data['company'] = $this->m_data->tampil_data()->result();
			$this->load->view('templates/header');
			$this->load->view('pages/add_company',$data);
			$this->load->view('templates/footer');
		}
  }
}
