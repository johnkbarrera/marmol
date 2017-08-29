<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {



	//****************************************************************************
	//****************************************************************************

	public function _construct(){
		parent::_construct();
	}

	//****************************************************************************
	//****************************************************************************
	public function index(){
		if($this->session->userdata('email')){																			//SI EXISTE UNA SESION REDIRECCIONAMOS
			redirect(base_url());
		}

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('pass', 'Contraseña', 'required');



		if ($this->form_validation->run())
		{
			$this->load->model('usuario_model');																			//	CARGAMOS LOS MODELOS
			$this->load->model('help_model');

			$email = $this->input->post('email');
			$pass = md5($this->input->post('pass'));

			if($this->help_model->state_account($email)=="NO CONFIRMADO"){												//	VERIFICAMOS (X EMAIL) SI LA CUENTA A SIDO CONFIRMADA
				$this->session->set_flashdata("response",$email);						
				redirect(base_url("/account/confirmate"));								//llamamas a una fuincion para confirmar
			}


			if($this->usuario_model->login($_POST['email'],md5($_POST['pass']))){
				$this->session->set_userdata(['email'=>$_POST['email'],'name'=>"nombre de prueba"]);							// CREAMOS LA SESSION
				redirect(base_url(account));                                                    //redirecciona al panel del usuario
			}else{
				redirect('login#bad-password');
			}
		}else {
			echo validation_errors();																									//		Mensaje de alerta
		}

 		$this->load->view('login');
 	}



	//****************************************************************************
	//****************************************************************************
	public function logout(){																											//	CERRAR SESSION
		$this->session->sess_destroy();
		$this->removeCache();
		redirect(base_url());
 	}
	//****************************************************************************
	//****************************************************************************
	public function begin_password_reset(){																				//																														NO IMPLEMENTADO
		if($this->session->userdata('email')){
			redirect(base_url());
		}
		print "aun no disponible";
	}

	//****************************************************************************
	//****************************************************************************
	public function removeCache(){																								//		REMOVEMOS MEMORIA CACHE
 		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
 		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
 		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
 		$this->output->set_header('Pragma: no-cache');
	}


}
