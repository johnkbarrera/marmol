<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

	//Envia datos a la bd
	public function transferencia($id,$res_transf,$to_address,$monto,$fee){
		$data = [
			'address'=>$to_address,
			'message'=>$res_transf['message'],
			'tx_hash'=>$res_transf['tx_hash'],
			'notice'=>$res_transf['notice'],
			'amount'=>$monto,
			'fee'=>$fee,
			'idWBlockchain'=>$id,
			'date'=>date("Y-m-d H:i:s")
		];		
		return $this->db->insert("Transactions",$data);
    }

    public function credenciales($email){    	
    	$this->db->select('idWBlockchain, guid, key');
	    $this->db->from('WBlockchain');
	    $this->db->where('email', $email );
	    $query = $this->db->get();

	    if ($query->num_rows() > 0){
	        $data = $query->row_array();
	        return $data;
	    }	 
	}

	public function getAddress($email){
		$this->db->select('address');
	    $this->db->from('WBlockchain');
	    $this->db->where('email',$email);
	    $query=$this->db->get();
	    
	    if($query->num_rows()>0){
	    	$res=$query->result();
	    	$data=array(
	    		'address'=> $res[0]->address
	    		);	    	
	    }
	    return $data;
	}
}
