<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Voters extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Voters_model');
		if(!$this->session->userdata('username_admin') && !$this->session->userdata('role_id_admin')){
			redirect('Staff/blocked');
		}
		if($this->session->userdata('role_id_admin') !== 1 && $this->session->userdata('username_admin') !== 'admin'){
			redirect('Staff/blocked');
		}
	}
	public function index()
	{
		$data['title'] = 'Voters';
		$data['voters'] = $this->Voters_model->getAllVoters();
		$data['user'] = $this->db->get_where('staff',['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['menu'] = $this->db->get_where('menu',['role_id' => $this->session->userdata('role_id_admin')])->result_array();
		if($this->input->post('keyword')){
			$data['voters'] = $this->Voters_model->cari();
		}
		$this->load->view('layout/header_admin',$data);
		$this->load->view('layout/sidebar',$data);
		$this->load->view('layout/topbar',$data);
		$this->load->view('voters/index',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_admin');
	}
	public function add_voters()
	{
		$data['title'] = 'Voters';
		$data['user'] = $this->db->get_where('staff',['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['menu'] = $this->db->get_where('menu',['role_id' => $this->session->userdata('role_id_admin')])->result_array();
		$data['kelas'] = $this->db->get('kelas')->result_array();
		$this->form_validation->set_rules('nis','NIS','required|trim|numeric');
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required|trim');
		$this->form_validation->set_rules('kelas','Kelas','required|trim');
		$this->form_validation->set_rules('token','Token','required|trim');
		if($this->form_validation->run() == false){
			$this->load->view('layout/header_admin',$data);
			$this->load->view('layout/sidebar',$data);
			$this->load->view('layout/topbar',$data);
			$this->load->view('voters/add',$data);
			$this->load->view('layout/footer');
			$this->load->view('layout/footer_admin');
		}else{
			$this->Voters_model->create();
			$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
			redirect('Voters');
		}
	}
	public function edit_voters($id)
	{
		$data['title'] = 'Voters';
		$data['user'] = $this->db->get_where('staff',['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['menu'] = $this->db->get_where('menu',['role_id' => $this->session->userdata('role_id_admin')])->result_array();
		$data['voters'] = $this->Voters_model->getVotersbyId($id);
		$this->form_validation->set_rules('nis','NIS','required|trim|numeric');
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required|trim');
		$this->form_validation->set_rules('kelas','Kelas','required|trim');
		$this->form_validation->set_rules('token','Token','required|trim');
		if($this->form_validation->run() == false){
			$this->load->view('layout/header_admin',$data);
			$this->load->view('layout/sidebar',$data);
			$this->load->view('layout/topbar',$data);
			$this->load->view('voters/edit',$data);
			$this->load->view('layout/footer');
			$this->load->view('layout/footer_admin');
		}else{
			$this->Voters_model->edit();
			$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
			redirect('Voters');
		}
	}

	public function delete_voters($id)
	{
		$this->Voters_model->delete($id);
		$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
		redirect('Voters');
	}
	public function edit_dump()
	{
		$data['title'] = 'Voters';
		$data['user'] = $this->db->get_where('staff',['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['menu'] = $this->db->get_where('menu',['role_id' => $this->session->userdata('role_id_admin')])->result_array();
		$data['kelas'] = $this->db->get('kelas')->result_array();
		$this->form_validation->set_rules('kelas','Kelas','required');
		$this->form_validation->set_rules('role_id','Role','required');
		$this->form_validation->set_rules('token','Token','required');
		if($this->form_validation->run() == false){
			$this->load->view('layout/header_admin',$data);
			$this->load->view('layout/sidebar',$data);
			$this->load->view('layout/topbar',$data);
			$this->load->view('voters/edit_dump',$data);
			$this->load->view('layout/footer');
			$this->load->view('layout/footer_admin');
		}else{
			$data = [
			'role_id' => $this->input->post('role_id'),
			'token' => $this->input->post('token')
		];

		$this->db->where('kelas', $this->input->post('kelas'));
		$this->db->update('voter',$data);
		$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">Data Berhasil ubah</div>');
		
		redirect('Voters');
		}
	}
	public function resetxii()
	{
		$where = ['XII Rekayasa Perangkat Lunak 1','XII Rekayasa Perangkat Lunak 2','XII Teknik Komputer dan Jaringan 1','XII Teknik Komputer dan Jaringan 2','XII Multimedia 1','XII Multimedia 2','XII Farmasi 1','XII Farmasi 2','XII Administrasi Perkantoran 1','XII Administrasi Perkantoran 2','XII Administrasi Perkantoran 3','XII Administrasi Perkantoran 4','XII Akuntansi 1','XII Akuntansi 2','XII Akuntansi 3','XII Perbankan Syariah 1','XII Perbankan Syariah 2','XII Pemasaran 1','XII Pemasaran 2','XII Pemasaran 3'];
		$this->db->where_in('kelas',$where);
		$this->db->delete('voter');

		$this->db->where_in('kelas',$where);
		$this->db->delete('kelas');
		$this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">terhapus!</div>');
		redirect('Voters');
	}

	public function resetxi()
	{
		$where = ['XI Rekayasa Perangkat Lunak 1','XI Rekayasa Perangkat Lunak 2','XI Teknik Komputer dan Jaringan 1','XI Teknik Komputer dan Jaringan 2','XI Multimedia 1','XI Multimedia 2','XI Farmasi Klinis dan Komunitas 1','XI Farmasi Klinis dan Komunitas 2','XI Otomatisasi dan Tata Kelola Perkantoran 1','XI Otomatisasi dan Tata Kelola Perkantoran 2','XI Otomatisasi dan Tata Kelola Perkantoran 3','XI Otomatisasi dan Tata Kelola Perkantoran 4','XI Akuntansi dan Keuangan Lembaga 1','XI Akuntansi dan Keuangan Lembaga 2','XI Akuntansi dan Keuangan Lembaga 3','XI Perbankan Syariah 1','XI Perbankan Syariah 2','XI Bisnis Daring dan Pemasaran 1','XI Bisnis Daring dan Pemasaran 2','XI Bisnis Daring dan Pemasaran 3'];
		$this->db->where_in('kelas',$where);
		$this->db->delete('voter');

		$this->db->where_in('kelas',$where);
		$this->db->delete('kelas');
		$this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">terhapus!</div>');
		redirect('Voters');
	}

	public function resetx()
	{
		$where = ['X Rekayasa Perangkat Lunak 1','X Rekayasa Perangkat Lunak 2','X Teknik Komputer Jaringan 1','X Teknik Komputer Jaringan 2','X Multimedia 1','X Multimedia 2','X Farmasi Klinis dan Komunitas 1','X Farmasi Klinis dan Komunitas 2','X Otomatisasi dan Tata Kelola Perkantoran 1','X Otomatisasi dan Tata Kelola Perkantoran 2','X Otomatisasi dan Tata Kelola Perkantoran 3','X Otomatisasi dan Tata Kelola Perkantoran 4','X Akuntansi dan Keuangan Lembaga 1','X Akuntansi dan Keuangan Lembaga 2','X Akuntansi dan Keuangan Lembaga 3','X Perbankan Syariah 1','X Perbankan Syariah 2','X Bisnis Daring dan Pemasaran 1','X Bisnis Daring dan Pemasaran 2','X Bisnis Daring dan Pemasaran 3'];
		$this->db->where_in('kelas',$where);
		$this->db->delete('voter');

		$this->db->where_in('kelas',$where);
		$this->db->delete('kelas');
		$this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">terhapus!</div>');
		redirect('Voters');
	}
}