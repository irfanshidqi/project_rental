  	
<?php 

class M_api_transaksi extends CI_Model
{
	
	function insert($table = '', $data= ''){
		$this->db->insert($table,$data);
	}
		function get_all($table)
	{
		$this->db->from($table);

		return $this->db->get()->result();
	}
	function trans_by_id($id_user)
	{
  		$this->db->select('*');
  		$this->db->from('tb_transaksi tr');
  		$this->db->join('tb_mobil mb','mb.id_mobil=tr.id_mobil','left');
  		$this->db->join('tb_merek_mobil mr','mr.id_merek=tr.id_merek','left');
  		$this->db->join('tb_bank b', 'b.id_bank=tr.id_bank','left');
  		$this->db->where('tr.id_user', $id_user);

  		$query = $this->db->get();

  		if($query->num_rows() != 0){
  			return $query->result();
  		}else{
  			return false;
  		}
  	}
  }