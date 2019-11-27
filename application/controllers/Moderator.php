<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Moderator extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Moderator_model');
		$this->load->model('Kelas_model');
		if(!$this->session->userdata('username_admin') && !$this->session->userdata('role_id_admin')){
			redirect('Staff/blocked');
		}
		if($this->session->userdata('role_id_admin') !== 2 && $this->session->userdata('username_admin') !== 'moderator'){
			redirect('Staff/blocked');
		}
	}
	public function index()
	{
		$data['title'] = 'Moderator';

		$this->db->select('*');
		$this->db->from('voter');
		$this->db->join('kelas','kelas.id = voter.id');
		$data['voter'] = $this->db->get()->result_array();
		// end function get info kelas
		$data['user'] = $this->db->get_where('staff',['username_admin' => $this->session->userdata('username_admin')])->row_array();
		if($this->input->post('keyword')){
			$data['voter'] = $this->Kelas_model->cari();
		}
		// $this->load->view('layout/header_admin',$data);
		// $this->load->view('staff/moderator',$data);
		// $this->load->view('layout/footer_admin');
		$this->load->view('layout/header_admin',$data);
		$this->load->view('layout/sidebar_mod',$data);
		$this->load->view('layout/topbar',$data);
		$this->load->view('moderator/index',$data);
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
		redirect('Moderator');
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
		redirect('Moderator');
	}

	//function untuk crud voters di moderator
	public function voters()
	{
		$data['title'] = 'Voters';
		$data['voters'] = $this->Moderator_model->getAllVoters();
		$data['user'] = $this->db->get_where('staff',['username_admin' => $this->session->userdata('username_admin')])->row_array();
		if($this->input->post('keyword')){
			$data['voters'] = $this->Moderator_model->cari();
		}
		$this->load->view('layout/header_admin',$data);
		$this->load->view('layout/sidebar_mod',$data);
		$this->load->view('layout/topbar',$data);
		$this->load->view('moderator/voters',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_admin');
	}

	public function add_voters()
	{
		$data['title'] = 'Voters';
		$data['user'] = $this->db->get_where('staff',['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['kelas'] = $this->db->get('kelas')->result_array();
		$this->form_validation->set_rules('nis','NIS','required|trim|numeric');
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required|trim');
		$this->form_validation->set_rules('kelas','Kelas','required|trim');
		$this->form_validation->set_rules('token','Token','required|trim');
		if($this->form_validation->run() == false){
			$this->load->view('layout/header_admin',$data);
			$this->load->view('layout/sidebar_mod',$data);
			$this->load->view('layout/topbar',$data);
			$this->load->view('moderator/add',$data);
			$this->load->view('layout/footer');
			$this->load->view('layout/footer_admin');
		}else{
			$this->Moderator_model->create();
			$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
			redirect('Moderator/voters');
		}
	}

	public function edit_voters($id)
	{
		$data['title'] = 'Voters';
		$data['user'] = $this->db->get_where('staff',['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['voters'] = $this->Moderator_model->getVotersbyId($id);
		$this->form_validation->set_rules('nis','NIS','required|trim|numeric');
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required|trim');
		$this->form_validation->set_rules('kelas','Kelas','required|trim');
		if($this->form_validation->run() == false){
			$this->load->view('layout/header_admin',$data);
			$this->load->view('layout/sidebar_mod',$data);
			$this->load->view('layout/topbar',$data);
			$this->load->view('moderator/edit',$data);
			$this->load->view('layout/footer');
			$this->load->view('layout/footer_admin');
		}else{
			$this->Moderator_model->edit();
			$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">Data Berhasil Diubah</div>');
			redirect('Moderator/voters');
		}
	}

	public function delete_voters($id)
	{
		$this->Moderator_model->delete($id);
		$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
		redirect('Moderator/voters');
	}

	public function edit_dump()
	{
		$data['title'] = 'Voters';
		$data['user'] = $this->db->get_where('staff',['username' => $this->session->userdata('username')])->row_array();
		$data['kelas'] = $this->db->get('kelas')->result_array();
		$this->form_validation->set_rules('kelas','Kelas','required');
		$this->form_validation->set_rules('role_id','Role','required');
		$this->form_validation->set_rules('token','Token','required');
		if($this->form_validation->run() == false){
			$this->load->view('layout/header_admin',$data);
			$this->load->view('layout/sidebar_mod',$data);
			$this->load->view('moderator/edit_dump',$data);
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
		
		redirect('Moderator/voters');
		}
	}
}