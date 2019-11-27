<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Token extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if(!$this->session->userdata('nis') && !$this->session->userdata('kelas')){
			redirect('Auth');
		}
	}
	public function index()
	{
		$data['title'] = 'Input Token - Pilketos Online';

		$data['info'] = $this->db->get_where('voter',['sesi' => $this->session->userdata('sesi')])->row_array();
		$this->form_validation->set_rules('token','Token','required|trim',['required' => 'Token harus diisi']);
		if($this->form_validation->run() == false){
			$this->load->view('layout/header_auth',$data);
			$this->load->view('auth/token',$data);
			$this->load->view('layout/footer_auth');	
		}else{
			$this->_token();
		}
	}

	private function _token()
	{
		$token = $this->input->post('token');

		$user = $this->db->get_where('voter',['nis' => $this->session->userdata('nis')])->row_array();
		$cek = $this->db->get_where('voter',['token' => $token])->row_array();

		if($cek){
			$data = [
				'kelas' => $cek['kelas'],
				'nis' => $user['nis']
			];
			$this->session->set_userdata($data);
			redirect('Voter');

			// sepertinya perlu ditambah userdata nis untuk update candidate where nis
			//echo "silahkan memilih";
		}else{
			$this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">Token salah!</div>');
			redirect('Token');
		}
	}

	public function back()
	{
		$this->session->unset_userdata('nis');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('sesi');
		redirect('Auth');
	}
}