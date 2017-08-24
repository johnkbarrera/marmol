<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help_model extends CI_Model {

  public function _construct()
  {
    parent::construct();
  }

  public function unique1_email($usermail)
 	{
    $this->db->where('emailUsers', $usermail);
    $resp = $this->db->get('Users')->row();
    return $resp->emailUsers;;
 	}

  public function unique_email($usermail)
 	{
    $this->db->where('emailUsers', $usermail);
    $q = $this->db->get('Users');
    if ($q->num_rows()>0) {
      return true;
    }else {
      return false;
    }
 	}
  
  public function codigo_confirmacion($usermail)
 	{
    $this->db->where('emailUsers', $usermail);
    $resp = $this->db->get('Users')->row();
    return $resp->auxUsers;;
 	}

  public function state_account($usermail)
 	{
    $this->db->where('emailUsers', $usermail);
    $resp = $this->db->get('Users')->row();
    $r = $resp->stateUsers;
    return $r;
 	}
}
