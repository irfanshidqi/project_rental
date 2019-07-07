<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

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

    	$bank = $this->app_admin->get_all('tb_bank');

    	foreach ($bank->result() as $key) {
    		$data['id'] = $key->id_bank;
    		$data['nama_bank'] = $key->nama_bank;
    		$data['nama_pemilik'] = $key->nama_pemilik;
    		$data['no_rek'] = $key->no_rekening;
    		$data['tgl'] = $key->created;
    		# code...
    	}
    	$this->template->admin('admin/isi_databank', $data);
    }
}