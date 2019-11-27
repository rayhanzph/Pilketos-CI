<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['title'] = 'Login - Pilketos Online';

		$this->form_validation->set_rules('nis','NIS','required|trim|numeric',[
			'required' => 'NIS harus diisi',
			'numeric' => 'Field hanya boleh diisi angka'
		]);
		$this->form_validation->set_rules('tgl','Tanggal Lahir','required|trim',['required' => 'Tanggal Lahir harus diisi']);
		if($this->form_validation->run() == false){
			$this->load->view('layout/header_auth',$data);
			$this->load->view('auth/login');
			$this->load->view('layout/footer_auth');	
		}else{
			$this->_login();
		}
	}

	private function _login(){
		$nis = $this->input->post('nis');
		$tgl = $this->input->post('tgl');

		$user = $this->db->get_where('voter',['nis' => $nis])->row_array();

		if($user){
			if($user['status'] == 0){
				if($user['tgl_lahir'] == $tgl){
					$data = [
						'nis' => $user['nis'],
						'role_id' => $user['role_id'],
						'sesi' => $user['sesi']
					];
					$this->session->set_userdata($data);
					if($user['role_id'] == 1){
						redirect('Voter');
					}else{
						redirect('Token');
					}
				}else{
					$this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">Tanggal Lahir salah!</div>');
					redirect('Auth');
				}
			}else{
				$this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">Anda telah memilih, tidak dapat melakukan pemilihan lagi!</div>');
				redirect('Auth');
			}
		}else{
			$this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">Anda tidak terdaftar!</div>');
			redirect('Auth');
		}
	}
}