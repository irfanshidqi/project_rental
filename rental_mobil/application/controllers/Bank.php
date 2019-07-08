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

    	$data['data'] = $this->app_admin->get_all('tb_bank');


    	$this->template->admin('admin/isi_databank', $data);
    }
    public function tambah_bank(){
            
        if ($this->input->post('submit', TRUE) == 'Submit') 
        {
            //insert

            $this->load->helper('date');

            $datauser = array (
                'nama_pemilik' => $this->input->post('nama_pemilik', TRUE),
                'nama_bank' => $this->input->post('nama_bank', TRUE),
                'no_rekening' => $this->input->post('no_rekening', TRUE)
            );

                $this->db->set('created', 'NOW()', FALSE);
                $this->app_admin->insert('tb_bank', $datauser);

                $this->session->set_flashdata('success', 'user Telah Berhasil di tambahkan');
                redirect(current_url());

            } 

     

        }

        // end controler
    }
