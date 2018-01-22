<?php 
class Contact_Case_Model extends CI_Model
{
	public function insertContactCase($param, $customerId)
	{		
		$data = array(
				'customer_id' => $customerId,
				'contact_case_first_name' => $param['firstNameParam'],
				'contact_case_last_name' => $param['lastNameParam'],
				'contact_case_type_id' => $param['contactCaseTypeParam'],
				'contact_case_email_address' => $param['emailAddressParam'],
				'subject' => $param['subjectParam'],
				'description' => $param['descriptionParam']		
		);
		
		$this->db->insert('contact_case', $data);
		
		return $this->db->insert_id(); //customer_request_id
	}
}
?>