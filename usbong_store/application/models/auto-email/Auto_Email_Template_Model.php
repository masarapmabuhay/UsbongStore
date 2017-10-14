<?php 

class Auto_Email_Template_Model extends CI_Model
{
    //------------------------//
    // Constants
    //------------------------//

    const LIMIT  = 30;

    //------------------------//
    // Get
    //------------------------//

    public function get($auto_email_template_id) {
        $this->db->from('auto_email_template');
        $this->db->where('auto_email_template_id', $auto_email_template_id);
        return $this->db->get()->row_array();
    }

    /*
        returns a page worth of data
        [
            0           => [
                'auto_email_template_id' => 2, // most recent first
                'view'                   => "email_frame_simple_template",
                'description'            => "This template is mobile ready. It addresses recipients by first name. It has a configurable welcome message. It houses nine products.",
                'image'                  => email_frame_simple_template.jpg,
                'product_capacity'       => 9,
            ],
        ]
    */
    public function getPage($page) {
        // translate $page to offset
        if (
            is_numeric($page) AND
            $page > 1
        ) {
            $offset = self::LIMIT * ($page - 1);
        } else {
            $offset = 0;
        }

        $this->db->from('auto_email_template');
        $this->db->limit(self::LIMIT, $offset);
        $this->db->order_by('auto_email_template_id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getMaxPage() {
        return ceil(
            $this->db->count_all_results('auto_email_template') / self::LIMIT
        );
    }
}
?>