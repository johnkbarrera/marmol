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
      'fnameUsers' => $nombres,
      'lnameUsers' => $apellidos,
      'emailUsers' => $email,
      'nickUsers' => $nombres,
      'passUsers' => $pass,
      'stateUsers' => "VALIDADO",
      'dateUsers' => date("Y-m-d H:i:s"),
      'Prolifes_idProlifes' => 1
     );
    return $this->db->insert("Users",$data);
 	}

  

}
