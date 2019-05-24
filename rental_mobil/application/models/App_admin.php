<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_Admin extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

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

	function getMobil()
	{

		$this->db->select('tb_mobil.id_mobil,tb_mobil.id_merek, tb_mobil.nama_mobil, tb_mobil.deskripsi_mobil, tb_mobil.tahun_mobil, tb_mobil.kapasitas_mobil, tb_mobil.harga_sewa, tb_mobil.warna_mobil, tb_mobil.transmisi_mobil, tb_mobil.plat_mobil, tb_mobil.status_sewa,tb_mobil.gambar, tb_mobil.status_mobil, tb_mobil.ditambahkan, tb_mobil.fasilitas_mobil, tb_merek_mobil.nama_merek');
		$this->db->from('tb_mobil');
		$this->db->join('tb_merek_mobil','tb_mobil.id_merek = tb_merek_mobil.id_merek', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	// 	function getIdMobil($id)
	// {

	// 	$this->db->select('tb_mobil.id_mobil,tb_mobil.id_merek, tb_mobil.nama_mobil, tb_mobil.deskripsi_mobil, tb_mobil.tahun_mobil, tb_mobil.kapasitas_mobil, tb_mobil.harga_sewa, tb_mobil.warna_mobil, tb_mobil.transmisi_mobil, tb_mobil.plat_mobil, tb_mobil.status_sewa,tb_mobil.gambar, tb_mobil.status_mobil, tb_mobil.ditambahkan, tb_mobil.fasilitas_mobil, tb_merek_mobil.nama_merek');
	// 	$this->db->from('tb_mobil');
	// 	$this->db->join('tb_merek_mobil','tb_mobil.id_merek = tb_merek_mobil.id_merek', 'left');
	// 	$query = $this->db->get();
	// 	$this->db->where(['id_mobil' => $id]);
	// 	return $query->result();
	// }
	function getIdMobil($id){
		$query = $this->db->query("SELECT tb_mobil.id_mobil,tb_mobil.id_merek, tb_mobil.nama_mobil, tb_mobil.deskripsi_mobil, tb_mobil.tahun_mobil, tb_mobil.kapasitas_mobil, tb_mobil.harga_sewa, tb_mobil.warna_mobil, tb_mobil.transmisi_mobil, tb_mobil.plat_mobil, tb_mobil.status_sewa,tb_mobil.gambar, tb_mobil.status_mobil, tb_mobil.ditambahkan, tb_mobil.fasilitas_mobil, tb_merek_mobil.nama_merek FROM tb_mobil, tb_merek_mobil WHERE tb_mobil.id_mobil = '$id' AND tb_mobil.id_merek = tb_merek_mobil.id_merek");
		return $query->result();
	}
	function getAll(){
		$this->db->select('*');
		$this->db->from('tb_merek_mobil');
		$query = $this->db->get();
		return $query->result();
	}

	public function getTipe($postData){

		$response = array();

		//get seleect
		$this->db->select('id_mobil, id_merek, harga_sewa, nama_mobil');
		$this->db->where('id_merek', $postData);
		$query = $this->db->get('tb_mobil');

		$response = $query->result_array();

		return $response;
	}

	function get_id_transaksi(){
        $q = $this->db->query("SELECT MAX(RIGHT(id_transaksi,5)) AS kd_max FROM tb_transaksi ");
        $kd = "";
        $tm = "TR";
        if($q->num_rows()>0){
            foreach($q->result() as $k){

                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp );
            }
        }else{
            $kd = "00001";
        }

 		return $tm.date('ymd').$kd;
    }

  	function getharga($id){
  		$this->db->select('harga_sewa');
  		$this->db->where($id);
  		return $this->db->get('tb_mobil')->result_array();
  	}

  	function getbank(){
  		$this->db->select('*');
  		$this->db->from('tb_bank');

  		$query = $this->db->get();
  		return $query->result();


  	}

  	function getinvoice($id_trans){

  		$this->db->select('*');
  		$this->db->from('tb_transaksi tr');
  		$this->db->join('tb_mobil mb' ,'mb.id_mobil=tr.id_mobil', 'left');
  		$this->db->join('tb_merek_mobil mr', 'mr.id_merek=tr.id_merek', 'left');
  		$this->db->where('tr.id_transaksi', $id_trans);

  		$query = $this->db->get();

  		if($query->num_rows() != 0){
  			return $query->result();
  		}else{
  			return false;
  		}
  	}

  	// akhir model

}


















