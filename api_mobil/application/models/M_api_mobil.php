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
  	function get_allinvoice(){

  		$this->db->select('*');
  		$this->db->from('tb_mobil mb');
  		$this->db->join('tb_merek_mobil mr', 'mr.id_merek=mb.id_merek', 'left');


  		$query = $this->db->get();

  		if($query->num_rows() != 0){
  			return $query->result();
  		}else{
  			return false;
  		}
  	}
}