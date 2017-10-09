<?php 

class Auto_Email_Model extends CI_Model
{
    //------------------------//
    // Get
    //------------------------//

    public function get($auto_email_id) {
        $this->db->from('auto_email');
        $this->db->join('auto_email_template', 'auto_email.auto_email_template_id = auto_email_template.auto_email_template_id', 'left');
        $this->db->where('auto_email_id', $auto_email_id);
        return $this->db->get()->row();
    }

}
?>