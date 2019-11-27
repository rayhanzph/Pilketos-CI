<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Staff extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['title'] = 'Login Petugas - Pilketos Online';

		$this->form_validation->set_rules('username','Username','required|trim',['required' => 'Username harus diisi']);
		$this->form_validation->set_rules('password','Password','required|trim',['required' => 'Password harus diisi']);
		if($this->form_validation->run() == false){
			$this->load->view('layout/header_auth',$data);
			$this->load->view('staff/login');
			$this->load->view('layout/footer_auth');
		}else{
			$this->_staff();
		}
	}

	private function _staff()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->db->get_where('staff',['username_admin' => $username])->row_array();

		if($cek){
			if($cek['is_active'] == 1){
				if(password_verify($password, $cek['password'])){
					$data = [
						'username_admin' => $cek['username_admin'],
						'role_id_admin' => $cek['role_id_admin']
					];
					$this->session->set_userdata($data);
					if($cek['role_id_admin'] == 1){
						redirect('Admin');
					}else{
						redirect('Moderator');
					}
				}else{
					$this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">Password salah!</div>');
					redirect('Staff');
				}
			}else{
				$this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">Username tidak aktif!</div>');
				redirect('Staff');
			}
		}else{
			$this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">Anda tidak terdaftar!</div>');
			redirect('Staff');
		}

	}

	public function regstaf()
	{
		$data = [
			'username' => 'admin',
			'password' => password_hash('admin', PASSWORD_DEFAULT), //pilketos10112k19 //040602010602zxcdsaqwe //admin|admin
			'role_id' => 2
		];
		$this->db->insert('staff',$data);
		$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">Input berhasil!</div>');
		redirect('Staff');
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">Anda telah keluar!</div>');
		redirect('Staff');
	}
	public function blocked()
	{
		$data['title'] = 'Blocked!';
		$this->load->view('layout/header_admin',$data);
		$this->load->view('staff/blocked');
		$this->load->view('layout/footer_admin');
	}
}