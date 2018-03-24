<?php
class Merchant_Model extends CI_Model
{
    //------------------------//
    // Constants
    //------------------------//

    const LIMIT  = 30;

    //------------------------//
    // Get
    //------------------------//

    public function get($merchant_id) {
        $this->db->from('merchant');
        $this->db->where('merchant_id', $merchant_id);
        return $this->db->get()->row_array();
    }

    public function getAll() {
        $this->db->from('merchant');
        $this->db->order_by('merchant_name', 'ASC');
        return $this->db->get()->result_array();
    }

    // returns a page worth of data where recent entries are returned first
    // valid keys for filters: merchant_name, merchant_motto
    // valid keys for options: search (and, or)
    public function getPage($page, $filters = NULL, $options = NULL) {
        // translate $page to offset
        if (is_numeric($page) AND $page > 1) {
            $offset = self::LIMIT * ($page - 1);
        } else {
            $offset = 0;
        }

        // access database
        $this->db->select('*');
        $this->db->from('merchant');

        // add filters as needed
        if (isset($filters['merchant_name'])) {
            if (isset($options['search']) AND $options['search'] == 'and') {
                $this->db->like('merchant_name', $filters['merchant_name'], 'both');
            } else {
                $this->db->or_like('merchant_name', $filters['merchant_name'], 'both');
            }
        }
        if (isset($filters['merchant_motto'])) {
            if (isset($options['search']) AND $options['search'] == 'and') {
                $this->db->like('merchant_motto', $filters['merchant_motto'], 'both');
            } else {
                $this->db->or_like('merchant_motto', $filters['merchant_motto'], 'both');
            }
        }

        $this->db->limit(self::LIMIT, $offset);
        $this->db->order_by('merchant_id', 'ASC');
        return $this->db->get()->result_array();
    }

    // valid keys for filters: name, author
    // valid keys for options: search (and, or)
    public function getMaxPage($filters = NULL, $options = NULL) {
        // add filters as needed
        if (isset($filters['merchant_name'])) {
            if (isset($options['search']) AND $options['search'] == 'and') {
                $this->db->like('merchant_name', $filters['merchant_name'], 'both');
            } else {
                $this->db->or_like('merchant_name', $filters['merchant_name'], 'both');
            }
        }
        if (isset($filters['merchant_motto'])) {
            if (isset($options['search']) AND $options['search'] == 'and') {
                $this->db->like('merchant_motto', $filters['merchant_motto'], 'both');
            } else {
                $this->db->or_like('merchant_motto', $filters['merchant_motto'], 'both');
            }
        }

        return ceil(
            $this->db->count_all_results('merchant') / self::LIMIT
        );
    }

    //------------------------//
    // Set
    //------------------------//

    /*
     * creates a new row using the data below
     $data = [
            // required
            'merchant_name'             => XXX,
            'merchant_motto'            => XXX,
            'merchant_motto_font_color' => XXX,
            'image'                     => 'data:image/jpeg;base64,/9j...', // base 64 encoded jpeg
     ]
     * returns the ff:
       [
            'success'    => bool,
            'error'      => XXX,
            'merchant_id' => XXX
       ]
    */
    public function insertRow($data) {
        // init
        $this->load->helper('url');

        // prepare temp fields
        $temp = [
            'existing_merchant_model' => NULL,
            'image_data'              => NULL,
            'decoded_image'           => NULL,
            'image_file_name'         => NULL,
        ];

        // prepare output
        $output = [
            'success'     => FALSE,
            'error'       => 'An unexpected error occurred.',
            'merchant_id' => NULL,
        ];

        // process image data
        for ($i = 0; $i <= 3; $i++) {
            switch ($i) {
                case 0:
                    // check image format
                    $temp['image_data'] = explode(',', $data['image']);
                    if ($temp['image_data'][0] != 'data:image/jpeg;base64') {
                        $output['error'] = 'Image data is not valid.';
                        return $output;
                    }
                break;
                case 1:
                    // decode image data
                    $temp['decoded_image'] = base64_decode($temp['image_data'][1]);
                    if (!$temp['decoded_image']) {
                        $output['error'] = 'Image could not be decoded.';
                        return $output;
                    }
                break;
                case 2:
                    // save image
                    $temp['image_file_name'] = create_merchant_jpg_file_name($data['merchant_name']);
                    if (
                        file_put_contents($temp['image_file_name'], $temp['decoded_image']) === FALSE
                    ) {
                        $output['error'] = 'Please check directory permission. Unable to save to '.$temp['image_file_name'].'.';
                        return $output;
                    }
                break;
                case 3:
                    // clear unsued fields
                    unset($data['image']);

                    // insert row to database
                    $this->db->insert('merchant', $data);

                    if (!$this->db->affected_rows()) {
                        $output['error'] = 'Unable to save to database.';
                        return $output;
                    } else {
                        $output = [
                            'success'    => TRUE,
                            'error'      => NULL,
                            'product_id' => $this->db->insert_id(),
                        ];
                    }
                break;
                default:
                    // do nothing
            }
        }

        // return output
        return $output;
    }

    public function editRow($merchant_id, $data) {
        // init
        $this->load->helper('url');

        // prepare temp fields
        $temp = [
            'old_merchant_model'  => NULL,
            'same_merchant_model' => NULL,
            'old_image_file_name' => NULL,
            'image_data'          => NULL,
            'decoded_image'       => NULL,
            'image_file_name'     => NULL,
        ];

        // prepare output
        $output = [
            'success'    => FALSE,
            'error'      => 'An unexpected error occurred.',
            'product_id' => NULL,
        ];

        // process image data
        for ($i = 0; $i <= 6; $i++) {
            switch ($i) {
                case 0:
                    // check if merchant exists
                    $this->db->from('merchant');
                    $this->db->where('merchant_id', $merchant_id);
                    $temp['old_merchant_model'] = $this->db->get()->row_array();

                    if (!isset($temp['old_merchant_model']['merchant_id'])) {
                        $output['error'] = 'Merchant ID is invalid.';
                        return $output;
                    }
                break;
                case 1:
                    // check if similar merchant exists
                    $this->db->from('merchant');
                    $this->db->where('merchant_name', $data['merchant_name']);
                    $this->db->where_not_in('merchant_id', $merchant_id);
                    $temp['same_merchant_model'] = $this->db->get()->row_array();

                    if (isset($temp['same_merchant_model']['merchant_id'])) {
                        $output['error'] = $data['merchant_name'].' is already used.';
                        return $output;
                    }
                break;
                case 2:
                    // delete existing image
                    $temp['old_image_file_name'] = create_merchant_jpg_file_name($temp['old_merchant_model']['merchant_name']);
                    if (!unlink($temp['old_image_file_name'])) {
                        $output['error'] = 'Please check directory permission. Unable to delete old image: '.$temp['old_image_file_name'].'.';
                        return $output;
                    }
                break;
                case 3:
                    // check image format
                    $temp['image_data'] = explode(',', $data['image']);
                    if ($temp['image_data'][0] != 'data:image/jpeg;base64') {
                        $output['error'] = 'Image data is not valid.';
                        return $output;
                    }
                break;
                case 4:
                    // decode image data
                    $temp['decoded_image'] = base64_decode($temp['image_data'][1]);
                    if (!$temp['decoded_image']) {
                        $output['error'] = 'Image could not be decoded.';
                        return $output;
                    }
                break;
                case 5:
                    // save image
                    $temp['image_file_name'] = create_merchant_jpg_file_name($data['merchant_name']);
                    if (
                        file_put_contents($temp['image_file_name'], $temp['decoded_image']) === FALSE
                    ) {
                        $output['error'] = 'Please check directory permission. Unable to save to '.$temp['image_file_name'].'.';
                        return $output;
                    }
                break;
                case 6:
                    // update database only if an entry was changed
                    if (
                        $temp['old_merchant_model']['merchant_name'            ] != $data['merchant_name'            ] OR
                        $temp['old_merchant_model']['merchant_motto'           ] != $data['merchant_motto'           ] OR
                        $temp['old_merchant_model']['merchant_motto_font_color'] != $data['merchant_motto_font_color']
                    ) {
                        // clear unsued fields
                        unset($data['image']);

                        // update row on database
                        $this->db->where('merchant_id', $merchant_id);
                        $this->db->update('merchant', $data);

                        if (!$this->db->affected_rows()) {
                            $output['error'] = 'Unable to save to database.';
                            return $output;
                        }
                    }
                break;
                default:
                    // do nothing
            }
        }

        // update output
        $output = [
            'success'     => TRUE,
            'error'       => NULL,
            'merchant_id' => $temp['old_merchant_model']['merchant_id'],
        ];

        // return output
        return $output;
    }

}
?>