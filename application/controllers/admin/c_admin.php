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
		$data['users'] = $this->m_admin->tampil_users();
		$data['booking'] = $this->m_admin->booking();

				$query = $this->m_admin->latest_book();
				$data['booking'] = null;
				if($query){
				$data['booking'] =  $query;
			}

    $this->load->view('templates/admin/header', $data);
		$this->load->view('pages/admin/index', $data);
    $this->load->view('templates/admin/footer');
	}

	public function user()
	{
		$data['event'] = $this->m_admin->tampil_event()->result();
		$query = $this->m_admin->tampil_user_list();
		$data['users'] = null;
	  if($query){
	   $data['users'] =  $query;
	  }
		$this->load->view('templates/admin/header',$data );
		$this->load->view('pages/admin/user_list', $data);
		$this->load->view('templates/admin/footer');
	}

	public function add_user()
	{
		$data['event'] = $this->m_admin->tampil_event()->result();
		$this->load->view('templates/admin/header', $data);
		$this->load->view('pages/admin/add_user',$data);
		$this->load->view('templates/admin/footer');
	}

	function add_user_save()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('password','Password','required');
    $this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('contact','Contact','required');

		if($this->form_validation->run() != false){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$level = $this->input->post('level');
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$email = $this->input->post('email');
		$contact = $this->input->post('contact');
		$data = array(
			'username' => $username,
			'password' => $password,
			'level'=> $level,
			'name' => $name,
			'address' => $address,
			'email' => $email,
			'contact' => $contact,
			'active' => '1'
			);
		$this->m_admin->input_data($data,'users');
		$this->session->set_flashdata('success','Data saved');
		redirect('admin/c_admin/user');
	}else{
		$this->session->set_flashdata('error','Failed to save');
		$this->load->view('templates/admin/header');
		$this->load->view('pages/admin/add_user');
		$this->load->view('templates/admin/footer');
	}
}

function delete_user($id)
{
		$where = array('id' => $id );
		$data = array('active' => '0');
		$this->m_admin->update_data($where,$data,'users');
		$this->session->set_flashdata('success','user deleted');
		redirect('admin/c_admin/user');
	}

	function edit_user($id)
	{
		$data2['event'] = $this->m_admin->tampil_event()->result();
		$where = $id;
		$query = $this->m_admin->edit_user_data($where)->result();
		$data['users'] = null;
		if($query){
		$data['users'] =  $query;
				}
				// $data['company'] = $this->m_sales->edit_data($where,'company')->result();
				$this->load->view('templates/admin/header', $data2);
				$this->load->view('pages/admin/edit_user',$data);
				$this->load->view('templates/admin/footer');
		}

	function update_user()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('contact','Contact','required');

		if($this->form_validation->run() != false)
			{
				$id = $this->input->post('id');
				$username = $this->input->post('username');
				$name = $this->input->post('name');
				$level = $this->input->post('level');
				$address = $this->input->post('address');
				$email = $this->input->post('email');
				$contact = $this->input->post('contact');
				$data = array(
					'username' => $username,
					'name' => $name,
					'level'=> $level,
					'address' => $address,
					'email' => $email,
					'contact' => $contact,
					'active' => '1'
					);
					$where = array(
						'id' => $id
					);
				$this->m_admin->update_data($where,$data,'users');
				$this->session->set_flashdata('success','Data saved');
				redirect('admin/c_admin/user');
			}else
				{
					$this->session->set_flashdata('error','Failed to save');
					redirect('admin/c_admin/user');
				}
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

	public function add_company()
	{
		$data['event'] = $this->m_admin->tampil_event()->result();
		$data['category'] = $this->m_admin->tampil_category()->result();
		$this->load->view('templates/admin/header', $data);
		$this->load->view('pages/admin/add_company',$data);
		$this->load->view('templates/admin/footer');
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
		$this->m_admin->input_data($data,'company');
		$this->session->set_flashdata('success','Data saved');
		redirect('admin/c_admin/company');
	}else{
		$this->session->set_flashdata('error','Failed to save');
		$data['category'] = $this->m_admin->tampil_category()->result();
		$this->load->view('templates/admin/header');
		$this->load->view('pages/admin/add_company',$data);
		$this->load->view('templates/admin/footer');
	}
}

	function delete_company($company_id){
			$where = array('company_id' => $company_id );
			$this->m_admin->delete_data($where,'company');
			$this->session->set_flashdata('success','data deleted');
			redirect('admin/c_admin/company/');
	}

	function edit_company($company_id){
		$data2['event'] = $this->m_admin->tampil_event()->result();
			$data['category'] = $this->m_admin->tampil_category()->result();
			$where = $company_id;
			$query = $this->m_admin->edit_data($where)->result();
			$data['company'] = null;
		  if($query){
		   $data['company'] =  $query;
		  }
			// $data['company'] = $this->m_sales->edit_data($where,'company')->result();
			$this->load->view('templates/admin/header', $data2);
			$this->load->view('pages/admin/edit_company',$data);
			$this->load->view('templates/admin/footer');
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
	$this->m_admin->update_data($where,$data,'company');
	$this->session->set_flashdata('success','Data updated');
	redirect('admin/c_admin/company');
}else{
	$this->session->set_flashdata('error','Data failed to update');
	redirect('admin/c_admin/company');
	}
}

	function myprofile(){
	$data['event'] = $this->m_admin->tampil_event()->result();
	$this->load->view('templates/admin/header', $data);
	$this->load->view('pages/admin/myprofile', $data);
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
		}
	}

	function menu_floorplan(){
		$data['event'] = $this->m_admin->tampil_event()->result();
		$this->load->view('templates/admin/header', $data);
		$this->load->view('pages/admin/menu_floorplan',$data);
		$this->load->view('templates/admin/footer');
	}

	function floorplan($event_id){
		$data['event'] = $this->m_admin->tampil_event()->result();
		$where = $event_id;
		$query = $this->m_admin->tampil_floorplan($where);
		$data['floorplan'] = null;
		if($query){
		$data['floorplan'] =  $query;
	}
		$this->load->view('templates/admin/header', $data);
		$this->load->view('pages/admin/floorplan',$data);
		$this->load->view('templates/admin/footer');
	}

	function create_floorplan()
	{
			$data['event'] = $this->m_admin->tampil_event()->result();
				$this->load->view('templates/admin/header', $data);
				$this->load->view('pages/admin/add_floorplan');
				$this->load->view('templates/admin/footer');

				$data = array();
// If file upload form submitted
			if($this->input->post('fileSubmit') && !empty($_FILES['files']['name'])){
					$filesCount = count($_FILES['files']['name']);
					for($i = 0; $i < $filesCount; $i++){
							$_FILES['file']['name']     = $_FILES['files']['name'][$i];
							$_FILES['file']['type']     = $_FILES['files']['type'][$i];
							$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
							$_FILES['file']['error']     = $_FILES['files']['error'][$i];
							$_FILES['file']['size']     = $_FILES['files']['size'][$i];

							// File upload configuration
							$uploadPath = 'uploads/files/';
							$config['upload_path'] = $uploadPath;
							$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';

							// Load and initialize upload library
							$this->load->library('upload', $config);
							$this->upload->initialize($config);

							// Upload file to server
							if($this->upload->do_upload('file')){
									// Uploaded file data
									$fileData = $this->upload->data();
									//$this->input->post('event_id');
									$uploadData[$i]['title'] = $this->input->post('title');
									$uploadData[$i]['event_id'] = $this->input->post('event_id');
									$uploadData[$i]['floorplan_created_by'] = $this->session->userdata('username');
									$uploadData[$i]['file_name'] = $fileData['file_name'];
									$uploadData[$i]['description'] = $this->input->post('description');
							}
					}

					if(!empty($uploadData)){
							// Insert files data into the database
							$insert = $this->m_admin->insert_floorplan($uploadData);
							$this->session->set_flashdata('success','Data saved');
							redirect('admin/c_admin/menu_floorplan');
					}
				}
			}

			function delete_floorplan($floorplan_id){
					$this->db->where('floorplan_id',$floorplan_id);
					$query = $this->db->get('floorplan');
					$row = $query->row();
					unlink("./uploads/files/$row->file_name");

					$where = array('floorplan_id' => $floorplan_id );
					$this->m_admin->delete_data($where,'floorplan');
					$this->session->set_flashdata('success','data deleted');
					redirect('admin/c_admin/menu_floorplan/');
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

}
