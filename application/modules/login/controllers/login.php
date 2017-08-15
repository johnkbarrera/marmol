<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {


	public function index()
 	{
		if (isset($_POST['password'])) {
			$this->load->model('Usuario_model');
			if($this->Usuario_model->login($_POST['username'],md5($_POST['password']))){
				redirect('welcome');
			}else{
				redirect('login0');
			}
		}
 		$this->load->view('login0');
 	}
}
