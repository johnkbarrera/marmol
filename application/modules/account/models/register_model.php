<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {


  public function getRecords()
  {
        $query = $this->db->get("Users");
        return $query->result();
  }

  public function saveRecord($data)
 	{
    return $this->db->insert("Users",$data);
 	}
}
