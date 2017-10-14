<?php 

class Auto_Email_Model extends CI_Model
{
    //------------------------//
    // Constants
    //------------------------//

    const LIMIT  = 30;

    //------------------------//
    // Get
    //------------------------//

    public function get($auto_email_id) {
        $this->db->from('auto_email');
        $this->db->join('auto_email_template', 'auto_email.auto_email_template_id = auto_email_template.auto_email_template_id', 'left');
        $this->db->where('auto_email_id', $auto_email_id);
        return $this->db->get()->row();
    }

    /*
        returns a page worth of data
        [
            0           => [
                'auto_email_id' => 4,                            // most recent first
                'subject'       => 'test subject 4',
                'view'          => 'email_frame_simple_template',
                'datetime'      => '2017-10-01 00:00:00 ',
                'batches'       => 1,
                'batches_sent'  => 1,
                'batches_paused'=> 0,
                'batches_error' => 0,
            ],
            .
            .
            .
            (LIMIT - 1) => [
                'auto_email_id' => 1,                            // oldest last
                'subject'       => 'test subject 1',
                'view'          => 'email_frame_simple_template',
                'datetime'      => '2017-10-01 00:00:00 ',
                'batches'       => 1,
                'batches_sent'  => 1,
                'batches_paused'=> 0,
                'batches_error' => 0,
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

        $this->db->select(
            // auto_email
            'auto_email.auto_email_id, auto_email.subject, auto_email.datetime, '.
            // auto_email_template
            'auto_email_template.view, '.
            // custom
            '( '.
            '    SELECT COUNT(*) '.
            '    FROM auto_email_schedule '.
            '    WHERE '.
            '        auto_email.auto_email_id = auto_email_schedule.auto_email_id '.
            ') AS batches, '.
            '( '.
            '    SELECT COUNT(*) '.
            '    FROM auto_email_schedule '.
            '    WHERE '.
            '        auto_email.auto_email_id   = auto_email_schedule.auto_email_id AND '.
            '        auto_email_schedule.status = "DONE" '.
            ') AS batches_sent, '.
            '( '.
            '    SELECT COUNT(*) '.
            '    FROM auto_email_schedule '.
            '    WHERE '.
            '        auto_email.auto_email_id   = auto_email_schedule.auto_email_id AND '.
            '        auto_email_schedule.status = "PAUSED" '.
            ') AS batches_paused, '.
            '( '.
            '    SELECT COUNT(*) '.
            '    FROM auto_email_schedule '.
            '    WHERE '.
            '        auto_email.auto_email_id   = auto_email_schedule.auto_email_id AND '.
            '        auto_email_schedule.status = "ERROR" '.
            ') AS batches_error '
        );
        $this->db->from('auto_email');
        $this->db->join('auto_email_template', 'auto_email.auto_email_template_id = auto_email_template.auto_email_template_id', 'left');
        $this->db->limit(self::LIMIT, $offset);
        $this->db->order_by('auto_email_id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getMaxPage() {
        return ceil(
            $this->db->count_all_results('auto_email') / self::LIMIT
        );
    }

    //------------------------//
    // Set
    //------------------------//

    // creates a new email
    // (1) input $auto_email_model
    //    [
    //        'subject'                => XXX,
    //        'auto_email_template_id' => 1,
    //        'data_01'                => XXX,
    //        'data_02'                => XXX,
    //        'data_03'                => XXX,
    //        'data_04'                => XXX,
    //        'data_05'                => XXX,
    //    ]
    // (2) input $product_ids
    //    [
    //        1, 2, 3, 4, 5
    //    ]
    // returns the following:
    // [
    //     'success'       => bool,
    //     'error'         => XXX,
    //     'auto_email_id' => 1
    // ]
    public function createNewEmail($auto_email_model, $product_ids) {
        // init output
        $output = [
            'success'       => FALSE,
            'error'         => '',
            'auto_email_id' => ''
        ];

        // start transaction
        $this->db->trans_start();

        // insert data to table auto_email
        $auto_email_model['datetime'] = date('Y-m-d H:i:s');
        $this->db->insert('auto_email', $auto_email_model);
        if ($this->db->affected_rows() < 1) {
            $sql_error_obj   = $this->db->error();
            $output['error'] = $sql_error_obj['message'];
        } else {
            // insert data to table auto_email_product
            $output['auto_email_id'] = $this->db->insert_id();
            foreach ($product_ids as $product_id) {
                $this->db->insert(
                    'auto_email_product',
                    [
                        'auto_email_id' => $output['auto_email_id'],
                        'product_id'    => $product_id
                    ]
                );
                if ($this->db->affected_rows() < 1) {
                    $sql_error_obj   = $this->db->error();
                    $output['error'] = $sql_error_obj['message'];
                    break;
                }
            }
        }

        // close transaction
        $this->db->trans_complete();

        // init output
        $output['success'] = $this->db->trans_status();

        return $output;
    }
}
?>
