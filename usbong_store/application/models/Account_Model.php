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
		$this->db->select('customer_password');
		$this->db->where('customer_email_address',$param['emailAddressParam']);
		$query = $this->db->get('customer');
		
		if (password_verify($param['passwordParam'], $query->row()->customer_password)) {
			return "true";
		}
		return "false";
	}	
}
?>