<?php defined('BASEPATH') OR exit('No direct script access allowed');

class C_director extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    //memanggil function dari MY_Controller
    $this->cekLogin();
    //validasi jika session dengan level sales mengakses halaman ini maka akan dialihkan ke halaman sales
    if ($this->session->userdata('level') == "sales") {
      redirect('sales/c_sales');
    }
}

  public function index()
  {
    $this->load->view('pages/director/Dashboard');
  }
}
