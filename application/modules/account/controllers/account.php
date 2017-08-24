<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MX_Controller {


	public function _construct(){
		parent::_construct();
	}

	public function index(){
		if(!$this->session->userdata('email')){ 
		//si no estoy logeado en session
			redirect(base_url(login));
		}else {
			$this->load->view('guess/header');				
			$this->load->view('index');
			$this->load->view('guess/footer');
		}

 	}

	public function validate(){
		/*if(!$this->session->userdata('email')){																			//si no estoy logeado en session
			redirect(base_url(login));
		}else {								*/

		//  SI NO CONFIRMADO Y ALEATORIO = "NULO"
		//		CREO aleatorio
		// 		GUARDO EN DB DEL EMAIL
		//  ENVIO ALEATORIO DE LA BD
		//  ENVIO EMAIL


		if ($_SESSION['aleatorio']=NULL) {
			$enviado = 1;
			$email = $_SESSION['email'];
		}else {
			# code...
				$email = $_SESSION["response"];
	 		 	$aleatorio = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
				echo "codigo: ".$aleatorio;																							// HASTA QUE ENVIEMOS UN MAIL DE VERDAD
				$mensaje = array(
		      'email' => $email,
		      'subject' => "",
		      'message' => "",
		      'codigo' => $aleatorio
		     );
				 $enviado = $this->enviar_mail($mensaje);
				 # code...
	 		}

			 if ($enviado == 1) {																											//	SI EL MENSAJE FUE ENVIADO

				 $this->form_validation->set_rules('codigo', 'Codigo de verificación', 'required');

				 if ($this->form_validation->run()){
					 $cod_ver = $this->input->post('codigo');
					 $cod_ant = $_SESSION["aleatorio"];
					 echo "  aleatorio: ".$cod_ant." codigo: ".$cod_ver;
					 if ($cod_ver == $cod_ant) {
					 	//  CAMBIAR ESTADO A CONFIRMADO
						//	ASIGNAR WALLETS al email
						$this->session->set_flashdata("response","Cuenta Confirmada vamonos a login");
						//redirect(base_url("/login"));
					 }else {
						$this->session->set_flashdata("response","Codigo Incorrecto");
					}
				 }

			}else {																																		//SI EL MENSAJE NO FUE ENVIADO
					$this->session->set_flashdata("response","Email no identificado");
					//redirect(base_url("/account/register"));
			}
		//}
		$_SESSION['aleatorio'] = $aleatorio;
		$_SESSION['email'] = $email;
		$this->session->keep_flashdata('aleatorio','email');
		$this->load->view('validar');

 	}

	public function confirmate(){
		if(!$_SESSION["response"]){																		                          //si no estoy logeado en session
			redirect(base_url(login));
		}
		else {														 // 	SI ESTOY LOGEADO PERO NO TENGO NADA QUE VALIDAR
			# code...
			$email = $_SESSION["response"];
			$this->load->model('help_model');

			if($this->help_model->state_account($email)=="NO CONFIRMADO"){												//	VERIFICAMOS QUE EL EMAILRECIBIDO  SEA = "NO VALIDAD"
				$aleatorio = $this->help_model->codigo_confirmacion($email);
				echo "aleatorio: ".$aleatorio;

				$enviado = 1;
				 //var_dump($this->email->print_debugger());
				 $this->session->set_flashdata('response',$email);
				 if ($enviado == 1) {
				 	//	SI EL MENSAJE FUE ENVIADO
					 $this->form_validation->set_rules('codigo', 'Codigo de verificación', 'required');

					 if ($this->form_validation->run()){
						 $codigo = $this->input->post('codigo');
						 echo "  aleatorio: ".$aleatorio." codigo: ".$codigo;
						 if ($aleatorio == $codigo) {

 							$this->load->model('register_model');
							$this->register_model->save_confirmed($email);						//  CAMBIAR ESTADO A CONFIRMADO
							//	ASIGNAR WALLETS al email
							$this->crear_wallet_btc($email); // Añadido por Edson
							$this->session->set_flashdata("response","Cuenta Confirmada");
							redirect(base_url("/login"));
						 }else {
							echo "Codigo Incorrecto, Intentelo mas tarde";
							//$this->session->set_flashdata("response",$email);										//rembiamos el codigo al correo
						}
					 }
				}else {																																		//SI EL MENSAJE NO FUE ENVIADO
						$this->session->set_flashdata("response","Email no identificado");
						redirect(base_url("/account/register"));
				}
				$this->load->view('confirmar');
			}else {
				redirect(base_url(login));
			}

		}
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

		if ($this->form_validation->run()){
			$this->load->model('register_model');
			$this->load->model('help_model');

			$nombres = $this->input->post('nombres');
			$apellidos = $this->input->post('apellidos');
			$email = $this->input->post('email');
		 	$pass = md5($this->input->post('pass1'));

			if ($this->help_model->unique_email($email)) {
				redirect(base_url("/account#email_ existe"));														//	MOSTRAR MENSAJE DE ALERTA "EMAIL YA REGISTRADO"
			}
			$random = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
			if ($this->register_model->save_noconfirmed($nombres,$apellidos,$email,$pass,$random)){ //	USUARIO REGISTRADO EN LA BD EN ESTADO "NO CONFIRMADO"
				$mensaje = $this->plantilla_confirmar_email($email,$random);							//	LLENAMOS LA PLANTILLA COPN EL CODIGO
				$this->help_model->sendMailGmail($mensaje);																//	ENVIAR MENSAJE AL CORREO
				$this->session->set_flashdata("response",$email);
				redirect(base_url("/account/confirmate"));															//	REDIRIGIMOS PARA PODER VALIDAR LA CUENTA
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

	public function plantilla_confirmar_email($e,$r){
		$mensaje = array(																														//	Redactar MENSAJE DEL CORREO
			'email' => $e,
			'subject' => "ASUNTO DEL MENSAJE",
			'message' => "TU CODIGO DE VERIFICACION ES: ".$r
		);
		return $mensaje;
	}

	private function crear_wallet_btc($email){
		/* El metodo crear_wbtc devuelve: 'guid','address','password','label' */
		$this->register_model->nueva_wallet_btc($email,$this->wbtc->crear($pass));
	}

	public function transferir_btc(){
		if(isset($_POST['email']) && isset($_POST['address']) && isset($_POST['monto'])){
			$id = $_POST['email'];
			$to_address = $_POST['address'];
			$monto = $_POST['monto'];//->esto va para la base de datos
			$fee = $_POST['fee'];
			$recibe = $_POST['recibe'];

			$credenciales =$this->account_model->credenciales($email);
			//$guid,$pass,$to_address, $amount, $from_address,$fee=null
			$resp = $this->wbtc->transferir($credenciales['guid'],$credenciales['password'],$to_address,$recibe,$fee);
			$this->account_model->transferencias($to_address,$resp);
			/* $resp devuelve estos 3 campos
				 'message'
				 'tx_hash'
				 'notice'
			*/
			/*
			if($saveItem){
				$resp['valid'] = true;
				$resp['msg'] = "Transacción exitosa!";
			}else{
				$resp['valid'] = false;
			}
			echo json_encode($resp);
			*/
		}
	}


}
