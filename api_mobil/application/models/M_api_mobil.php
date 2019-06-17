<?php 

class M_api_mobil extends CI_Model
{
	function get_all($table)
	{
		$this->db->from($table);

		return $this->db->get()->result();
	}

	function get_where($table = null, $where = null){

		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();
	}
}