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
            '        auto_email_schedule.status = "ACTIVE" '.
            ') AS batches_active, '.
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

        // access template data
        $this->db->from('auto_email_template');
        $this->db->where('auto_email_template_id', $auto_email_model['auto_email_template_id']);
        $auto_email_template_model = $this->db->get()->row_array();

        // temporarily store image files if any
        $images = array();
        for ($i=1; $i<=5; $i++) {
            $data_key      = 'data_0'.$i;
            $data_type_key = 'data_0'.$i.'_type';
            if ($auto_email_template_model[$data_type_key] == 'image') {
                // move image data from $auto_email_model to $images
                $images[$data_key]           = $auto_email_model[$data_key];
                $auto_email_model[$data_key] = NULL;
            }
        }

        // start manual transaction
        $this->db->trans_begin();
        for ($c = 0; $c <= 3; $c++) {
            switch ($c) {
                // insert data to table auto_email
                case 0:
                    $auto_email_model['datetime'] = date('Y-m-d H:i:s');
                    $this->db->insert('auto_email', $auto_email_model);
                    if ($this->db->affected_rows() < 1) {
                        $sql_error_obj   = $this->db->error();
                        $output['error'] = $sql_error_obj['message'];
                        break(2);
                    } else {
                        // record new id for use in next steps
                        $output['auto_email_id'] = $this->db->insert_id();
                    }
                break;
                // save image data if any
                case 1:
                    if (count($images) > 0) {
                        foreach ($images as $temp_image_key => $temp_image) {
                            // init temp fields
                            $temp_image_data     = NULL;
                            $temp_image_file     = NULL;
                            $temp_image_filename = NULL;
                            $temp_image_fileloc  = NULL;
                            // check image format
                            $temp_image_data = explode(',', $temp_image);
                            if ($temp_image_data[0] != 'data:image/jpeg;base64') {
                                $output['error'] = $auto_email_template_model[$temp_image_key.'_attribute'].' is not valid.';
                                break(3);
                            }
                            // decode image data
                            $temp_image_file = base64_decode($temp_image_data[1]);
                            if (!$temp_image_file) {
                                $output['error'] = $auto_email_template_model[$temp_image_key.'_attribute'].' could not be decoded.';
                                break(3);
                            }
                            // save image
                            $temp_image_filename = 'auto-email/uploads/'.$output['auto_email_id'].'_'.$temp_image_key.'.jpg';
                            $temp_image_fileloc  = FCPATH.'assets/images/'.$temp_image_filename;
                            if (
                                file_put_contents($temp_image_fileloc, $temp_image_file) === FALSE
                            ) {
                                $output['error'] = 'Please check directory permission. Unable to save to '.$temp_image_fileloc.'.';
                                break(3);
                            }
                            // update database entry
                            $this->db->where('auto_email_id', $output['auto_email_id']);
                            $this->db->update('auto_email', [$temp_image_key => $temp_image_filename]);
                            if ($this->db->affected_rows() < 1) {
                                $sql_error_obj   = $this->db->error();
                                $output['error'] = $sql_error_obj['message'];
                                break(3);
                            }
                        }
                    }
                break;
                // insert data to table auto_email_product (if any)
                case 2:
                    if (count($product_ids) > 0) {
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
                                break(3);
                            }
                        }
                    }
                break;
                // indicate that all operations passed
                case 3:
                    $output['success'] = TRUE;
                break;
                default:
                    // do nothing
            }
        }

        // roll back as needed
        if ($output['success'] == FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }

        // return output
        return $output;
    }

    // updates old email - interface same as createNewEmail()
    // returns the following:
    // [
    //     'success'       => bool,
    //     'error'         => XXX,
    //     'auto_email_id' => 1
    // ]
    public function updateEmail($auto_email_id, $auto_email_model, $product_ids) {
        // init output
        $output = [
            'success'       => FALSE,
            'error'         => '',
            'auto_email_id' => ''
        ];

        // access template data
        $this->db->from('auto_email_template');
        $this->db->where('auto_email_template_id', $auto_email_model['auto_email_template_id']);
        $auto_email_template_model = $this->db->get()->row_array();

        // temporarily store image files if any
        $images = array();
        for ($i=1; $i<=5; $i++) {
            $data_key      = 'data_0'.$i;
            $data_type_key = 'data_0'.$i.'_type';
            if ($auto_email_template_model[$data_type_key] == 'image') {
                // move image data from $auto_email_model to $images
                $images[$data_key]           = $auto_email_model[$data_key];
                $auto_email_model[$data_key] = NULL;
            }
        }

        // start manual transaction
        $this->db->trans_begin();
        for ($c = 0; $c <= 4; $c++) {
            switch ($c) {
                // update data from auto_email table
                case 0:
                    // pad data
                    unset($auto_email_model['auto_email_id']);
                    $auto_email_model['datetime'] = date('Y-m-d H:i:s');

                    // update data
                    $this->db->where('auto_email_id', $auto_email_id);
                    $this->db->update('auto_email', $auto_email_model);
                    if ($this->db->affected_rows() < 1) {
                        $sql_error_obj   = $this->db->error();
                        $output['error'] = $sql_error_obj['message'];
                        break(2);
                    } else {
                        // update output field
                        $output['auto_email_id'] = $auto_email_id;
                    }
                break;
                // save image data if any
                case 1:
                    if (count($images) > 0) {
                        foreach ($images as $temp_image_key => $temp_image) {
                            // init temp fields
                            $temp_image_data     = NULL;
                            $temp_image_file     = NULL;
                            $temp_image_filename = NULL;
                            $temp_image_fileloc  = NULL;
                            // check image format
                            $temp_image_data = explode(',', $temp_image);
                            if ($temp_image_data[0] != 'data:image/jpeg;base64') {
                                $output['error'] = $auto_email_template_model[$temp_image_key.'_attribute'].' is not valid.';
                                break(3);
                            }
                            // decode image data
                            $temp_image_file = base64_decode($temp_image_data[1]);
                            if (!$temp_image_file) {
                                $output['error'] = $auto_email_template_model[$temp_image_key.'_attribute'].' could not be decoded.';
                                break(3);
                            }
                            // overwrite old image
                            $temp_image_filename = 'auto-email/uploads/'.$output['auto_email_id'].'_'.$temp_image_key.'.jpg';
                            $temp_image_fileloc  = FCPATH.'assets/images/'.$temp_image_filename;
                            if (
                                file_put_contents($temp_image_fileloc, $temp_image_file) === FALSE
                            ) {
                                $output['error'] = 'Please check directory permission. Unable to save to '.$temp_image_fileloc.'.';
                                break(3);
                            }
                            // update database entry
                            $this->db->where('auto_email_id', $output['auto_email_id']);
                            $this->db->update('auto_email', [$temp_image_key => $temp_image_filename]);
                            $sql_error_obj = $this->db->error();
                            if ($sql_error_obj['message']) {
                                $output['error'] = $sql_error_obj['message'];
                                break(3);
                            }
                        }
                    }
                break;
                // remove old data from table auto_email_product
                case 2:
                    $this->db->delete('auto_email_product', array('auto_email_id' => $output['auto_email_id']));
                    $sql_error_obj = $this->db->error();
                    if ($sql_error_obj['message']) {
                        $output['error'] = $sql_error_obj['message'];
                        break(2);
                    }
                break;
                // insert data to table auto_email_product (if any)
                case 3:
                    if (count($product_ids) > 0) {
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
                                break(3);
                            }
                        }
                    }
                break;
                // indicate that all operations passed
                case 4:
                    $output['success'] = TRUE;
                break;
                default:
                    // do nothing
            }
        }

        // roll back as needed
        if ($output['success'] == FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }

        // return output
        return $output;
    }

    // update email
    // input $data
    //    [
    //        'subject'                => XXX,
    //        'auto_email_template_id' => 1,
    //        'data_01'                => XXX,
    //        'data_02'                => XXX,
    //        'data_03'                => XXX,
    //        'data_04'                => XXX,
    //        'data_05'                => XXX,
    //    ]
    public function updateRow($auto_email_id, $data) {
        // pad data
        $data['datetime'] = date('Y-m-d H:i:s');
        $this->db->where('auto_email_id', $auto_email_id);
        $this->db->update('auto_email', $data);
    }

}
?>