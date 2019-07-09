<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('app_admin');
        if(!$this->session->userdata('admin'))
        {
            redirect('login');
        }
	}

    public function index()
    {

        if ($this->input->post('submit', TRUE) == 'Submit') 
        {
            $bln = $this->input->post('bln', TRUE);
            $thn = $this->input->post('thn', TRUE);
        }else{

            $bln = date('m');
            $thn = date('Y');
        }
//YYY-mm-dd
        $awal = $thn.'-'.$bln.'-01'; 
        $akhir = $thn.'-'.$bln.'-31';
        $status = 5;
        $where = ['tr.created_inv >=' => $awal, 'tr.created_inv <=' => $akhir, 'tr.status_transaksi'=> $status];

        $data['data'] = $this->app_admin->report($where);
        $data['bln'] = $bln;
        $data['thn'] = $thn;

    	$this->template->admin('admin/isi_laporan',$data);
    }



    public function tr_selesai()
    {
        $data['data'] = $this->app_admin->get_finish();
        $this->template->admin('admin/isi_datalaporan',$data);
    }

	function selisih_tanggal($dateline, $kembali)
    {

		$tgl_dateline = explode('-', $dateline);
		$tgl_dateline = $tgl_dateline[2].'-'.$tgl_dateline[1].'-'.$tgl_dateline[0];

		$tgl_kembali = explode('-', $kembali);
		$tgl_kembali = $tgl_kembali[2].'-'.$tgl_kembali[1].'-'.$tgl_kembali[0];

		$selisih = strtotime($tgl_kembali) - strtotime($tgl_dateline);
		$selisih = $selisih / 86400;

		if ($selisih >= 1) {
		$hasil = floor($selisih);
		} else {
		$hasil = '0';
		}
		return $hasil;
	}

//get data invoice
    public function invoice($id_trans = 0)
    {

         $invoice = $this->app_admin->getinvoice($id_trans);

         foreach($invoice as $inv){
            $data['id_transaksi'] = $inv->id_transaksi;
            $data['nama_mobil'] = $inv->nama_mobil;
            $data['plat'] = $inv->plat_mobil;
            $data['nama_bank'] = $inv->nama_bank;
            $data['no_rek'] =$inv->no_rekening;
            $data['pemilik_bank'] = $inv->nama_pemilik;
            $data['tahun_mobil'] = $inv->tahun_mobil;
            $data['kapasitas'] = $inv->kapasitas_mobil;
            $data['warna'] = $inv->warna_mobil;
            $data['deskripsi'] = $inv->deskripsi_mobil;
            $data['merek_mobil'] = $inv->nama_merek;
            $data['foto_bukti'] = $inv->bukti_pembayaran;
            $data['nama'] = $inv->nama;
            $data['no_hp'] = $inv->no_hp;
            $data['email'] = $inv->email;
            $data['tujuan'] = $inv->tujuan;
            $data['tgl_order'] = $inv->tgl_order;
            $data['tgl_kembali'] = $inv->tgl_kembali;
            $data['waktu_order'] = $inv->waktu_order;
            $data['tgl_akhir'] = $inv->tgl_akhir;
            $data['lama_peminjaman'] = $inv->lama_peminjaman;
            $data['harga_sewa'] = $inv->harga;
            $data['total_harga'] = $inv->total_harga;
            $data['created'] = $inv->created_inv;
            $data['status_transaksi'] = $inv->status_transaksi;
            $data['bank'] = $inv->nama_bank;
            $bts_kembali = $inv->tgl_akhir;
			$tgl_kembali = $inv->tgl_kembali;
			$denda = $inv->harga_sewa;
         }

			$total = $this->selisih_tanggal($bts_kembali, $tgl_kembali)*$denda;

			$data['total'] = $total;
			$data['selisih'] = $this->selisih_tanggal($bts_kembali, $tgl_kembali);


        // $data['data'] = $this->app_admin->getMobil();
        $this->template->admin('admin/isi_invoice_selesai', $data);
    }

    // public function cetak()
    // {
    //     if (!is_numeric($this->uri->segment(3)) || !is_numeric($this->uri->segment(4)) ) 
    //     {
    //         redirect()
    //     } else {
    //         # code...
    //     }
        
    // }




}