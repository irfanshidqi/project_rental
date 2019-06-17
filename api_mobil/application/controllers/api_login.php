<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;


class api_login extends REST_Controller {

	function __construct($config = 'rest')
	{
		parent::__construct($config);
		$this->load->model('m_apilogin');
	}

    // public function index_post()
    // {
    // 	$username = $this->input->post('username');
    // 	$password = $this->input->post('password');
    // 	$result = $this->m_apilogin->login_api($username, $password);

    // 	if (empty($result)) {
    		
    // 		$data['login'] = "Tidak Di Temukan";
    // 		$data['pesan'] = "Gagal ";
    // 		echo json_encode($data);

    // 	}else {
    // 		$data['login'] = $result;
    // 		$data['pesan'] = "success";
    // 		echo json_encode($data);
    // 	}


    // }

    public function index_post()
    {
            $user = $this->input->post('username', TRUE);
            $pass = $this->input->post('password', TRUE);

            $cek = $this->m_apilogin->get_where('tb_admin', array('username' => $user ));

            if ($cek->num_rows() > 0) {
                $data_ = $cek->result_array();

                if (password_verify($pass, $data_[0]['password']))
                {
                    $datauser = array (
                        'admin' => $data_[0]['id_admin'],
                        'email' => $data_[0]['email'],
                        'username' => $data_[0]['username'],
                        'nama' => $data_[0]['nama_admin'],
                        'level' => $data_[0]['level'],
                        'login' => TRUE
                    );


                    $this->response(['data' =>  $datauser,'pesan' => 'success'], REST_Controller::HTTP_OK);


                } else {
                    $this->response([
                        'login' => FALSE,
                        'pesan' => 'password anda salah'
                    ],REST_Controller::HTTP_BAD_REQUEST);


                }
                

            } else {
                $data['login'] = "Username tidak terdaftar";
                $data['pesan'] = "Gagal ";
                echo json_encode($data);

            }

        
    }
}
