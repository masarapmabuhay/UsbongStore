<?php 
class Account_Model extends CI_Model
{
	public function registerAccount($param)
	{		
		$data = array(
				'customer_first_name' => $param['firstName-param'],
				'customer_last_name' => $param['lastName-param'],
				'customer_email_address' => $param['emailAddress-param'],
				'customer_password' => $param['Password-param']
		);
		
		$this->db->insert('customer', $data);
	}
}
?>