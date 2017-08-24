<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {
	public function transferencias($id,$pass,$to_address,$amount,$fee){
	    //Se inserta informacion en la tabala HistorialTransacciones
	    //$this->credencialesWBTC()
    }

    public function credenciales($email){
	    $this->db->select('guid, llave');
	    $this->db->from('WBlockchain');
	    $this->db->where('Users_emailUsers',$email);

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
