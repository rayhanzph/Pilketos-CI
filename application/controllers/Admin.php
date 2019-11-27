<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Candidate_model');
		$this->load->model('Staff_model');
		if(!$this->session->userdata('username_admin') && !$this->session->userdata('role_id_admin')){
			redirect('Staff/blocked');
		}
		if($this->session->userdata('role_id_admin') !== 1 && $this->session->userdata('username_admin') !== 'admin'){
			redirect('Staff/blocked');
		}
	}
	public function index(){
		// CANDIDATE
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('staff',['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['menu'] = $this->db->get_where('menu',['role_id_admin' => $this->session->userdata('role_id_admin')])->result_array(); //ini query untuk menampilkan menu
		$data['all'] = $this->db->get('voter')->result_array();
		$data['voted'] = $this->db->get_where('voter',['status' => 1])->result_array();
		$data['not'] = $this->db->get_where('voter',['status' => 0])->result_array();
		$data['can'] = $this->db->get('candidate')->result_array();
		$data['staf'] = $this->Staff_model->getAllStaf();
		$this->load->view('layout/header_admin',$data);
		$this->load->view('layout/sidebar',$data);
		$this->load->view('layout/topbar',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_admin');
	}




	

	// function profile
	public function profile()
	{
		$data['title'] = 'Profile';
		$data['user'] = $this->db->get_where('staff',['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('layout/header_admin',$data);
		$this->load->view('admin/profile',$data);
		$this->load->view('layout/footer_admin');
	}

	// end profile

	// function staff
	public function staf()
	{
		$data['title'] = 'Staff';
		$data['user'] = $this->db->get_where('staff',['username' => $this->session->userdata('username')])->row_array();
		$data['staf'] = $this->Staff_model->getAllStaf();
		$this->load->view('layout/header_admin',$data);
		$this->load->view('admin/staff',$data);
		$this->load->view('layout/footer_admin');
	}
	public function on_staf($id)
	{
		$data = ['is_active' => 1];
		$this->db->where('id',$id);
		$this->db->update('staff',$data);
		redirect('Admin');
	}
	public function off_staf($id)
	{
		$data = ['is_active' => 0];
		$this->db->where('id',$id);
		$this->db->update('staff',$data);
		redirect('Admin');
	}
	// end function staf
}