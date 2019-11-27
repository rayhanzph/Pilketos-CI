<?php 
defined('BASEPATH') or exit('No direct scrip access allowed');

/**
 * 
 */
class Voter extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('nis') && !$this->session->userdata('kelas')){
			redirect('Auth');
		}
	}
	public function index()
	{
		$data['title'] = 'Pemilihan Ketua Osis';
		$data['candidate'] = $this->db->get('candidate')->result_array();
		$data['user'] = $this->db->get_where('voter',['nis' => $this->session->userdata('nis')])->row_array();
		// $this->load->view('layout/header_admin',$data);
		// $this->load->view('voter/index',$data);
		// $this->load->view('layout/footer_admin');
		 $this->load->view('voter/test',$data);
	}

	public function pilih($id){
		$user = $this->db->get_where('voter',['nis' => $this->session->userdata('nis')])->row_array();

		// query update status where nis
		$data = [
			'status' => 1
		];
		$this->db->where('nis',$user['nis']);
		$this->db->update('voter',$data);

		// query update candidate
		$this->db->set('counts','counts+1',FALSE);
		$this->db->where('id',$id);
		$this->db->update('candidate');

		// query update jumlah 'sudah' di table kelas
		$this->db->set('sudah','sudah+1',FALSE);
		$this->db->where('kelas',$user['kelas']);
		$this->db->update('kelas');

		$this->session->unset_userdata('kelas');
		$this->session->unset_userdata('nis');
		$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">Terima Kasih Telah Memilih</div>');
		redirect('Auth');
	}
}