<?php 

class Auto_Email_Model extends CI_Model
{
    //------------------------//
    // Get
    //------------------------//

    public function get($auto_email_id) {
        $this->db->from('auto_email');
        $this->db->where('auto_email_id', $auto_email_id);
        return $this->db->get()->row();
    }

}
?>