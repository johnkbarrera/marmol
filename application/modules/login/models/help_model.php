<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help_model extends CI_Model {

  public function _construct()
  {
    parent::construct();
  }

  public function state_account($usermail)
 	{
    $this->db->where('emailUsers', $usermail);
    $resp = $this->db->get('Users')->row();
    $r = $resp->stateUsers;
    return $r;
 	}

}
