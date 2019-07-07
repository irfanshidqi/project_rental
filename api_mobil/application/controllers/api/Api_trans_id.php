
<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;


class Api_trans_id extends REST_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_api_transaksi','transaksi');
	}

	public function index_post(){
		$id_user = $this->input->post('id_user');


    	$trans = $this->transaksi->trans_by_id($id_user);

	    $this->response($trans, REST_Controller::HTTP_OK);
	}

}