<?php 
class Account_Model extends CI_Model
{
	public function registerAccount($param)
	{		
		$data = array(
				'customer_first_name' => $param['firstNameParam'],
				'customer_last_name' => $param['lastNameParam'],
				'customer_email_address' => $param['emailAddressParam'],
				'customer_password' => password_hash($param['passwordParam'], PASSWORD_DEFAULT)
		);
				
		$this->db->insert('customer', $data);
	}
	
	public function loginAccount($param)
	{
		$data = array(
				'customer_first_name' => $param['firstNameParam'],
				'customer_last_name' => $param['lastNameParam'],
				'customer_email_address' => password_hash($param['emailAddressParam'], PASSWORD_DEFAULT),
				'customer_password' => $param['passwordParam']
		);
		
		$this->db->insert('customer', $data);
	}	
}
?>