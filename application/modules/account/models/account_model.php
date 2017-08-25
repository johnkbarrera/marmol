<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {
	
	public function transferencia($data,$address,$monto,$fee){
		$data['address']=$address;
		$data['amount']=$monto;
		$data['fee']=$fee;
		$data['date']=date("Y-m-d H:i:s");
		$this->db->insert("Transactions",$data);
    }

    public function credenciales($email){
	    $this->db->select('guid, key');
	    $this->db->from('WBlockchain');
	    $this->db->where('email',$email);

	    return $this->db->get();
	}
   
	public function editUser($nombres,$apellidos,$email,$pass){
	  	$data = array(
	      'nombresUsers' => $nombres,
	      'apellidosUsers' => $apellidos,
	      'emailUsers' => $email,
	      'nickUsers' => $nombres,
	      'passUsers' => $pass,
	      'estadoUsers' => "VALIDADO",
	      'dateUsers' => date("Y-m-d H:i:s"),
	      'Prolifes_idProlifes' => 1
	     );

	  	return $this->db->insert("Users",$data);
	}
}
