<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {


  public function getRecords()
  {
        $query = $this->db->get("Users");
        return $query->result();
  }

  public function saveRecord($nombres,$apellidos,$email,$pass)
 	{
    $data = array(
      'nombresUsers' => $nombres,
      'apellidosUsers' => $apellidos,
      'emailUsers' => $email,
      'tagUsers' => $nombres,
      'passUsers' => $pass,
      'estadoUsers' => "VALIDADO",
      'dateUsers' => date("Y-m-d H:i:s")
     );
    return $this->db->insert("Users",$data);
 	}
}
