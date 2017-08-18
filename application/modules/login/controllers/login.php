<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

	public function _construct()
	{
		parent::_construct();
	}
	public function index()
 	{
		if($this->session->userdata('email')){
			redirect(base_url());
		}

		if (isset($_POST['password'])) {
			$this->load->model('usuario_model');
			if($this->usuario_model->login($_POST['email'],md5($_POST['password']))){
				$this->session->set_userdata('email',$_POST['email']);
				redirect(base_url(account));                                                    //redirecciona al panel del usuario
			}else{
				redirect('login#bad-password');
			}
		}
 		$this->load->view('login');
 	}

	public function logout()
 	{
		$this->session->sess_destroy();
		redirect(base_url());
 	}

	public function begin_password_reset()
	{
		if($this->session->userdata('email')){
			redirect(base_url());
		}

		print "aun no disponible";
	}

}
