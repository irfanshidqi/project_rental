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

            $cek = $this->m_apilogin->get_where('tb_user', array('username' => $user ));

            if ($cek->num_rows() > 0) {
                $data_ = $cek->result_array();

                if (password_verify($pass, $data_[0]['password']))
                {
                    $datauser = array (
                        'id_user' => $data_[0]['id_user'],
                        'username' => $data_[0]['username'],
                        'nama' => $data_[0]['nama'],
                        'nik' => $data_[0]['nik'],
                        'email' => $data_[0]['email'],
                        'no_hp' => $data_[0]['no_hp'],
                        'jenis_kelamin' => $data_[0]['jenis_kelamin'],
                        'alamat' => $data_[0]['alamat'],
                        'status' => 1,
                        'login' => TRUE
                    );

                    $this->db->where(['id_user' =>$data_[0]['id_user'] ]);
                    $this->db->update('tb_user', ['last_login' => date("Y-m-d H:i:s")]);

            $data['login'] = $datauser;
            $data['success'] = "1";
            $data['message'] = "success";
            echo json_encode($data);




                } else {

            $data['login'] = [];
            $data['success'] = "0";
            $data['message'] = "gagal password salah";
            echo json_encode($data);


                }
                

            } else {
            $data['login'] = [];
            $data['success'] = "2";
            $data['message'] = "username salah";
            echo json_encode($data);

            }

        
    }
}
