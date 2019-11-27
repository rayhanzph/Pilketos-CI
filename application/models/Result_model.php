<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Result_model extends CI_Model
{
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