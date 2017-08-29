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
			//$this->getBalance($this->session->userdata('email'));

			$balance=$this->getBalance($this->session->userdata('email'));
			//print_r($balance);
			$address=$this->getAddress($this->session->userdata('email'));

			$data=array(
				'balance'=>$balance,
				'address'=>$address,
				'email'=>$this->session->userdata('email')
			);
			//print_r($address);
			//echo $balance;
			$this->load->view('guess/header');				
			$this->load->view('index',$data);
			$this->load->view('guess/footer');
		}
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
							$this->crear_wallet_btc($email,"123456789"); // Añadido por Edson ----> password constante
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
			echo validation_errors();//		Mensaje de alerta
		}
 		$this->load->view('register');
	}

	public function plantilla_confirmar_email($e,$r){
		$mensaje = array(																										//	Redactar MENSAJE DEL CORREO
			'email' => $e,
			'subject' => "ASUNTO DEL MENSAJE",
			'message' => "TU CODIGO DE VERIFICACION ES: ".$r
		);
		return $mensaje;
	}
	//crear_wallet_btc: devuelve array con las etiquetas 'guid','address','key' y 'label'
	private function crear_wallet_btc($email,$pass){		
		$this->register_model->nueva_wallet_btc($email,$this->wbtc->crear($pass));
	}

	public function transferir_btc(){

		$email = $this->input->post('email');
		$to_address = $this->input->post('address');
		$monto = $this->input->post('monto');
		$fee = $this->input->post('fee');
		$recibe = $this->input->post('recibe');


		$this->load->model('account_model');		
		$credenciales = $this->account_model->credenciales($email);
		$resp_transferir = $this->wbtc->transferir($credenciales['guid'],$credenciales['key'],$to_address,$recibe,$fee);
		/*		
		$resp_transferir = [
			'message'=>'sxxxxxsiiabUUvuvuboBUVuvy8V889voV',
			'tx_hash'=>'auiegr8272837283746gsdajbjbsdagsud',
			'notice'=>'Enviado'
			];
		*/		
		if(gettype($resp_transferir)=="string"){
			if($resp_transferir=="2"){
				$resp['estado']=2;
				echo json_encode($resp);
			}
			if($resp_transferir=="3"){
				$resp['estado']=3;
				echo json_encode($resp);
			}
			if($resp_transferir=="4"){
				$resp['estado']=4;
				echo json_encode($resp);
			}			
		}else{
			$this->load->model('account_model');
			$this->account_model->transferencia($credenciales['idWBlockchain'],$resp_transferir,$to_address,$recibe,$fee);
			$resp['estado']=1;
			$resp['msg']="Has enviado a <strong>".$to_address."</strong> el monto de <strong>".$recibe." BTC</strong>";
			echo json_encode($resp);
		}
	}

	private function getBalance($email){
		$this->load->model('account_model');
		$credenciales=$this->account_model->credenciales($email);
		return $this->wbtc->balance($credenciales['guid'],$credenciales['key']);
	}

	private function getAddress($email){
		$this->load->model('account_model');
		return ($this->account_model->getAddress($email))['address'];
	}

}
