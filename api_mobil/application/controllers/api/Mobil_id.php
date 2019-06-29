<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;


class Mobil_id extends REST_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_api_mobil','mobil');
	}

	public function index_post(){

	// $id_mobil = $this->uri->segment(3);		


    	$mobil = $this->mobil->get_where('tb_mobil',array('id_mobil' => $id_mobil));

    	foreach ($mobil->result() as $key) {

    		

    	}

	    $this->response([$key], REST_Controller::HTTP_OK);


	}

}