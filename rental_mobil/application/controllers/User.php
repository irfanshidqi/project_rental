<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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



	
    	$data['data'] = $this->app_admin->get_all('tb_user');
    	$this->template->admin('admin/isi_datauser', $data);
    }


	public function tambah_user()
	{
		if ($this->input->post('submit', TRUE) == 'Submit') 
		{
			//insert

			$this->load->helper('date');

			$datauser = array (
				'username' => $this->input->post('username', TRUE),
				'nama' => $this->input->post('nama', TRUE),
				'nik' => $this->input->post('nik', TRUE),
				'email' => $this->input->post('email', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'password' => password_hash($this->input->post('password', TRUE),PASSWORD_DEFAULT),
				'status' => 1

			);

				$this->db->set('created', 'NOW()', FALSE);
				$this->app_admin->insert('tb_user', $datauser);

				$this->session->set_flashdata('success', 'user Telah Berhasil di tambahkan');
				redirect(current_url());

			} else {



		
				$data['username'] = $this->input->post('username', TRUE);
				$data['nama'] = $this->input->post('nama', TRUE);
				$data['nik'] = $this->input->post('nik', TRUE);
				$data['email'] = $this->input->post('email', TRUE);
				$data['no_hp'] = $this->input->post('no_hp', TRUE);
				$data['jenis_kelamin'] = $this->input->post('jenis_kelamin', TRUE);
				$data['alamat'] = $this->input->post('alamat', TRUE);
				$data['password'] = $this->input->post('password', TRUE);



		$data['header_tambahmobil'] = "Tambah Mobil Baru";

		$this->template->admin('admin/form_tambahuser', $data);
			}

	}
	public function detail()
	{
		$id_user = $this->uri->segment(3);

		$user = $this->app_admin->get_where('tb_user', array('id_user' => $id_user));


    	$data['data'] = $this->app_admin->trans_id($id_user);

    	if (!empty($user->result())) {
		foreach ($user->result() as $tampil) 
			{
				$data['id_user'] = $tampil->id_user;
				$data['username'] = $tampil->username;
				$data['nama'] = $tampil->nama;
				$data['nik'] = $tampil->nik;
				$data['email'] = $tampil->email;
				$data['no_hp'] = $tampil->no_hp;
				$data['jenis_kelamin'] = $tampil->jenis_kelamin;
				$data['alamat'] = $tampil->alamat;
				$data['status'] = $tampil->status;
				$data['created'] = $tampil->created;
				$data['last_login'] = $tampil->last_login;


			}
    	} else{
    		redirect('user');
    	}
    	



		

		$this->template->admin('admin/isi_detailuser', $data);
	}

	public function update_user()
	{
		$id_user = $this->uri->segment(3);

		if ($this->input->post('submit', TRUE) == 'Submit') 
		{


			//insert

			$datauser = array (
				'username' => $this->input->post('username', TRUE),
				'nama' => $this->input->post('nama', TRUE),
				'nik' => $this->input->post('nik', TRUE),
				'email' => $this->input->post('email', TRUE),
				'no_hp' => $this->input->post('no_hp', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'status' => $this->input->post('status', TRUE)

			);

//proses upload-

				// echo $this->upload->display_errors('<p style="color:#fff">', '</p>');

		  $this->db->set('last_update', 'NOW()', FALSE);
		  $this->app_admin->update('tb_user', $datauser, array('id_user' => $id_user));

		  $this->session->set_flashdata('success', 'Data User Telah Berhasil di ubah');
		  redirect(current_url());
		}

		

		$user = $this->app_admin->get_where('tb_user', array('id_user' => $id_user));

		foreach ($user->result() as $tampil) 
		{
			$data['id_user'] = $tampil->id_user;
			$data['username'] = $tampil->username;
			$data['nama'] = $tampil->nama;
			$data['nik'] = $tampil->nik;
			$data['email'] = $tampil->email;
			$data['no_hp'] = $tampil->no_hp;
			$data['jenis_kelamin'] = $tampil->jenis_kelamin;
			$data['alamat'] = $tampil->alamat;
			$data['status'] = $tampil->status;
			$data['created'] = $tampil->created;
			$data['last_login'] = $tampil->last_login;


		}

		$data['header_tambahmobil'] = "Update  User";

		$this->template->admin('admin/form_updateuser', $data);
	}

		function hapus($id){


		$where = array('id_user' => $id);


		$this->app_admin->hapus_data($where,'tb_user');


		$this->session->set_flashdata('success' ,'Data Mobil Berhasil di hapus');

		redirect('user');
	}

}