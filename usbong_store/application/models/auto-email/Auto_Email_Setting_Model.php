<?php 

class Auto_Email_Setting_Model extends CI_Model
{
    /*
     * looks up row with attribute = $attribute
     * returns value for max_send
    */
    public function get($attribute) {
        $this->db->select('value');
        $this->db->from('auto_email_setting');
        $this->db->where('attribute', $attribute);
        $data = $this->db->get()->row();
        return $data->value;
    }
}
?>