<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {


	public function index()
 	{
		if (isset($_POST['password'])) {
			$this->load->model('usuario_model');
			if($this->usuario_model->login($_POST['email'],md5($_POST['password']))){
				redirect('welcome');
			}else{
				redirect('login#bad-password');
			}
		}
 		$this->load->view('login');
 	}
}
