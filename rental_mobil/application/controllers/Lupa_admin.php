<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lupa_admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('app_admin');
	}

    public function index()
    {
    	if($this->input->post('submit', TRUE) == 'Submit')
    	{
    		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

    		if($this->form_validation->run() == TRUE)
    		{
    			$get = $this->app_admin->get_where('tb_admin', array('email' => $this->input->post('email', TRUE)));

    			if($get->num_rows() > 0)
    			{
    				//proses
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

    				$key= md5(md5(time()));

    				$this->email->from('triplets.cv@gmail.com', "rentcar");
    				$this->email->to($this->input->post('email', TRUE));
    				$this->email->subject('Reset Password ');
    				$this->email->message(

    					'Apakah Anda Lupa dengan password anda ? Silahkan klik <a href="'.base_url().'lupa_admin/reset/'.$key.'">disini</a> . Jika anda tidak merasa request email ini silahkan abaikan saja pesan email ini'
    				);

    				if($this->email->send())
    				{
    					$data['reset'] = $key;
    					$cond['email'] = $this->input->post('email', TRUE);
    					$this->app_admin->update('tb_admin', $data, $cond);

    					$this->session->set_flashdata('success', "Email reset password berhasil dikirim silahkan cek pesan email anda");
    				}else{
    					$this->session->set_flashdata('alert', "Email gagal di kirim");
    				}

    			}else {
    				//pesan
    				$this->session->set_flashdata('alert', "Email yang anda masukkan tidak terdaftar ");

    			}
    		}
    	}

    	$this->load->view('admin/lupa_password');
    }
    public function reset()
    {

    	if ($this->uri->segment(3))
    	{
    		$this->load->view('admin/form_resetadmin');

    		if ($this->input->post('submit', TRUE) == 'Submit')
    		{
    			$this->form_validation->set_rules('pass1', 'Password Baru','required|trim|min_length[5]');
    			$this->form_validation->set_rules('pass2', 'Konfirmasi Password','required|matches[pass1]');


    			if ($this->form_validation->run() == TRUE)
    			{
    				$pass = $this->input->post('pass1', TRUE);
    				$data['password'] = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);
    				$data['reset'] = '';

    				$cond['reset'] = $this->uri->segment(3);

    				$this->app_admin->update('tb_admin', $data, $cond);

    				$this->session->set_flashdata('success', "Password anda berhasil di perbaharui");
					
					redirect('login');
    			}else{
       				 echo 'Errors:<br />';
        			 echo validation_errors();
    			}

    		}
    	}else {
    		redirect('lupa_admin');
    	}
    }
}