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
	
	public function getContactCasesAdmin() {
		$this->db->select('t1.added_datetime_stamp, t1.contact_case_id, t1.customer_id, t1.contact_case_email_address, t1.subject, t1.description, t1.contact_case_type_id, t1.status, t2.contact_case_type_name_shortened');
		$this->db->from('contact_case as t1');
		$this->db->join('contact_case_type as t2', 't1.contact_case_type_id = t2.contact_case_type_id', 'LEFT');		
//		$this->db->where('t1.status', 0);
		$this->db->order_by('t1.added_datetime_stamp', 'DESC');		
		$query = $this->db->get();
		
		return $query->result_array();		
	}
	
	public function getContactCaseDetailsAdmin($contactCaseId) {
		//update: status
		$updateData = array(
				'status' => 1				
		);
		$this->db->where('contact_case_id', $contactCaseId);
		$this->db->update('contact_case', $updateData);		

				
		$this->db->select('t1.added_datetime_stamp, t1.contact_case_id, t1.customer_id, t1.contact_case_email_address, t1.subject, t1.description, t1.contact_case_type_id, t1.status, t2.contact_case_type_name_shortened');
		$this->db->from('contact_case as t1');
		$this->db->join('contact_case_type as t2', 't1.contact_case_type_id = t2.contact_case_type_id', 'LEFT');
		$this->db->where('t1.contact_case_id', $contactCaseId);
		$query = $this->db->get();

		return $query->row();
	}
}
?>