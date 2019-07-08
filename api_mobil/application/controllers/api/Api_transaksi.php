<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;


class Api_transaksi extends REST_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_api_transaksi','trans');
	}

	public function index_post(){

		$input = $this->input->post();

		if(!isset($input['merek_mobil']) 
			|| !isset($input['id_pelanggan']) 
			|| !isset($input['nik']) 
			|| !isset($input['id_supir'])
			|| !isset($input['tipe_mobil'])
			|| !isset($input['sewa'])
			|| !isset($input['total_harga'])
			|| !isset($input['nama_pelanggan'])
			|| !isset($input['no_pelanggan'])
			|| !isset($input['email_pelanggan'])
			|| !isset($input['tgl_start'])
			|| !isset($input['waktu'])
			|| !isset($input['bank'])
			|| !isset($input['lama_penyewaan'])



		){

				$this->response([
				'gagal' => false,
				'pesan' => 'form harus diisi semua'
			],REST_Controller::HTTP_BAD_REQUEST);
		} else {

        $id_trans = $this->trans->get_id_transaksi();


        $awal_penyewaan =  $input['tgl_start'];

        $lama_penyewaan = $input['lama_penyewaan'];
        $akhir_penyewaan  = date('Y-m-d', strtotime("+".$lama_penyewaan." day", strtotime($awal_penyewaan)));

        $transaksi = array(

            'id_transaksi' => $id_trans,
            'id_merek' => $input['merek_mobil'],
            'id_user' => $input['id_pelanggan'],
            'id_supir' => $input['id_supir'],
            'id_mobil' => $input['tipe_mobil'],
            'status_transaksi' => 1,
            'harga' => $input['sewa'],
            'total_harga' => $input['total_harga'],
            'nama' => $input['nama_pelanggan'],
            'no_hp' => $input['no_pelanggan'],
            'email' => $input['email_pelanggan'],
            'tujuan' => $input['tujuan'],
            'tgl_order' => $input['tgl_start'],
            'waktu_order' => $input['waktu'],
            'tgl_akhir' => $akhir_penyewaan,
            'id_bank' => $input['bank'],
            'lama_peminjaman' => $input['lama_penyewaan']



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
                    $this->email->to($this->input->post('email_pelanggan', TRUE));
                    $this->email->subject('Penyewaan Mobil ');
                    $this->email->message(

                        'Terimakasih Telah Melakukan Pemesanan Penyewaan Mobil , mohon segera melakukan pembayaran sebelum waktu yg di tentukan sehingga pesanan anda dapat kami proses ke langkah selanjutnya'
                    );
                    if($this->email->send())
                    {
                        // $this->session->set_flashdata('success', "Transaksi telah berhasil di lakukan , silahkan cek email anda untuk melihat detail");

				$this->response([
					'sukses' => "1",
					'pesan' => 'Pesan Telah Berhasil'
				],REST_Controller::HTTP_CREATED);

                    }else{
                        // $this->session->set_flashdata('alert', "Transaksi gagal Email gagal di kirim");
				$this->response([
					'sukses' => false,
					'pesan' => 'transaksi gagal'
				],REST_Controller::HTTP_BAD_REQUEST);

                    }

        $this->db->where('id_mobil' , $this->input->post('tipe_mobil'));
        $this->db->update('tb_mobil',['status_sewa' => 2]);


         $this->db->set('created_inv', 'NOW()', FALSE);
         $this->trans->insert('tb_transaksi', $transaksi);




 

     //    $data['bank'] = $this->trans->getbank();


     //    $data['id_tr'] = $this->trans->get_id_transaksi();

    	// $data['merek'] = $this->trans->getAll();
    	// $data['data'] = $this->trans->getMobil();
    	// $this->template->admin('admin/form_transaksi', $data);
    }

}

	public function index_get(){

    	$trans = $this->trans->get_all('tb_transaksi');

	    $this->response($trans, REST_Controller::HTTP_OK);


	}

}