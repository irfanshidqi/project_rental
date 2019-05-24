<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('app_admin');
	}

    public function index()
    {
    	$data['merek'] = $this->app_admin->getAll();

    	$data['data'] = $this->app_admin->getMobil();
    	$this->template->admin('admin/form_transaksi', $data);
    }
    public function tambah_transaksi()
    {
        if ($this->input->post('submit', TRUE) == 'Submit') 
        {

        $id_trans = $this->app_admin->get_id_transaksi();


        $awal_penyewaan =  $this->input->post('tgl_start');

        $lama_penyewaan = $this->input->post('lama_penyewaan');
        $akhir_penyewaan  = date('Y-m-d', strtotime("+".$lama_penyewaan." day", strtotime($awal_penyewaan)));

        $transaksi = array(

            'id_transaksi' => $id_trans,
            'id_merek' => $this->input->post('merek_mobil', TRUE),
            'id_mobil' => $this->input->post('tipe_mobil', TRUE),
            'status_transaksi' => 1,
            'harga' => $this->input->post('sewa', TRUE),
            'total_harga' => $this->input->post('total_harga', TRUE),
            'nama' => $this->input->post('nama', TRUE),
            'no_hp' => $this->input->post('no_hp', TRUE),
            'email' => $this->input->post('email', TRUE),
            'tujuan' => $this->input->post('tujuan', TRUE),
            'tgl_order' => $this->input->post('tgl_start', TRUE),
            'waktu_order' => $this->input->post('waktu', TRUE),
            'tgl_akhir' => $akhir_penyewaan,
            'id_bank' => $this->input->post('bank', TRUE),
            'lama_peminjaman' => $this->input->post('lama_penyewaan', TRUE)



        );


         $this->db->set('created', 'NOW()', FALSE);
         $this->app_admin->insert('tb_transaksi', $transaksi);

         // $invoice = $this->app_admin->getinvoice($id);

         // foreach($invoice as $inv){
         //    $data['id_transaksi'] = $inv->id_transaksi;
         //    $data['nama_mobil'] = $inv->nama_mobil;
         //    $data['merek_mobil'] = $inv->nama_merek;
         //    $data['nama'] = $inv->nama;
         //    $data['no_hp'] = $inv->no_hp;
         //    $data['email'] = $inv->email;
         //    $data['tujuan'] = $inv->tujuan;
         //    $data['tgl_order'] = $inv->tgl_order;
         //    $data['waktu_order'] = $inv->waktu_order;
         //    $data['tgl_akhir'] = $inv->tgl_akhir;
         //    $data['lama_peminjaman'] = $inv->lama_peminjaman;
         //    $data['harga_sewa'] = $inv->harga;
         //    $data['total_harga'] = $inv->total_harga;
         //    $data['created'] = $inv->created;



         // }

         $this->session->set_flashdata('success', 'Transaksi Telah Berhasil di tambahkan');
         redirect("transaksi/invoice/".$id_trans);

     }else{

     }

        $data['bank'] = $this->app_admin->getbank();


        $data['id_tr'] = $this->app_admin->get_id_transaksi();

    	$data['merek'] = $this->app_admin->getAll();
    	$data['data'] = $this->app_admin->getMobil();
    	$this->template->admin('admin/form_transaksi', $data);
    }

    public function tipe_mobil(){

    	//post data
    	 $postData = $this->input->post('tb_mobil');

    	 $data = $this->app_admin->getTipe($postData);

    	 echo json_encode($data);


    }

    public function getharga(){
        $datanya = ['id_mobil' => $this->input->post('id_mobil') ];
             $data = $this->app_admin->getharga($datanya);
            echo json_encode($data);
    }

        public function invoice($id_trans)
    {

         $invoice = $this->app_admin->getinvoice($id_trans);

         foreach($invoice as $inv){
            $data['id_transaksi'] = $inv->id_transaksi;
            $data['nama_mobil'] = $inv->nama_mobil;
            $data['plat'] = $inv->plat_mobil;
            $data['merek_mobil'] = $inv->nama_merek;
            $data['nama'] = $inv->nama;
            $data['no_hp'] = $inv->no_hp;
            $data['email'] = $inv->email;
            $data['tujuan'] = $inv->tujuan;
            $data['tgl_order'] = $inv->tgl_order;
            $data['waktu_order'] = $inv->waktu_order;
            $data['tgl_akhir'] = $inv->tgl_akhir;
            $data['lama_peminjaman'] = $inv->lama_peminjaman;
            $data['harga_sewa'] = $inv->harga;
            $data['total_harga'] = $inv->total_harga;
            $data['created'] = $inv->created;



         }

        // $data['data'] = $this->app_admin->getMobil();
        $this->template->admin('admin/isi_invoice', $data);
    }


}