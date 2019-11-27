<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Kelas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Kelas_model');
		if(!$this->session->userdata('username_admin') && !$this->session->userdata('role_id_admin')){
			redirect('Staff/blocked');
		}
		if($this->session->userdata('role_id_admin') !== 1 && $this->session->userdata('username_admin') !== 'admin'){
			redirect('Staff/blocked');
		}
	}
	public function index()
	{
		// jumlah data yang tampil masih terbatas, perlu diperbaiki
		$data['title'] = 'Kelas';
		$data['kelas'] = $this->Kelas_model->getAllKelas();
		$data['user'] = $this->db->get_where('staff',['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['menu'] = $this->db->get_where('menu',['role_id_admin' => $this->session->userdata('role_id_admin')])->result_array(); //ini query untuk menampilkan menu
		if($this->input->post('keyword')){
			$data['kelas'] = $this->Kelas_model->cari();
		}
		$this->load->view('layout/header_admin',$data);
		$this->load->view('layout/sidebar',$data);
		$this->load->view('layout/topbar',$data);
		$this->load->view('kelas/index',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_admin');
	}
	public function add_kelas()
	{
		$data['title'] = 'Kelas';
		$data['user'] = $this->db->get_where('staff',['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['menu'] = $this->db->get_where('menu',['role_id_admin' => $this->session->userdata('role_id_admin')])->result_array();
		$data['kelas'] = $this->Kelas_model->getAllKelas();

		$this->form_validation->set_rules('kelas','Kelas','required|trim');
		$this->form_validation->set_rules('jumlah','Jumlah','required|trim|numeric');
		$this->form_validation->set_rules('token','Token','required|trim');
		if($this->form_validation->run() == false){
			$this->load->view('layout/header_admin',$data);
			$this->load->view('layout/sidebar',$data);
			$this->load->view('layout/topbar',$data);
			$this->load->view('kelas/add',$data);
			$this->load->view('layout/footer');
			$this->load->view('layout/footer_admin');
		}else{
			$this->Kelas_model->add();
			$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
			redirect('Kelas');
		}			
	}

	public function edit_kelas($id)
	{
		$data['title'] = 'Kelas';
		$data['user'] = $this->db->get_where('staff',['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['menu'] = $this->db->get_where('menu',['role_id_admin' => $this->session->userdata('role_id_admin')])->result_array();
		$data['kelas'] = $this->Kelas_model->getKelasbyId($id);

		$this->form_validation->set_rules('kelas','Kelas','required|trim');
		$this->form_validation->set_rules('jumlah','Jumlah','required|trim|numeric');
		$this->form_validation->set_rules('token','Token','required|trim');
		if($this->form_validation->run() == false){
			$this->load->view('layout/header_admin',$data);
			$this->load->view('layout/sidebar',$data);
			$this->load->view('layout/topbar',$data);
			$this->load->view('kelas/edit',$data);
			$this->load->view('layout/footer');
			$this->load->view('layout/footer_admin');
		}else{
			$this->Kelas_model->edit();
			$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">Data Berhasil Diubah!</div>');
			redirect('Kelas');
		}		
	}
	public function delete_kelas($id)
	{
		$this->Kelas_model->delete($id);
		$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
		redirect('Kelas');
	}
	public function view($token)
	{
		$data['title'] = 'Kelas';
		$data['user'] = $this->db->get_where('staff',['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['menu'] = $this->db->get_where('menu',['role_id_admin' => $this->session->userdata('role_id_admin')])->result_array();
		$data['kelas'] = $this->Kelas_model->getKelasbytoken($token);

			$this->load->view('layout/header_admin',$data);
			$this->load->view('layout/sidebar',$data);
			$this->load->view('layout/topbar',$data);
			$this->load->view('kelas/view',$data);
			$this->load->view('layout/footer');
			$this->load->view('layout/footer_admin');
	}
	public function activation($token)
	{
		// $getID = $this->db->get_where('kelas',['id' => $id])->row_array();

		$data = [
			'sesi' => 1
		];
		$this->db->where('token',$token);
		$this->db->update('kelas',$data);

		$this->db->where('token',$token);
		$this->db->update('voter',$data);
		redirect('Kelas/view/'.$token);
	}

	public function completed($token){
		$data = [
			'sesi' => 2
		];

		$this->db->where('token',$token);
		$this->db->update('kelas',$data);

		$this->db->where('token',$token);
		$this->db->update('voter',$data);
		redirect('Moderator');
	}

	public function default($token){
		$data = [
			'sesi' => 0
		];

		$this->db->where('token',$token);
		$this->db->update('kelas',$data);

		$this->db->where('token',$token);
		$this->db->update('voter',$data);
		redirect('Kelas/view/'.$token);
	}
	public function reset_voted($token){
		$this->db->set('sudah','0');
		$this->db->where('token',$token);
		$this->db->update('kelas');

		$this->db->set('status','0');
		$this->db->where('token',$token);
		$this->db->update('voter');
		redirect('Kelas/view/'.$token);
	}
	public function setAll($token){
		$this->db->set('status','1');
		$this->db->where('token',$token);
		$this->db->update('voter');
		redirect('Kelas/view/'.$token);
	}
}