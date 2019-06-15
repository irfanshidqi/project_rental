<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_invoice extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('app_admin');
	}

    public function index($id_trans)
    {


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
                redirect("transaksi/invoice/".$id);

                // echo $this->upload->display_errors('<p style="color:#fff">', '</p>');
            }


        }else{
              $this->session->set_flashdata('alert', 'Upload Bukti gagal !');
                redirect("transaksi/invoice/".$id);

     
        }
    }

    public function konfirmasi_lunas(){
        if($this->input->post('submit', TRUE) == 'Submit'){


            $id = $this->uri->segment(3);
            $this->db->where('id_transaksi', $id);
            $this->db->update('tb_transaksi', ['status_transaksi' => 3]);

            $this->session->set_flashdata('success', 'Konfirmasi Telah Berhasil');
        redirect("transaksi/invoice/".$id);


        }else{
            $this->session->set_flashdata('alert', 'Konfirmasi Gagal');
                redirect("transaksi/invoice/".$id);

        }



    }
    public function konfirmasi_peminjaman(){



            $id = $this->uri->segment(3);
            $this->db->where('id_transaksi', $id);
            $this->db->update('tb_transaksi', ['status_transaksi' => 4]);

            $this->session->set_flashdata('success', 'Konfirmasi Telah Berhasil');
        redirect("transaksi/invoice/".$id);





    }
    public function pembatalan(){


            $id = $this->uri->segment(3);
            $this->db->where('id_transaksi', $id);
            $this->db->update('tb_transaksi', ['status_transaksi' => 9]);

            $this->session->set_flashdata('success', 'Pembatalan Telah Berhasil');
        redirect("transaksi/invoice/".$id);




        



    }
    public function peminjaman_selesai(){


            $id = $this->uri->segment(3);
// update status ke seelsai
            $this->db->where('id_transaksi', $id);
            $this->db->update('tb_transaksi', ['status_transaksi' => 5]);
// insert tgl kembali
            $this->db->where('id_transaksi', $id);
            $this->db->update('tb_transaksi', ['tgl_kembali' => date("Y-m-d")]);

            $this->session->set_flashdata('success', 'Peminjaman Selesai Telah Berhasil');
        redirect("transaksi/invoice/".$id);




        



    }



//akhir controller
}