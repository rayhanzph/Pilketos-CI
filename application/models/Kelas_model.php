<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Kelas_model extends CI_Model
{
	public function getAllKelas()
	{
		return $this->db->get('kelas')->result_array();
	}
	public function add()
	{
		$data = [
			'kelas' => $this->input->post('kelas'),
			'jumlah' => $this->input->post('jumlah'),
			'token' => $this->input->post('token')
		];

		$this->db->insert('kelas',$data);
	}
	public function getKelasbyId($id)
	{
		return $this->db->get_where('kelas',['id' => $id ])->row_array();
	}

	public function edit()
	{
		$data = [
			'kelas' => $this->input->post('kelas'),
			'jumlah' => $this->input->post('jumlah'),
			'token' => $this->input->post('token')
		];
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('kelas',$data);
	}
	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('kelas');
	}
	public function cari()
	{
		$keyword = $this->input->post('keyword',true);
		$this->db->like('kelas',$keyword);
		$this->db->or_like('jumlah',$keyword);
		$this->db->or_like('token',$keyword);
		return $this->db->get('kelas')->result_array();
	}
	public function getKelasbytoken($token)
	{
		return $this->db->get_where('kelas',['token' => $token ])->row_array();
	}
}