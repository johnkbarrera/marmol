<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('vendor/autoload.php');

class WBTC
{
	private $api_code; // *
	private $Blockchain; // *		
	private $fee;
	private $servicio;
	
	function __construct(){
		$this->api_code = "abdb42b4-6744-4897-8176-26316b4bd838";
		$this->servicio = "http://localhost:3000";
		$this->seg_pass = null;
		$this->fee = 0.0003;				
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

	public function crear($pass, $email=null){				
		$this->iniciarConexionAPI();
		try{
			$wallet=$this->Blockchain->Create->create($pass,$email,$label);
			$data=[
				'guid'=>$wallet->guid,
				'address'=>$wallet->address,
				'key'=>'XapoBitinka2017', //$this->generar_key();
				'label'=>$wallet->label
			];
			return $data;
		}catch (\Blockchain\Exception\ApiError $e) {
		    echo $e->getMessage() . '<br />Error al crear Billertera Nueva';
		}
	}

	public function credenciales($guid,$pass,$seg_pass=null){		
		$this->iniciarConexionAPI();
		$this->Blockchain->Wallet->credentials($guid,$pass,$seg_pass);		
	}

	public function transferir($guid,$pass,$to_address, $amount, $from_address,$fee=null){
		$this->credenciales($guid,$pass);
		$fee=$this->fee;
		try {
		    $rpta=$this->Blockchain->Wallet->send($to_address,$amount,$from_address,$fee);
		    return $rpta;
		} catch (\Blockchain\Exception\ApiError $e) {
		    echo $e->getMessage() . '<br /> Transferencia <br/>';
		}
	}

	//Balance de la billetera
	public function balance($guid,$pass){
		$this->credenciales($guid,$pass);
		return $Blockchain->Wallet->getBalance();
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

	/*
	public function getGUID(){
		return $this->guid;
	}		
	public function getAddress(){
		return $this->address;
	}
	public function getLabel(){
		return $this->label;
	}
	*/

	public function mensaje(){
		return "Estoy en la libreria!";
	}
}

?>