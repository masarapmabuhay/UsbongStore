<?php
class Product_Model extends CI_Model
{
    //------------------------//
    // Constants
    //------------------------//

    const LIMIT  = 30;

    //------------------------//
    // Get
    //------------------------//

    public function get($product_id) {
        $this->db->from('product');
        $this->db->where('product_id', $product_id);
        $this->db->join('product_type', 'product.product_type_id = product_type.product_type_id', 'left');
        return $this->db->get()->row_array();
    }

    // returns a page worth of data where recent entries are returned first
    // valid keys for filters: name, author
    // valid keys for options: search (and, or), quantity_order (ASC, DESC)
    public function getPage($page, $filters = NULL, $options = NULL) {
        // translate $page to offset
        if (is_numeric($page) AND $page > 1) {
            $offset = self::LIMIT * ($page - 1);
        } else {
            $offset = 0;
        }

        // access database
        $this->db->select(
            // product
            'product.product_id, product.name, product.price, product.quantity_in_stock, product.show, product.author, '.
            // product_type
            'product_type.product_type_name '
        );
        $this->db->from('product');

        // add filters as needed
        if (isset($filters['name'])) {
            if (isset($options['search']) AND $options['search'] == 'and') {
                $this->db->like('name', $filters['name'], 'both');
            } else {
                $this->db->or_like('name', $filters['name'], 'both');
            }
        }
        if (isset($filters['author'])) {
            if (isset($options['search']) AND $options['search'] == 'and') {
                $this->db->like('author', $filters['author'], 'both');
            } else {
                $this->db->or_like('author', $filters['author'], 'both');
            }
        }

        $this->db->join('product_type', 'product.product_type_id = product_type.product_type_id', 'left');
        $this->db->limit(self::LIMIT, $offset);


        if (
            isset($options['quantity_order']) AND
            in_array($options['quantity_order'], ['ASC', 'DESC'])
        ) {
            $this->db->order_by('quantity_in_stock', $options['quantity_order']);
            $this->db->order_by('product_id', 'DESC');
        } else {
            $this->db->order_by('product_id', 'DESC');
        }
        return $this->db->get()->result_array();
    }

    // valid keys for filters: name, author
    // valid keys for options: search (and, or)
    public function getMaxPage($filters = NULL, $options = NULL) {
        // add filters as needed
        if (isset($filters['name'])) {
            if (isset($options['search']) AND $options['search'] == 'and') {
                $this->db->like('name', $filters['name'], 'both');
            } else {
                $this->db->or_like('name', $filters['name'], 'both');
            }
        }
        if (isset($filters['author'])) {
            if (isset($options['search']) AND $options['search'] == 'and') {
                $this->db->like('author', $filters['author'], 'both');
            } else {
                $this->db->or_like('author', $filters['author'], 'both');
            }
        }

        return ceil(
            $this->db->count_all_results('product') / self::LIMIT
        );
    }

    //------------------------//
    // Set
    //------------------------//

    /*
     * creates a new row using the data below
     $data = [
            // required
            'name'              => XXX,
            'merchant_id'       => XXX,
            'product_type_id'   => XXX,
            'quantity_in_stock' => XXX,
            'price'             => XXX,
            'image'             => 'data:image/jpeg;base64,/9j...', // base 64 encoded jpeg
            'show'              => XXX,
            // optional
            'previous_price'    => XXX,
            'language'          => XXX,
            'author'            => XXX,
            'supplier'          => XXX,
            'description'       => XXX,
            'format'            => XXX,
            'translator'        => XXX,
            'product_overview'  => XXX,
            'pages'             => XXX,
            'external_url'      => XXX,
            // unused
            'image_location'    => XXX,
     ]
     * returns the ff:
       [
            'success'    => bool,
            'error'      => XXX,
            'product_id' => XXX
       ]
    */
    public function insertRow($data) {
        // init
        $this->load->helper('url');

        // prepare temp fields
        $temp = [
            'product_type_model' => NULL,
            'image_data'         => NULL,
            'decoded_image'      => NULL,
            'image_file_name'    => NULL,
        ];

        // prepare output
        $output = [
            'success'    => FALSE,
            'error'      => 'An unexpected error occurred.',
            'product_id' => NULL,
        ];

        // process image data
        for ($i = 0; $i <= 4; $i++) {
            switch ($i) {
                case 0:
                    // extract product_type_name from db
                    $this->db->select('product_type_name');
                    $this->db->from('product_type');
                    $this->db->where('product_type_id', $data['product_type_id']);
                    $temp['product_type_model'] = $this->db->get()->row_array();

                    if (!isset($temp['product_type_model']['product_type_name'])) {
                        $output['error'] = 'Product Type is invalid.';
                        return $output;
                    }
                break;
                case 1:
                    // check image format
                    $temp['image_data'] = explode(',', $data['image']);
                    if ($temp['image_data'][0] != 'data:image/jpeg;base64') {
                        $output['error'] = 'Image data is not valid.';
                        return $output;
                    }
                break;
                case 2:
                    // decode image data
                    $temp['decoded_image'] = base64_decode($temp['image_data'][1]);
                    if (!$temp['decoded_image']) {
                        $output['error'] = 'Image could not be decoded.';
                        return $output;
                    }
                break;
                case 3:
                    // save image
                    $temp['image_file_name'] = create_jpg_file_name($data['name'], $temp['product_type_model']['product_type_name']);
                    if (
                        file_put_contents($temp['image_file_name'], $temp['decoded_image']) === FALSE
                    ) {
                        $output['error'] = 'Please check directory permission. Unable to save to '.$temp['image_file_name'].'.';
                        return $output;
                    }
                break;
                case 4:
                    // pad data
                    $data['product_view_num'] = 0;
                    $data['quantity_sold']    = 0;

                    // cast bit type data to int else it wont save properly
                    $data['show'] = (int)$data['show'];

                    // clear unsued fields
                    unset($data['image']);
                    unset($data['image_location']);

                    // clear empty optional fields
                    if (empty($data['previous_price']  )) { $data['previous_price']   = NULL; }
                    if (empty($data['language']        )) { $data['language']         = NULL; }
                    if (empty($data['author']          )) { $data['author']           = NULL; }
                    if (empty($data['supplier']        )) { $data['supplier']         = NULL; }
                    if (empty($data['description']     )) { $data['description']      = NULL; }
                    if (empty($data['format']          )) { $data['format']           = NULL; }
                    if (empty($data['translator']      )) { $data['translator']       = NULL; }
                    if (empty($data['product_overview'])) { $data['product_overview'] = NULL; }
                    if (empty($data['pages']           )) { $data['pages']            = NULL; }
                    if (empty($data['external_url']    )) { $data['external_url']     = NULL; }

                    // insert row to database
                    $this->db->insert('product', $data);

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

    public function editRow($product_id, $data) {
        // init
        $this->load->helper('url');

        // prepare temp fields
        $temp = [
            'old_product_model'   => NULL,
            'old_image_file_name' => NULL,
            'product_type_model'  => NULL,
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
                    // check if product exists
                    $this->db->from('product');
                    $this->db->join('product_type', 'product.product_type_id = product_type.product_type_id', 'left');
                    $this->db->where('product_id', $product_id);
                    $temp['old_product_model'] = $this->db->get()->row_array();

                    if (!isset($temp['old_product_model']['product_id'])) {
                        $output['error'] = 'Product ID is invalid.';
                        return $output;
                    }
                break;
                case 1:
                    // delete existing image
                    $temp['old_image_file_name'] = create_jpg_file_name($temp['old_product_model']['name'], $temp['old_product_model']['product_type_name']);
                    if (!unlink($temp['old_image_file_name'])) {
                        $output['error'] = 'Please check directory permission. Unable to delete old image: '.$temp['old_image_file_name'].'.';
                        return $output;
                    }
                break;
                case 2:
                    // extract product_type_name from db
                    $this->db->select('product_type_name');
                    $this->db->from('product_type');
                    $this->db->where('product_type_id', $data['product_type_id']);
                    $temp['product_type_model'] = $this->db->get()->row_array();

                    if (!isset($temp['product_type_model']['product_type_name'])) {
                        $output['error'] = 'Product Type is invalid.';
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
                    $temp['image_file_name'] = create_jpg_file_name($data['name'], $temp['product_type_model']['product_type_name']);
                    if (
                        file_put_contents($temp['image_file_name'], $temp['decoded_image']) === FALSE
                    ) {
                        $output['error'] = 'Please check directory permission. Unable to save to '.$temp['image_file_name'].'.';
                        return $output;
                    }
                break;
                case 6:
                    // cast bit type data to int else it wont save properly
                    $data['show']                      = (int)$data['show'];
                    $temp['old_product_model']['show'] = (int)$temp['old_product_model']['show'];

                    // update database only if an entry was changed
                    if (
                        // required
                        $temp['old_product_model']['name'             ] != $data['name'             ] OR
                        $temp['old_product_model']['merchant_id'      ] != $data['merchant_id'      ] OR
                        $temp['old_product_model']['product_type_id'  ] != $data['product_type_id'  ] OR
                        $temp['old_product_model']['quantity_in_stock'] != $data['quantity_in_stock'] OR
                        $temp['old_product_model']['price'            ] != $data['price'            ] OR
                        $temp['old_product_model']['show'             ] != $data['show'             ] OR
                        // optional
                        $temp['old_product_model']['previous_price'  ]  != $data['previous_price'   ] OR
                        $temp['old_product_model']['language'        ]  != $data['language'         ] OR
                        $temp['old_product_model']['author'          ]  != $data['author'           ] OR
                        $temp['old_product_model']['supplier'        ]  != $data['supplier'         ] OR
                        $temp['old_product_model']['description'     ]  != $data['description'      ] OR
                        $temp['old_product_model']['format'          ]  != $data['format'           ] OR
                        $temp['old_product_model']['translator'      ]  != $data['translator'       ] OR
                        $temp['old_product_model']['product_overview']  != $data['product_overview' ] OR
                        $temp['old_product_model']['pages'           ]  != $data['pages'            ] OR
                        $temp['old_product_model']['external_url'    ]  != $data['external_url'     ]
                    ) {
                        // clear unsued fields
                        unset($data['product_view_num']);
                        unset($data['quantity_sold']);
                        unset($data['image']);
                        unset($data['image_location']);

                        // clear empty optional fields
                        if (empty($data['previous_price']  )) { $data['previous_price']   = NULL; }
                        if (empty($data['language']        )) { $data['language']         = NULL; }
                        if (empty($data['author']          )) { $data['author']           = NULL; }
                        if (empty($data['supplier']        )) { $data['supplier']         = NULL; }
                        if (empty($data['description']     )) { $data['description']      = NULL; }
                        if (empty($data['format']          )) { $data['format']           = NULL; }
                        if (empty($data['translator']      )) { $data['translator']       = NULL; }
                        if (empty($data['product_overview'])) { $data['product_overview'] = NULL; }
                        if (empty($data['pages']           )) { $data['pages']            = NULL; }
                        if (empty($data['external_url']    )) { $data['external_url']     = NULL; }

                        // update row on database
                        $this->db->where('product_id', $product_id);
                        $this->db->update('product', $data);

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
            'success'    => TRUE,
            'error'      => NULL,
            'product_id' => $temp['old_product_model']['product_id'],
        ];

        // return output
        return $output;
    }
}
?>
