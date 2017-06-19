<?php 
class Account_Model extends CI_Model
{
	public function registerAccount($param)
	{		
		$data = array(
				'customer_first_name' => $param['firstNameParam'],
				'customer_last_name' => $param['lastNameParam'],
				'customer_email_address' => $param['emailAddressParam'],
				'customer_password' => $param['passwordParam']
		);
		
		$this->db->insert('customer', $data);
	}
}
?>