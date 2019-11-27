<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class History_model extends CI_Model
{
	public function getAllHistory()
	{
		return $this->db->get('history')->result_array();
	}
}