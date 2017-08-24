<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help_model extends CI_Model {

  public function _construct()
  {
    parent::construct();
  }

  public function sendMailGmail($data){
   //cargamos la libreria email de ci
   $this->load->library("email");

   //configuracion para gmail
   $configGmail = array(
   'protocol' => 'smtp',
   'smtp_host' => 'ssl://smtp.gmail.com',
   'smtp_port' => 465,
   'smtp_user' => 'jk.barrerac@up.edu.pe',
   'smtp_pass' => 'enlauniversidadxd',
   'mailtype' => 'html',
   'charset' => 'utf-8',
   'newline' => "\r\n"
   );

   //cargamos la configuración para enviar con gmail
   $this->email->initialize($configGmail);

   $this->email->from('Marmol.com');
   $this->email->to($data['email']);
	 $this->email->subject($data['subject']);
	 $this->email->message($data['message']);

	 if ($this->email->send()) {
		 return 1;																																	//	SOLO ENTRA SI SE ENVIO EL CORREO por ahora no fiunciona en el servidor se dice que si
	 }else {
		 echo $this->email->print_debugger();
		 return 0;
	 }
 }

  public function unique1_email($usermail){
    $this->db->where('emailUsers', $usermail);
    $resp = $this->db->get('Users')->row();
    return $resp->emailUsers;;
 	}

  public function unique_email($usermail){
    $this->db->where('emailUsers', $usermail);
    $q = $this->db->get('Users');
    if ($q->num_rows()>0) {
      return true;
    }else {
      return false;
    }
 	}

  public function codigo_confirmacion($usermail){
    $this->db->where('emailUsers', $usermail);
    $resp = $this->db->get('Users')->row();
    return $resp->auxUsers;;
 	}

  public function state_account($usermail){
    $this->db->where('emailUsers', $usermail);
    $resp = $this->db->get('Users')->row();
    $r = $resp->stateUsers;
    return $r;
 	}
}
