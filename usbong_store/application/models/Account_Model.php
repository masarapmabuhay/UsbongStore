<?php 
class Account_Model extends CI_Model
{
	public function registerAccount($param)
	{		
		//added by Mike, 20171114
		date_default_timezone_set('Asia/Hong_Kong');
		$loggedInDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');
				
		$data = array(
				'customer_first_name' => $param['firstNameParam'],
				'customer_last_name' => $param['lastNameParam'],
				'customer_email_address' => $param['emailAddressParam'],
				'customer_password' => password_hash($param['passwordParam'], PASSWORD_DEFAULT),
				'last_logged_in_datetime_stamp' => $loggedInDateTimeStamp								
		);
				
		$this->db->insert('customer', $data);
		
		return $this->db->insert_id(); //customer_id
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

				//--------------------------------------------------------------						
				//added by Mike, 20171114
				date_default_timezone_set('Asia/Hong_Kong');
				$loggedInDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');
						
				$updateData = array(
						'last_logged_in_datetime_stamp' => $loggedInDateTimeStamp
				);
				
				$this->db->where('customer_id', $row->customer_id);
				$this->db->update('customer', $updateData);		
				//--------------------------------------------------------------
				
				return $row;//->customer_first_name;//"true";
			}
		}
		return null;//"false";
	}	

	//added by Mike, 20171114
	public function logoutAccount($customerId)
	{
		//--------------------------------------------------------------
		//added by Mike, 20171114
		date_default_timezone_set('Asia/Hong_Kong');
		$loggedOutDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');
		
		$updateData = array(
				'last_logged_out_datetime_stamp' => $loggedOutDateTimeStamp
		);
		
		$this->db->where('customer_id', $customerId);
		$this->db->update('customer', $updateData);
		//--------------------------------------------------------------				
	}
	
	public function getCustomerInformation($customerId) {
		$this->db->select('customer_id, customer_email_address, customer_first_name, customer_last_name, customer_contact_number, customer_shipping_address, customer_city, customer_country, customer_postal_code, mode_of_payment_id, is_admin, merchant_id');
		$this->db->where('customer_id', $customerId);		
		$query = $this->db->get('customer');
		$row = $query->row();
		return $row;
	}

	public function getCustomerInformationByEmail($email) {
		$this->db->select('customer_id, customer_email_address, customer_first_name, customer_last_name, customer_contact_number, customer_shipping_address, customer_city, customer_country, customer_postal_code, mode_of_payment_id, is_admin, merchant_id');
		$this->db->where('customer_email_address', $email);
		$query = $this->db->get('customer');
		$row = $query->row();
		return $row;
	}
	
	public function getCustomerAddressFromCustomerOrder($customerOrderId) {
		$this->db->select('customer_shipping_address, customer_city, customer_country, customer_postal_code');
		$this->db->where('customer_order_id', $customerOrderId);
		$query = $this->db->get('customer_order');
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

	public function updateAccountPassword($customerId, $data) {
		//step 1: change the quantity of all cart rows with the same productId and customerId to 0
		$updateData = array(
				'customer_password' =>  password_hash($data['newPasswordParam'], PASSWORD_DEFAULT)
		);
		$this->db->where('customer_id', $customerId);
		$this->db->update('customer', $updateData);
	}
	
	public function isCurrentPasswordCorrect($param)
	{				
		$this->db->select('customer_password'); //edited by Mike, 20170626
		$this->db->where('customer_id',$param['customerId']);
		$query = $this->db->get('customer');
		$row = $query->row();
		
		if ($row!==null) {
			if (password_verify($param['currentPasswordParam'],
					$row->customer_password)) {
						return null;//$row;//"true";
			}
		}
		return new stdClass;//null;//"false";
	}
	
	public function getCustomerOrders($customerId) {
		$this->db->select('added_datetime_stamp, quantity, status_accepted, order_total_price, order_total_discount');
		$this->db->where('customer_id', $customerId);
		$this->db->where('status_accepted', 1);
		$this->db->order_by('added_datetime_stamp', 'DESC');
		$query = $this->db->get('customer_order');
		return $query->result_array();
	}
	
	public function getCustomerOrdersAdmin() {
		$this->db->select('added_datetime_stamp, customer_id, quantity, status_accepted, order_total_price, fulfilled_status, order_total_discount');
		$this->db->where('status_accepted', 1);
		$this->db->order_by('added_datetime_stamp', 'DESC');
		$query = $this->db->get('customer_order');
		return $query->result_array();
	}
	
	//added by Mike, 20171116
	public function getCustomerSummaryAdmin() {
		$this->db->select('t1.customer_id, t1.customer_email_address, t1.is_admin, t1.merchant_id, t1.last_logged_in_datetime_stamp, t1.last_logged_out_datetime_stamp, t2.merchant_name');
		$this->db->from('customer as t1');
		$this->db->join('merchant as t2', 't1.merchant_id = t2.merchant_id', 'LEFT');
		$this->db->order_by('t1.customer_id', 'DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	//edited by Mike, 20180624
	public function getCartHistoryAdmin() {
		$this->db->select('t1.added_datetime_stamp, t1.purchased_datetime_stamp, t1.product_id, t2.name, t2.author, t1.quantity, t1.price, t3.customer_email_address, t3.customer_id, t4.fulfilled_status');
		$this->db->from('cart as t1');
		$this->db->join('product as t2', 't1.product_id = t2.product_id', 'LEFT');
		$this->db->join('customer as t3', 't1.customer_id = t3.customer_id', 'LEFT');
		$this->db->join('customer_order as t4', 't1.purchased_datetime_stamp = t4.added_datetime_stamp', 'LEFT');		
		$this->db->order_by('t1.added_datetime_stamp', 'DESC');
		$query = $this->db->get();

		return $query->result_array();
	}

	//added by Mike, 20171105
	public function getSearchHistoryAdmin() {
		$this->db->select('t1.added_datetime_stamp, t1.searched_item, t2.customer_email_address, t2.customer_id');
		$this->db->from('search as t1');
		$this->db->join('customer as t2', 't1.customer_id = t2.customer_id', 'LEFT');
		$this->db->order_by('t1.added_datetime_stamp', 'DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
		
	//added by Mike, 20171010
	public function getCustomerCartHistoryAdmin($customerId) {
		$this->db->select('t1.added_datetime_stamp, t1.purchased_datetime_stamp, t1.product_id, t2.name, t2.author, t1.quantity, t1.price, t3.customer_email_address, t3.customer_id');
		$this->db->from('cart as t1');
		$this->db->join('product as t2', 't1.product_id = t2.product_id', 'LEFT');
		$this->db->join('customer as t3', 't1.customer_id = t3.customer_id', 'LEFT');
		$this->db->where('t3.customer_id', $customerId);		
		$this->db->order_by('t1.added_datetime_stamp', 'DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function getCustomerOrdersMerchant($merchantId) {
		$this->db->select('t1.purchased_datetime_stamp, t1.customer_id, t1.quantity, t3.price, t2.order_total_price, t1.fulfilled_status, t3.name');
		$this->db->from('cart as t1');
		$this->db->join('customer_order as t2', 't1.customer_order_id = t2.customer_order_id', 'LEFT');	
		$this->db->join('product as t3', 't1.product_id = t3.product_id', 'LEFT');
		$this->db->where('t3.merchant_id', $merchantId);	
		$this->db->where('t1.purchased_datetime_stamp !=', 0);		
		$this->db->order_by('t1.purchased_datetime_stamp', 'DESC');
		$query = $this->db->get();
		
//		return $query->row();		

		if ($query->num_rows() > 0) {
			return $query->result_array();			
		}
		return array();		
	}
		
	public function updateCustomerOrderAdmin($fulfilledStatus, $addedDatetimeStamp, $productCustomerId) {
		$updateData = array(
				'fulfilled_status' => $fulfilledStatus
		);
		$this->db->where('customer_id', $productCustomerId);
		$this->db->where('added_datetime_stamp', $addedDatetimeStamp);		
		$this->db->update('customer_order', $updateData);
	}
	
	public function updateCustomerOrderMerchant($fulfilledStatus, $purchasedDatetimeStamp, $productId) {
		$updateData = array(
				'fulfilled_status' => $fulfilledStatus
		);
		$this->db->where('product_id', $productId);
		$this->db->where('purchased_datetime_stamp', $purchasedDatetimeStamp);
		$this->db->update('cart', $updateData);
	}
	
	public function getCustomerEmailAddress($customerId) {
		$this->db->select('customer_email_address');
		$this->db->where('customer_id', $customerId);
		$query = $this->db->get('customer');
		return $query->row();
	}
	
	public function getCustomerName($customerId) {
		$this->db->select('customer_first_name, customer_last_name');
		$this->db->where('customer_id', $customerId);
		$query = $this->db->get('customer');
		return $query->row();
	}

	public function getCustomerMerchantName($merchantId) {
		$this->db->select('customer_first_name, customer_last_name');
		$this->db->where('merchant_id', $merchantId);
		$query = $this->db->get('customer');
		return $query->row();
	}
	
	public function getOrderDetails($customerId, $addedDateTimeStamp) {
		$this->db->select('t1.customer_order_id, t1.cart_id, t1.product_id, t1.quantity, t1.price, t3.name, t3.author, t3.product_type_id, t2.order_total_price, t2.order_total_discount');
		$this->db->from('cart as t1');
		$this->db->join('customer_order as t2', 't1.customer_order_id = t2.customer_order_id', 'LEFT');
		$this->db->join('product as t3', 't1.product_id = t3.product_id', 'LEFT');	
		$this->db->where('t1.customer_id', $customerId);
		$this->db->where('t2.added_datetime_stamp', $addedDateTimeStamp);		
		$this->db->where('t1.purchased_datetime_stamp', $addedDateTimeStamp);		
		$this->db->order_by('t1.added_datetime_stamp', 'DESC');	
		$query = $this->db->get();
		
		return $query->result_array();		
	}	
	
	public function getOrderDetailsAdmin($customerId, $addedDateTimeStamp) {
		$this->db->select('t1.customer_order_id, t1.cart_id, t1.product_id, t1.quantity, t1.price, t3.name, t3.author, t3.product_type_id, t2.order_total_price, t2.customer_id, t2.order_total_discount');
		$this->db->from('cart as t1');
		$this->db->join('customer_order as t2', 't1.customer_order_id = t2.customer_order_id', 'LEFT');
		$this->db->join('product as t3', 't1.product_id = t3.product_id', 'LEFT');
		$this->db->where('t1.customer_id', $customerId);
		$this->db->where('t2.added_datetime_stamp', $addedDateTimeStamp);
		$this->db->where('t1.purchased_datetime_stamp', $addedDateTimeStamp);
		$this->db->order_by('t1.added_datetime_stamp', 'DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function getOrderDetailsMerchant($merchantId, $purchasedDateTimeStamp) {
//		$this->db->select('t1.customer_order_id, t1.cart_id, t1.customer_id, t1.product_id, t1.quantity, t1.price, t3.name, t3.author, t3.product_type_id, t2.price');
		$this->db->select('t1.customer_order_id, t1.cart_id, t1.product_id, t1.quantity, t1.price, t1.purchased_datetime_stamp, t1.fulfilled_status, t3.name, t3.author, t3.product_type_id, t2.order_total_price, t2.customer_id, t2.order_total_discount');	
		$this->db->from('cart as t1');
		$this->db->join('customer_order as t2', 't1.customer_order_id = t2.customer_order_id', 'LEFT');	
		$this->db->join('product as t3', 't1.product_id = t3.product_id', 'LEFT');
		$this->db->where('t3.merchant_id', $merchantId);
		$this->db->where('t1.purchased_datetime_stamp', $purchasedDateTimeStamp);
		$this->db->order_by('t1.purchased_datetime_stamp', 'DESC');
		$query = $this->db->get();
		
		return $query->result_array();
//		return $query->row();		
	}
	
	public function getCustomerRequestAdmin() {
		$this->db->select('t1.customer_request_id, t1.added_datetime_stamp, t1.customer_id, t2.customer_email_address, t1.quantity, t1.product_name, t1.product_link, t1.product_type, t1.quantity, t1.request_total_budget, t1.comments, t1.fulfilled_status, t1.fulfilled_datetime_stamp');
		$this->db->from('customer_request as t1');
		$this->db->join('customer as t2', 't1.customer_id = t2.customer_id', 'LEFT');		
		$this->db->order_by('added_datetime_stamp', 'DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function updateCustomerRequestAdmin($fulfilledStatus, $customerRequestId) {		
		//edited by Mike, 20180609
		date_default_timezone_set('Asia/Hong_Kong');
		$fulfilledDateTimeStamp = (new DateTime())->format('Y-m-d H:i:s'); //date('Y-m-d H:i:s');
		
		$updateData = array(
				'fulfilled_status' => $fulfilledStatus,
				'fulfilled_datetime_stamp' => $fulfilledDateTimeStamp
		);

		$this->db->where('customer_request_id', $customerRequestId);
		$this->db->update('customer_request', $updateData);
	}	

	public function getCustomerSellAdmin() {
		$this->db->select('t1.customer_sell_id, t1.added_datetime_stamp, t1.customer_id, t2.customer_email_address, t1.quantity, t1.product_name, t1.product_image_link, t1.product_type, t1.quantity, t1.sell_total_cost, t1.comments, t1.fulfilled_status, t1.fulfilled_datetime_stamp');
		$this->db->from('customer_sell as t1');
		$this->db->join('customer as t2', 't1.customer_id = t2.customer_id', 'LEFT');
		$this->db->order_by('added_datetime_stamp', 'DESC');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function updateCustomerSellAdmin($fulfilledStatus, $customerSellId) {
		$updateData = array(
				'fulfilled_status' => $fulfilledStatus
		);
		$this->db->where('customer_sell_id', $customerSellId);
		$this->db->update('customer_sell', $updateData);
	}


}
?>