<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;


class Api_register extends REST_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_api_register','register');
	}

	public function index_post(){
		$input = $this->input->post();

		if(!isset($input['username']) 
			|| !isset($input['nama']) 
			|| !isset($input['nik']) 
			|| !isset($input['email'])
			|| !isset($input['no_hp'])
			|| !isset($input['jenis_kelamin'])
			|| !isset($input['alamat'])
			|| !isset($input['password'])

		){

				$this->response([
				'gagal' => false,
				'pesan' => 'form harus diisi semua'
			],REST_Controller::HTTP_BAD_REQUEST);
		} else {
			$data = [
			'username' => $input['username'],
			'nama' => $input['nama'],
			'nik' => $input['nik'],
			'email' => $input['email'],
			'no_hp' => $input['no_hp'],
			'jenis_kelamin' => $input['jenis_kelamin'],
			'alamat' => $input['alamat'],
			'password' => password_hash($input['password'],PASSWORD_DEFAULT),
			'status' => 1


			];


			$this->db->set('created', 'NOW()', FALSE);
			$tambah = $this->register->add($data);

			if($tambah){
				$this->response([
					'sukses' => true,
					'pesan' => 'register berhasil'
				],REST_Controller::HTTP_CREATED);
			} else {
				$this->response([
					'sukses' => false,
					'pesan' => 'register gagal'
				],REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}

}