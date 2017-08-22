<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MX_Controller {

	public function _construct()
	{
		parent::_construct();
	}


	public function index()
 	{
		if(!$this->session->userdata('email')){																			//si no estoy logeado en session
			redirect(base_url(login));
		}else {
			$this->load->view('index');
		}

 	}

	public function validate(){
		/*if(!$this->session->userdata('email')){																			//si no estoy logeado en session
			redirect(base_url(login));
		}else {								*/
			$this->load->view('validar');
			$aleatorio = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
			echo "string  ".$aleatorio;
			$mail="johnkevinbarrera@gmail.com";
			$this->enviarmail($mail,$aleatorio);
		//}

 	}

	public function register(){

    //$this->validador_propio->una_function(); // prueba

		if($this->session->userdata('email')){ 																		  //SI ESTOY LOGEADO en session
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
			$this->load->model('register_model');
			$this->load->model('help_model');

			$nombres = $this->input->post('nombres');
			$apellidos = $this->input->post('apellidos');
			$email = $this->input->post('email');
			$pass = md5($this->input->post('pass1'));

			if ($this->help_model->unique_email($email)) {
				redirect(base_url("/account#email_ existe"));														//	MOSTRAR MENSAJE DE ALERTA "EMAIL YA REGISTRADO"
			}

			if ($this->register_model->saveRecord($nombres,$apellidos,$email,$pass)){ //	USUARIO REGISTRADO EN LA BD EN ESTADO "NO CONFIRMADO"
			 		redirect(base_url("/account/validate"));															//	REDIRIGIMOS PARA PODER VALIDAR LA CUENTA
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

	public function crear_btc(){
		// POR IMPLEMENTAR

	}

	public function enviarmail($aemail,$codigo){
		$this->email->from('jk.barrerac@up.edu.pe', 'Your Name');
		$this->email->to($aemail);

		$this->email->subject('Codigo de verificación');
		$this->email->message('tu codigo de verificacion marmol es: '.$codigo);

		if ($this->email->send()) {
			echo "enviado papus";
			return 1;
		}else {
			echo $this->email->print_debugger();
			return 0;
		}
	}


}
