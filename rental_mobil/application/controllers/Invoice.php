<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('app_admin');
	}

    public function index($id_trans)
    {

    	 $invoice = $this->app_admin->getinvoice($id_trans);

         foreach($invoice as $inv){
            $data['id_transaksi'] = $inv->id_transaksi;
            $data['nama_mobil'] = $inv->nama_mobil;
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

    public function upload_bukti()
    {
      if ($this->input->post('submit', TRUE) == 'Submit') 
        {
            $id = $this->uri->segment(3);           


            $config['upload_path'] = './assets/bukti_pembayaran/';
            $config['allowed_types'] = 'jpg|png|jpeg|';
            $config['max_size'] = '2048';
            $config['file_name'] = 'bukti'.date('Y_m_d_H_i_s');

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

    //check BUkti
        if (!$this->upload->do_upload('bukti')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error',$error['error']);
                redirect(current_url());
        }else {

        };
     //end check BUkti

            if ($this->upload->do_upload('bukti')) 
            {

                $gbr = $this->upload->data(); 

            //insert

                $this->db->where('id_transaksi', $id);
                $this->db->update('tb_transaksi',['status_transaksi' => 2]);

                $this->db->where('id_transaksi', $id);
                $this->db->update('tb_transaksi',['bukti_pembayaran' => $gbr['file_name']]);

                $this->session->set_flashdata('success', 'Upload Bukti Pembayaran Berhasil Silahkan Tunggu Konfirmasi Dari Admin');
                redirect("transaksi/invoice/".$id);

            } else {

                $this->session->set_flashdata('alert', 'Cek Kembali Foto Anda !');
                // echo $this->upload->display_errors('<p style="color:#fff">', '</p>');
            }


        }else{
              $this->session->set_flashdata('alert', 'Upload BUkti gagal !');
     
        }
    }

//akhir controller
}