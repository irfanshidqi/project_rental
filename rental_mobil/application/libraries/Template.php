<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{

	function __construct()
	{
		$this->ci =&get_instance();
	}
	function admin($template, $data_content='')
	{
		$data['content'] = $this->ci->load->view($template, $data_content, TRUE);
		$data['nav'] = $this->ci->load->view('admin/nav', $data_content, TRUE);

		$this->ci->load->view('admin/dashboard', $data);	
	}

	// function login($template, $data_content='')
	// {

	// 	$data['content_login'] = $this->ci->load->view($template, $data_content, TRUE);

	// 			$this->ci->load->view('admin/login', $data);	

	// }

}