<?php 

class m_apilogin extends CI_Model
{
	public function __construct()

	{
		parent::__construct();
	}

	// function login_api($username, $password)
	// {
	// 	$result = $this->db->query("SELECT * FROM tb_admin WHERE username = '$username' AND password = '$password' ");
	// 	return $result->result();
	// }

	function insert($table = '', $data= ''){
		$this->db->insert($table,$data);
	}

	function get_all($table)
	{
		$this->db->from($table);

		return $this->db->get();
	}

	function get_where($table = null, $where = null)
	{
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();
	}

	function update($table = null, $data = null, $where = null)
	{
		$this->db->update($table, $data, $where);
	}

	function hapus_data($where,$table)
	{

		$this->db->where($where);
		$this->db->delete($table);
	}

}


 ?>