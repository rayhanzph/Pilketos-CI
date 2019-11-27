<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Candidate extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Candidate_model');
		if(!$this->session->userdata('username_admin') && !$this->session->userdata('role_id_admin')){
			redirect('Staff/blocked');
		}
		if($this->session->userdata('role_id_admin') !== 1 && $this->session->userdata('username_admin') !== 'admin'){
			redirect('Staff/blocked');
		}
	}

	public function index(){
		// CANDIDATE
		$data['title'] = 'Candidate';
		$data['candidate'] = $this->Candidate_model->getAllCandidate();
		$data['user'] = $this->db->get_where('staff',['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['menu'] = $this->db->get_where('menu',['role_id' => $this->session->userdata('role_id_admin')])->result_array(); //ini query untuk menampilkan menu
		if($this->input->post('keyword')){
			$data['candidate'] = $this->Candidate_model->cari();
		}
		$this->load->view('layout/header_admin',$data);
		$this->load->view('layout/sidebar',$data);
		$this->load->view('layout/topbar',$data);
		$this->load->view('candidate/index',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_admin');
	}

	public function add_candidate()
	{
		$data['title'] = 'Candidate';
		$data['user'] = $this->db->get_where('staff',['username_admin' => $this->session->userdata('username_admin')])->row_array();
		$data['menu'] = $this->db->get_where('menu',['role_id' => $this->session->userdata('role_id_admin')])->result_array();
		$this->form_validation->set_rules('no_urut','No Urut','required|trim|numeric');
		$this->form_validation->set_rules('nis','NIS','required|trim|numeric');
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('kelas','Kelas','required|trim');
		$this->form_validation->set_rules('motto','Motto','required|trim');
		if($this->form_validation->run() == false){
			$this->load->view('layout/header_admin',$data);
			$this->load->view('layout/sidebar',$data);
			$this->load->view('layout/topbar',$data);
			$this->load->view('candidate/add',$data);
			$this->load->view('layout/footer');
			$this->load->view('layout/footer_admin');
		}else{
			$foto = $_FILES['foto']['name'];

			if($foto){
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/candidate/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {
					$new_image = $this->upload->data('file_name');
					$this->db->set('foto',$new_image);
				}else{
					echo $this->upload->display_errors();
				}
			}else{
				$default = 'default.png';
				$this->db->set('foto',$default);
			}

			$this->Candidate_model->create();
			$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
			redirect('Candidate');
		}
	}

	public function edit_candidate($id)
	{
		$data['title'] = 'Candidate';
		$data['user'] = $this->db->get_where('staff',['username_admin' => $this->session->userdata(
			'username')])->row_array();
		$data['menu'] = $this->db->get_where('menu',['role_id' => $this->session->userdata('role_id_admin')])->result_array();
		$data['candidate'] = $this->Candidate_model->getCandidatebyId($id);
		$this->form_validation->set_rules('no_urut','No Urut','required|trim');
		$this->form_validation->set_rules('nis','Nis','required|trim');
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('kelas','Kelas','required|trim');
		$this->form_validation->set_rules('motto','Motto','required|trim');
		if($this->form_validation->run() == false){
			$this->load->view('layout/header_admin',$data);
			$this->load->view('layout/sidebar',$data);
			$this->load->view('layout/topbar',$data);
			$this->load->view('candidate/edit',$data);
			$this->load->view('layout/footer');
			$this->load->view('layout/footer_admin');
		}else{
			$foto = $_FILES['foto']['name'];

			if($foto){
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/candidate/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {
					$old_img = $data['candidate']['foto'];
					if($old_img != 'default.png'){
						unlink(FCPATH .'assets/img/candidate/' . $old_img);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('foto',$new_image);
				}else{
					echo $this->upload->display_errors();
				}
			}

			$this->Candidate_model->update();
			$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">Data Berhasil Diubah!</div>');
			redirect('Candidate');
		}
	}

	public function delete_candidate($id)
	{
		$this->Candidate_model->delete($id);
		$this->session->set_flashdata('alert','<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
		redirect('Candidate');
	}

	public function addhistory($id)
	{
		$get = $this->db->get_where('candidate',['id' => $id])->row_array();
		$all = $this->db->get('candidate')->result_array();
		$data = [
			'no_urut' => $get['no_urut'],
			'nis' => $get['nis'],
			'nama' => $get['nama'],
			'kelas' => $get['kelas'],
			'motto' => $get['motto'],
			'foto' => $get['foto'],
			'counts' => $get['counts'],
			'year_vote' => date('Y')
		];
		$this->db->insert('history',$data);
			$this->session->set_flashdata('alert','<div class="alert alert-warning" role="alert">Data Berhasil Dimasukan</div>');
			redirect('Candidate');
		// kurang fungsi
		// if(data_baru == data_sudah_ada) => echo "data sudah ada"
		// else => jalan query
	}
}