<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class History extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('History_model');
		if(!$this->session->userdata('username_admin') && !$this->session->userdata('role_id_admin')){
			redirect('Staff/blocked');
		}
		if($this->session->userdata('role_id_admin') !== 1 && $this->session->userdata('username_admin') !== 'admin'){
			redirect('Staff/blocked');
		}
	}
	public function index()
	{
		$data['title'] = 'History';
		$data['history'] = $this->History_model->getAllHistory();
		$data['user'] = $this->db->get_where('staff',['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['menu'] = $this->db->get_where('menu',['role_id_admin' => $this->session->userdata('role_id_admin')])->result_array(); //ini query untuk menampilkan menu
		if($this->input->post('keyword')){
			$data['history'] = $this->History_model->cari();
		}
		$this->load->view('layout/header_admin',$data);
		$this->load->view('layout/sidebar',$data);
		$this->load->view('layout/topbar',$data);
		$this->load->view('history/index',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_admin');
	}

}