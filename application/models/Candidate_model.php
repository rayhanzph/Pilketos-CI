<?php 

/**
 * 
 */
class Candidate_model extends CI_Model
{
	public function getAllCandidate()
	{
		return $this->db->get('candidate')->result_array();
	}

	public function create()
	{
		$data = [
			'no_urut' => $this->input->post('no_urut'),
			'nis' => $this->input->post('nis'),
			'nama' => $this->input->post('nama'),
			'kelas' => $this->input->post('kelas'),
			'motto' => $this->input->post('motto')
		];
		$this->db->insert('candidate',$data);
	}
	public function getCandidatebyId($id)
	{
		return $this->db->get_where('candidate',['id' => $id])->row_array();
	}
	public function update()
	{
		$data = [
			'no_urut' => $this->input->post('no_urut'),
			'nis' => $this->input->post('nis'),
			'nama' => $this->input->post('nama'),
			'kelas' => $this->input->post('kelas'),
			'motto' => $this->input->post('motto')
		];

		$this->db->where('id',$this->input->post('id'));
		$this->db->update('candidate',$data);
	}
	public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('candidate');
	}
	public function cari()
	{
		$keyword = $this->input->post('keyword',true);
		$this->db->like('no_urut',$keyword);
		$this->db->or_like('nis',$keyword);
		$this->db->or_like('nama',$keyword);
		$this->db->or_like('kelas',$keyword);
		$this->db->or_like('motto',$keyword);
		return $this->db->get('candidate')->result_array();
	}
}