<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba extends MX_Controller {


	public function index()
 	{
		echo "hola pe";
		$this->load->view('guess/nav');
		$this->load->view('guess/header');
		$this->load->view('guess/header0');
		$this->load->view('guess/footer');

	}
}
