<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('vendor/autoload.php');

class WBTC
{
	private $api_code; // *
	private $Blockchain; // *		
	private $fee;
	private $servicio;
	private $label;
	
	function __construct(){
		$this->api_code = "abdb42b4-6744-4897-8176-26316b4bd838";
		$this->servicio = "http://localhost:3000";
		$this->seg_pass = null;
		$this->label = "Billetera Bitcoin";
		$this->fee = 0.00038;				
	}

	private function iniciarConexionAPI(){
		
		$this->Blockchain = new \Blockchain\Blockchain($this->api_code);
		$this->Blockchain->setServiceUrl($this->servicio);
	}

	private function iniciarConexion(){		

		$this->Blockchain = new \Blockchain\Blockchain();
		$this->Blockchain->setServiceUrl($this->servicio);
	}

	private function generar_key(){
		//Aqui se tiene que generar la clave de la billetera
	}

	//Crea una WalletBlockchain retorna 4 parametros tipo string: 'guid','address','key' y'label' 
	public function crear($pass, $email=null){				
		$this->iniciarConexionAPI();
		try{
			$wallet=$this->Blockchain->Create->create($pass,$email,$this->label);
			$data=[
				'guid'=>$wallet->guid,
				'address'=>$wallet->address,
				'key'=>$pass, //$this->generar_crear();
				'label'=>$wallet->label
			];
			return $data;
		}catch (\Blockchain\Exception\ApiError $e) {
		    echo $e->getMessage() . '<br />Error al crear Billertera Nueva';
		}
	}
	//Valida 
	public function credenciales($guid,$pass,$seg_pass=null){		
		$this->iniciarConexionAPI();
		$this->Blockchain->Wallet->credentials($guid,$pass,$seg_pass);		
	}

	//transferir: retorna los parametros 'message', 'tx_hash' y 'notice' si se realiza la transferencia o un 'string' con el tipo de error 
	public function transferir($guid,$pass,$to_address, $amount,$fee=null){
		$this->credenciales($guid,$pass);
		//$fee=$this->fee;
		try {
		    $res=$this->Blockchain->Wallet->send($to_address,$amount,null,$fee);
		    $data=[
		    	'message'=>$res->message,
		    	'tx_hash'=>$res->tx_hash,
		    	'notice'=>$res->notice
		    ];

		    return $data;

		} catch (\Blockchain\Exception\ApiError $e) {
		    $err=$e->getMessage();

		    if ($err=='Error signing and pushing transaction') {
		    	return "2";		    	
		    }
		    if ($err=='Unexpected error, please try again') {
		    	return "3";
		    }
		    if (($err!="Error signing and pushing transaction") && ($err!="Unexpected error, please try again")) {
		    	return "4";
		    }
		    
		}
	}
	//balance: retorna un 'string' con el valor del balance del Wallet
	public function balance($guid,$key){
		$this->credenciales($guid,$key);
		return $this->Blockchain->Wallet->getBalance();
	}
	/*
	public function listarDirecciones($guid,$pass,$seg_pass=null){
		$this->credenciales($guid,$pass,$seg_pass);
		$addresses = $this->Blockchain->Wallet->getAddresses();
		$accounts = $this->Blockchain->Wallet->getAccounts();

		echo "<h3>Mis direcciones</h3>";

		$tot_accounts=count($accounts);
		for ($i=0; $i <$tot_accounts ; $i++) {
			foreach ($accounts[$i] as $key => $value) {
				echo $key.": ".$value;
				echo "<br>";		
			}
			echo "------------------------<br>";	
		}
	}
	*/
	
	public function mensaje(){
		return "Estoy en la libreria!";
	}
}

?>