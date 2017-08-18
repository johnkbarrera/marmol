<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions extends MX_Controller {

	public function _construct()
	{
		parent::_construct();
	}
	public function index()
 	{
		$this->load->view('guess/nav');
		$this->load->view('guess/header');
		$this->load->view('guess/main');
		$this->load->view('contenido');
		$this->load->view('guess/footer');
 	}

	public function begin_password_reset()
	{
		if($this->session->userdata('email')){
			redirect(base_url());
		}

		print "aun no disponible";
	}

}
