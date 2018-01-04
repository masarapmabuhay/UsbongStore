<?php
class Auto_Email_Product_Model extends CI_Model
{
    //------------------------//
    // Constants
    //------------------------//

    const LIMIT  = 30;

    //------------------------//
    // Get
    //------------------------//

    // get the products ascociated with a specific $auto_email_id
    /*
        Array
        (
            [0] => Array
            (
                [auto_email_product_id] => 1
                [product_id] => 1
                [name] => The Remains of the Day
                [price] => 400
                [author] => Kazuo Ishiguro
                [image_location] =>
                [product_type_name] => Books
                [external_url] => NULL
            )
            [1] => Array
            (
                [auto_email_product_id] => 2
                [product_id] => 28
                [name] => M&S Earl Grey Tea
                [price] => 295
                [author] =>
                [image_location] =>
                [product_type_name] => Beverages
                [external_url] => 'http://www.external.com'
            )
        )
    */
    public function getAllProducts($auto_email_id) {
        $this->db->select(
            'auto_email_product.auto_email_product_id, '.
            'product.product_id, product.name, product.price, product.author, product.image_location, product.external_url, '.
            'product_type.product_type_name'
        );
        $this->db->from('auto_email_product');
        $this->db->where('auto_email_id', $auto_email_id);
        $this->db->join('product'     , 'auto_email_product.product_id = product.product_id', 'left');
        $this->db->join('product_type', 'product.product_type_id       = product_type.product_type_id', 'left');
        $this->db->order_by('auto_email_product.auto_email_product_id', 'ASC');
        return $this->db->get()->result_array();
    }

    /*
        returns data
        [
            0 => [
                'product_id'        => 2, // arraged from least to greatest
                'name'              => "fish and chips",
                'price'             => "99",
                'product_type_name' => "books"
            ],
        ]
    */
    public function get($product_id) {
        $this->db->select(
            'product.product_id, product.name, product.price, '.
            'product_type.product_type_name'
        );
        $this->db->from('product');
        $this->db->join('product_type', 'product.product_type_id = product_type.product_type_id', 'left');
        $this->db->where('product_id', $product_id);
        return $this->db->get()->row_array();
    }

    /*
        returns a page worth of data
        [
            0 => [
                'product_id'        => 2, // arraged from least to greatest
                'name'              => "fish and chips",
                'price'             => "99",
                'product_type_name' => "books"
            ],
        ]
    */
    public function getPage($page, $filter = NULL) {
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
            'product.product_id, product.name, product.price, '.
            'product_type.product_type_name'
        );
        $this->db->from('product');
        $this->db->join('product_type', 'product.product_type_id = product_type.product_type_id', 'left');

        if (isset($filter)) {
            $this->db->like('name', $filter, 'both');
        }
        $this->db->limit(self::LIMIT, $offset);
        $this->db->order_by('product_id', 'ASC');
        return $this->db->get()->result_array();
    }

    public function getMaxPage($filter = NULL) {
        if (isset($filter)) {
            $this->db->like('name', $filter, 'both');
        }
        return ceil(
            $this->db->count_all_results('product') / self::LIMIT
        );
    }
}
?>