<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;


class Api_mobil extends REST_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_api_mobil','mobil');
	}

	public function index_get(){

    	$mobil = $this->mobil->get_all('tb_mobil');

	    $this->response($mobil, REST_Controller::HTTP_OK);


	}

}