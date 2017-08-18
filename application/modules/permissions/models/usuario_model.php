<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

  public function _construct()
  {
    parent::construct();
  }

  public function login($usermail,$password)
 	{
    /*nos devuelve algo?*/
    $this->db->where('emailUsers', $usermail);
    $this->db->where('passUsers', $password);
    //return $this->db->get('Users');
    $q = $this->db->get('Users');
    if ($q->num_rows()>0) {
      return true;
    }else {
      return false;
    }
 	}
}
