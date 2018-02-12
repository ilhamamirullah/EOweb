<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_data');
    $this->load->helper(array('form','url'));
	}

  public function index()
  {
    $this->load->view('pages/login');
  }

}
