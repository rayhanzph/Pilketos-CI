<?php 

/**
 * 
 */
class Staff_model extends CI_Model
{
	public function getAllStaf()
	{
		return $this->db->get('staff')->result_array();
	}
	
	public function getStaffbyID($id)
	{
		return $this->db->get_where('staff',['id' => $id])->row_array();
	}
}