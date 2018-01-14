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
		$this->load->view('templates/header');
		$this->load->view('pages/add_company');
		$this->load->view('templates/footer');
	}
}
