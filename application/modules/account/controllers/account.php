<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MX_Controller {

	public function _construct()
	{
		parent::_construct();
	}


	public function index()
 	{
		if(!$this->session->userdata('email')){																			//si no estoy logeado
			redirect(base_url(login));
		}else {
			$this->load->view('index');
		}

 	}

	public function register()
	{

		if($this->session->userdata('email')){ 																		  //SI ESTOY LOGEADO
			redirect(base_url());
		}

		//set validation rules
		$this->form_validation->set_rules('nombres', 'Nombres', 'required');
		$this->form_validation->set_rules('apellidos','Apellidos', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('pass1', 'Pass1', 'required');
		$this->form_validation->set_rules('pass2', 'Pass2', 'required');
		if ($this->form_validation->run())
		{
			$nombres = $this->input->post('nombres');
			$apellidos = $this->input->post('apellidos');
			$email = $this->input->post('email');
			$pass = md5($this->input->post('pass1'));
			$this->load->model('register_model');
			if ($this->register_model->saveRecord($nombres,$apellidos,$email,$pass))
			{
				//$this->session->set_flashdata("response","Registro exitoso!");
				$this->session->set_userdata('email',$_POST['email']);
				redirect(base_url());
			}else {
				//$this->session->set_flashdata("response","Registro Fallido!");
				//redirect('#bad-password');
				echo "erros datos no guardados";
			}
		}else {
			echo validation_errors();																									//		Mensaje de alerta
		}


 		$this->load->view('register');


	}
}
