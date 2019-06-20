<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
//model
		$this->load->model('app_admin');
// HELPER
        $this->load->helper('exDate_helper');

        if(!$this->session->userdata('admin'))
        {
            redirect('login');
        }
        

	}

    public function index()
    {


    	$data['data'] = $this->app_admin->get_allinvoice();
        $data['header_trans'] = " Data Semua Transaksi ";
        $data['penjelasan'] = "Di bawah Ini Merupakan Semua data Transaksi yg ada";

    	$this->template->admin('admin/isi_datatransaksi', $data);
    }
    public function tr_pending()
    {
        $data['data'] = $this->app_admin->get_pending();
        $data['header_trans'] = "Data Transaksi Pending ";
        $data['penjelasan'] = "Di bawah Ini Merupakan Data Transaksi Pesanan user yang Belum Mengupload Bukti Pemayaran";

        $this->template->admin('admin/isi_datatransaksi', $data);

    }
    public function tr_wait(){
        $data['data'] = $this->app_admin->get_wait();
        $data['header_trans'] = "Data Transaksi yg menunggu Konfirmasi ";
        $data['penjelasan'] = "Di bawah Ini Merupakan Data Transaksi Yang sudah melakukan upload pembayaran";

        $this->template->admin('admin/isi_datatransaksi', $data);
    }
    public function tr_lunas(){
        $data['data'] = $this->app_admin->get_lunas();
        $data['header_trans'] = "Data Transaksi Lunas ";
        $data['penjelasan'] = "Di bawah Ini Merupakan Data Transaksi Yang telah terkonfirmasi Lunas";

        $this->template->admin('admin/isi_datatransaksi', $data);
    }
    public function tr_berlangsung(){
        $data['data'] = $this->app_admin->get_berlangsung();
        $data['header_trans'] = "Data Transaksi Berlangsung ";
        $data['penjelasan'] = "Di bawah Ini Merupakan Data Transaksi Yang telah terkonfirmasi Peminjaman telah di berikan";

        $this->template->admin('admin/isi_datatransaksi', $data);
    }
    public function tambah_transaksi()
    {
        $this->app_admin->cek_login();

        if ($this->input->post('submit', TRUE) == 'Submit') 
        {

        $id_trans = $this->app_admin->get_id_transaksi();


        $awal_penyewaan =  $this->input->post('tgl_start');

        $lama_penyewaan = $this->input->post('lama_penyewaan');
        $akhir_penyewaan  = date('Y-m-d', strtotime("+".$lama_penyewaan." day", strtotime($awal_penyewaan)));

        $transaksi = array(

            'id_transaksi' => $id_trans,
            'id_merek' => $this->input->post('merek_mobil', TRUE),
            'id_mobil' => $this->input->post('tipe_mobil'),
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
            'id_admin'=> $this->session->userdata('admin'),
            'lama_peminjaman' => $this->input->post('lama_penyewaan', TRUE)



        );


                    $this->load->library('email');

                    $config['charset'] = 'utf-8';
                    $config['useragent'] = 'rentcar';
                    $config['protocol'] = 'smtp';
                    $config['mailtype'] = 'html';
                    $config['smtp_host'] = 'ssl://smtp.gmail.com';
                    $config['smtp_port'] ='465';
                    $config['smtp_timeout'] = '5';
                    $config['smtp_user'] = 'triplets.cv@gmail.com';//email gmail
                    $config['smtp_pass'] = 'polije123456';//isi passowrd email
                    $config['crlf'] = "\r\n";
                    $config['newline'] = "\r\n";
                    $config['wordwrap'] = TRUE;

                    $this->email->initialize($config);


                    $this->email->from('triplets.cv@gmail.com', "rentcar");
                    $this->email->to($this->input->post('email', TRUE));
                    $this->email->subject('Penyewaan Mobil ');
                    $this->email->message(

                        'Terimakasih Telah Melakukan Pemesanan Penyewaan Mobil , mohon segera melakukan pembayaran sebelum waktu yg di tentukan sehingga pesanan anda dapat kami proses ke langkah selanjutnya'
                    );
                    if($this->email->send())
                    {
                        $this->session->set_flashdata('success', "Transaksi telah berhasil di lakukan , silahkan cek email anda untuk melihat detail");
                    }else{
                        $this->session->set_flashdata('alert', "Transaksi gagal Email gagal di kirim");
                        redirect("transaksi/tambah_transaksi");

                    }

        $this->db->where('id_mobil' , $this->input->post('tipe_mobil'));
        $this->db->update('tb_mobil',['status_sewa' => 2]);


         $this->db->set('created_inv', 'NOW()', FALSE);
         $this->app_admin->insert('tb_transaksi', $transaksi);



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
//get harga ajax
    public function getharga(){
        $datanya = ['id_mobil' => $this->input->post('id_mobil') ];
             $data = $this->app_admin->getharga($datanya);
            echo json_encode($data);
    }
    function selisih_tanggal($dateline, $kembali){

        $tgl_dateline = explode('-', $dateline);
        $tgl_dateline = $tgl_dateline[2].'-'.$tgl_dateline[1].'-'.$tgl_dateline[0];

        $tgl_kembali = explode('-', $kembali);
        $tgl_kembali = $tgl_kembali[2].'-'.$tgl_kembali[1].'-'.$tgl_kembali[0];

        $selisih = strtotime($tgl_kembali) - strtotime($tgl_dateline);
        $selisih = $selisih / 86400;

        if ($selisih >= 1) {
        $hasil = floor($selisih);
        } else {
        $hasil = floor($selisih);
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
            $data['waktu_order'] = $inv->waktu_order;
            $data['tgl_akhir'] = $inv->tgl_akhir;
            $data['lama_peminjaman'] = $inv->lama_peminjaman;
            $data['harga_sewa'] = $inv->harga;
            $data['total_harga'] = $inv->total_harga;
            $data['created'] = $inv->created_inv;
            $data['status_transaksi'] = $inv->status_transaksi;
            $data['bank'] = $inv->nama_bank;
            $bts_kembali = date('Y-m-d');
            $tgl_kembali = $inv->tgl_akhir;
            $batas = $inv->tgl_akhir;
            $telat = date('Y-m-d');

         }
        $data['selisih'] = $this->selisih_tanggal($bts_kembali, $tgl_kembali);
        $data['telat'] = $this->selisih_tanggal($batas, $telat);



        $time       = $this->app_admin->getinvoice($id_trans);
        $date_now   = date('Y-m-d H:i:s');

        foreach($time as $row)
        {
            $created_inv = $row->created_inv;
        }

        $awal  = new DateTime($created_inv);
        $akhir = new DateTime($date_now);
        $diff  = $awal->diff($akhir);

        $var['limit']          = $diff->h;

        // $data['data'] = $this->app_admin->getMobil();
        $this->template->admin('admin/isi_invoice', $data);
    }
//timer untuk invoice
    public function timer($id_trans){

        $inv = $this->app_admin->getinvoice($id_trans);
date_default_timezone_set('Asia/Jakarta');
        $date_now   = date('Y-m-d H:i:s');

        foreach($inv as $row)
        {
            $datetime = $row->created_inv;

            $awal  = new DateTime($datetime);
            $akhir = new DateTime($date_now);
            $diff  = $awal->diff($akhir);

            if($diff->h > 0)
            {
                //update status transaksi jadi batal
                $this->db->where(['id_transaksi' => $row->id_transaksi]);
                $this->db->update('tb_transaksi',['status_transaksi' => 9]);
                //update status mobil menjadi Tersedia
                $this->db->where(['id_mobil' => $row->id_mobil]);
                $this->db->update('tb_mobil', ['status_sewa' => 1]);


            echo "<div class='btn btn-danger pull-right'><i class='fa fa-credit-card'>Waktu Pembayaran Telah Habis</div>";

        }else{

            echo 60-$diff->i . ' Menit ';
            echo 60-$diff->s . ' Detik ';
            echo '<br><a href="#ModalUploadBukti" class="btn btn-success pull-right" data-toggle="modal"><i class="fa fa-credit-card"></i> Upload Bukti Pembayaran</a>'; 




        }

    }
}
//auto update status ketika timer habis
    public function checkinv($id_trans)
    {
        $inv = $this->app_admin->getinvoice($id_trans);
        date_default_timezone_set('Asia/Jakarta');

        $date_now   = date('Y-m-d H:i:s');

        foreach($inv as $row)
        {
            $datetime = $row->created_inv;

            $awal  = new DateTime($datetime);
            $akhir = new DateTime($date_now);
            $diff  = $awal->diff($akhir);

            if($diff->h > 0)
            {
                $this->db->where(['id_transaksi' => $row->id_transaksi]);
                $this->db->update('tb_transaksi',['status_transaksi' => 9]);

            }

            
        }
    }
    function get_autocomplete_supir(){
        if (isset($_GET['term'])) {
            $result = $this->app_admin->search_supir($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label'         => $row->nama_supir,
                    'id'   => $row->id_supir,
                    'hp_supir'   => $row->no_hp,
                    'umur'    => $row->umur,
                    'alamat_supir'    => $row->alamat,


                );
                echo json_encode($arr_result);
            }
        }
    }
    function get_autocomplete_pelanggan(){
        if (isset($_GET['term'])) {
            $result = $this->app_admin->search_pelanggan($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label'         => $row->nama,
                    'id'   => $row->id_user,
                    'hp_pelanggan'   => $row->no_hp,
                    'email_pelanggan'    => $row->email,


                );
                echo json_encode($arr_result);
            }
        }
    }

// akhir controler
}