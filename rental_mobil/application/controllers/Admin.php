<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->cek_login();
		$this->template->admin('admin/isi_dashboard');
	}

	public function edit_admin()
	{

		$this->cek_login();

		if($this->input->post('submit', TRUE) == 'Submit')
		{
			$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[3]');
			$this->form_validation->set_rules('nama_admin', 'Nama', "required|trim|min_length[3]|regex_match[/^[a-z A-Z.']+$/]");
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');

			$username = $this->input->post('username', TRUE);
			$username_lama = $this->input->post('username_lama', TRUE);


			$cek_username = $this->app_admin->get_where('tb_admin', array('username' => $username));

			if($this->form_validation->run() == TRUE)
			{
				$get_data = $this->app_admin->get_where('tb_admin', array('id_admin' => $this->session->userdata('admin')))->row();
				if (!password_verify($this->input->post('password', TRUE), $get_data->password))
				{
					$this->session->set_flashdata('alert', 'Password yang anda masukkan salah');
					redirect(current_url());

					// echo '<script type="text/javascript">alert("Password yang anda masukkan salah");window.location.replace("'.base_url().'login/logout")</script>';
				}

				if ($username == $username_lama) 
				{

					$data = array(

						'username' => $this->input->post('username', TRUE),
						'nama_admin' => $this->input->post('nama_admin', TRUE),
						'email' => $this->input->post('email', TRUE),
						'username' => $this->input->post('username', TRUE),


					);

					$con = array('id_admin' => $this->session->userdata('admin'));

					$this->app_admin->update('tb_admin', $data, $con);

					$this->session->set_flashdata('success', 'Data Berhasil Di Ubah');



				} else if($cek_username->num_rows() > 0){
					$data = $cek_username->row();
					$this->session->set_flashdata('alert', 'Username yang anda masukkan sudah digunakan');
					redirect(current_url());

				}


				$data = array(

					'username' => $this->input->post('username', TRUE),
					'nama_admin' => $this->input->post('nama_admin', TRUE),
					'email' => $this->input->post('email', TRUE),
					'username' => $this->input->post('username', TRUE),


				);

				$con = array('id_admin' => $this->session->userdata('admin'));

				$this->app_admin->update('tb_admin', $data, $con);

				$this->session->set_flashdata('success', 'Data Berhasil Di Ubah');
			}

		}

		$get = $this->app_admin->get_where('tb_admin', array('id_admin' => $this->session->userdata('admin')))->row();

		$data['username'] = $get->username;
		$data['nama_admin'] = $get->nama_admin;
		$data['email'] = $get->email;

		$this->template->admin('admin/isi_editadmin', $data);
	}

	public function cek_login()
	{
		if(!$this->session->userdata('admin'))
		{
			redirect('login');
		}


	}


}
