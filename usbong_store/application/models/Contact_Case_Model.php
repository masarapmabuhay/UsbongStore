<?php 
class Contact_Case_Model extends CI_Model
{
	public function insertContactCase($param, $customerId)
	{				
		//added by Mike, 20180123; reference: views/auto-email/queue.php
		// carry over from last erroneous submission
		$default_datetime          = set_value('datetime');
		// if none exists, use defaults
		$default_datetime          = $default_datetime          != '' ? $default_datetime          : date('Y-m-d H:i:s');
				
		$data = array(
				'customer_id' => $customerId,
				'contact_case_first_name' => $param['firstNameParam'],
				'contact_case_last_name' => $param['lastNameParam'],
				'contact_case_type_id' => $param['contactCaseTypeParam'],
				'contact_case_email_address' => $param['emailAddressParam'],
				'subject' => $param['subjectParam'],
				'description' => $param['descriptionParam'],		
				'added_datetime_stamp' => $default_datetime
		);
		
		$this->db->insert('contact_case', $data);
		
		return $this->db->insert_id(); //customer_request_id
	}
}
?>