<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Moderator_model extends CI_Model{

    public function getAllVoters()
	{
		return $this->db->get('voter')->result_array();
    }
    
    public function create()
	{
		$data = [
			'nis' => $this->input->post('nis'),
			'nama' => $this->input->post('nama'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'kelas' => $this->input->post('kelas'),
			'status' => 0,
			'token' => $this->input->post('token'),
			'sesi' => 1
		];
		$this->db->insert('voter',$data);
    }
    
    public function getVotersbyId($id)
	{
		return $this->db->get_where('voter',['id' => $id])->row_array();
    }
    
    public function edit()
	{
		$data = [
			'nis' => $this->input->post('nis'),
			'nama' => $this->input->post('nama'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'kelas' => $this->input->post('kelas'),
			'status' => 0,
			'token' => $this->input->post('token'),
			'sesi' => 1
		];
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('voter',$data);
    }
    
    public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('voter');
    }
    
    public function cari()
	{
		$keyword = $this->input->post('keyword',true);
		$this->db->like('nis',$keyword);
		$this->db->or_like('nama',$keyword);
		$this->db->or_like('tgl_lahir',$keyword);
		$this->db->or_like('kelas',$keyword);
		$this->db->or_like('token',$keyword);
		return $this->db->get('voter')->result_array();
	}
}