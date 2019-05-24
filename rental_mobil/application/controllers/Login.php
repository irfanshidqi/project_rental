<?php 
defined('BASEPATH') OR exit('No Direct Script Access allowed');

class Login extends CI_Controller{

	function __construct()
	{
		parent::__construct();		
		$this->load->model('app_admin');
	}

	function index()
	{
				// echo password_hash('admin', PASSWORD_DEFAULT, ['cost' => 10]);

		if ($this->input->post('submit', TRUE) == 'Submit') 
		{
			$user = $this->input->post('username', TRUE);
			$pass = $this->input->post('password', TRUE);

			$cek = $this->app_admin->get_where('tb_admin', array('username' => $user ));

			if ($cek->num_rows() > 0) {
				$data = $cek->row();

				if (password_verify($pass, $data->password))
			    {
			    	$datauser = array (
			    		'admin' => $data->id_admin,
			    		'username' => $data->username,
			    		'nama' => $data->nama_admin,
			    		'level' => $data->level,
			    		'login' => TRUE
			    	);

			    	$this->session->set_userdata($datauser);

			    	redirect('admin');
				} else {
					$this->session->set_flashdata('alert', "Password yang anda masukkan salah");
				}
				

			} else {
					$this->session->set_flashdata('alert', "Username yang anda masukkan salah");

			}
			
		}
		if($this->session->userdata('login') == TRUE)
		{
			redirect('admin');
		}

		$this->load->view('admin/login');

	}
	public function logout()
	{
		$this->session->sess_destroy(); 
		redirect('login');
	}

}