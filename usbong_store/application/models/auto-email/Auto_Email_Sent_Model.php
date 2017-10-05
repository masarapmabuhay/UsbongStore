<?php 

class Auto_Email_Sent_Model extends CI_Model
{
    /*
     * deletes rows that match auto_email_schedule_id
    */
    public function deleteRowsByAutoEmailScheduleId($auto_email_schedule_id) {
        $this->db->delete('auto_email_sent', array('auto_email_schedule_id' => $auto_email_schedule_id));
    }

    /*
     * updates datetime, status, and error
    */
    public function updateRow($auto_email_sent_id, $status, $error) {
        $data = array(
            'datetime' => date('Y-m-d H:i:s'),
            'status'   => $status,
            'error'    => $error,
        );
        $this->db->where('auto_email_sent_id', $auto_email_sent_id);
        $this->db->update('auto_email_sent', $data);
    }

    /*
     * create new row
     * $data = [
     *     'auto_email_schedule_id' => 1
     *     'customer_id'            => 1
     *     'status'                 => SENT/ERROR
     *     'error'                  => NULL
     * ]
    */
    public function insertRow($data) {
        $data['datetime'] = date('Y-m-d H:i:s');
        $this->db->insert('auto_email_sent', $data);
    }

}
?>