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
	
	public function doesEmailAccountExist($param) 
	{
		$this->db->select('customer_email_address');
		$this->db->where('customer_email_address',$param['emailAddressParam']);
		$query = $this->db->get('customer');
		$row = $query->row();
		return $row;
	}
	 
	public function loginAccount($param)
	{		
		$this->db->select('customer_password, customer_first_name, customer_email_address, customer_id'); //edited by Mike, 20170626
		$this->db->where('customer_email_address',$param['emailAddressParam']);
		$query = $this->db->get('customer');
		$row = $query->row();
		
		if ($row!==null) {
			if (password_verify($param['passwordParam'], 
					$row->customer_password)) {
				return $row;//->customer_first_name;//"true";
			}
		}
		return null;//"false";
	}	

	public function getCustomerInformation($customerId) {
		$this->db->select('customer_email_address, customer_first_name, customer_last_name, customer_contact_number, customer_shipping_address, customer_city, customer_country, customer_postal_code, mode_of_payment_id');
		$this->db->where('customer_id', $customerId);		
		$query = $this->db->get('customer');
		$row = $query->row();
		return $row;
	}
	
	
	public function updateAccount($customerId, $data) {				
		//step 1: change the quantity of all cart rows with the same productId and customerId to 0
		$updateData = array(
				'customer_email_address' => $data['emailAddressParam'],
				'customer_first_name' => $data['firstNameParam'],
				'customer_last_name' => $data['lastNameParam'],
				'customer_contact_number' => $data['contactNumberParam'],
				'customer_shipping_address' => $data['shippingAddressParam'],
				'customer_city' => $data['cityParam'],
				'customer_country' => $data['countryParam'],
				'customer_postal_code' => $data['postalCodeParam'],				
				'mode_of_payment_id' => $data['modeOfPaymentParam']				
		);
		$this->db->where('customer_id', $customerId);
		$this->db->update('customer', $updateData);		
	}
	
	public function getCustomerOrders($customerId) {
		$this->db->select('added_datetime_stamp, quantity, status_accepted, order_total_price');
		$this->db->where('customer_id', $customerId);
		$this->db->where('status_accepted', 1);
		$this->db->order_by('added_datetime_stamp', 'DESC');
		$query = $this->db->get('customer_order');
		return $query->result_array();
	}
	
	public function getCustomerEmailAddress($customerId) {
		$this->db->select('customer_email_address');
		$this->db->where('customer_id', $customerId);
		$query = $this->db->get('customer');
		return $query->row();
	}
}
?>