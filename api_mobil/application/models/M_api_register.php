<?php 

class M_api_register extends CI_Model
{
	public function add($data){
		return $this->db->insert('tb_user',$data); 
	}
}