<?php

function create_product_url($product_id, $product_name, $product_author) {

    //remove ":" and "'"
    $clean_product_name = str_replace(':','',str_replace('\'','',$product_name));

    //replace "&", " ", and "-"
    $clean_product_name = str_replace("(","",
                            str_replace(")","",
                            str_replace("&","and",
                            str_replace(',','',
                            str_replace(' ','-',
                            str_replace('/','-',
                            $clean_product_name))))));

    // please see the ticket below for some concerns:
    // https://github.com/usbong/UsbongStore/issues/3
    $clean_author       = '-'.str_replace("(","",
                            str_replace(")","",
                            str_replace("&","and",
                            str_replace(',','',
                            str_replace(' ','-',
                            str_replace('/','-',
                            $product_author)))))); //replace "&", " ", and "-"

    return site_url('w/'.$clean_product_name.$clean_author.'/'.$product_id);

}

function create_image_url($product_name, $product_type) {

    // clean up name
    $clean_product_name = str_replace(':','',str_replace('\'','',$product_name));
    $clean_product_name = str_replace(' ','%20',
                            str_replace('/','-',
                            $clean_product_name));

    // clean up type
    $clean_product_type = strtolower(
                            str_replace("(","",
                            str_replace(")","",
                            str_replace("&","and",
                            str_replace(',','',
                            str_replace(' ','_',
                            str_replace('/','-',
                            str_replace("'","",
                            $product_type)))))))
                        );

    return base_url('assets/images/'.$clean_product_type.'/'.$clean_product_name.'.jpg');

}

function create_jpg_file_name($product_name, $product_type) {

    // clean up name
    $clean_product_name = str_replace(':','',str_replace('\'','',$product_name));
    $clean_product_name = str_replace('/','-', $clean_product_name);

    // clean up type
    $clean_product_type = strtolower(
                            str_replace("(","",
                            str_replace(")","",
                            str_replace("&","and",
                            str_replace(',','',
                            str_replace(' ','_',
                            str_replace('/','-',
                            str_replace("'","",
                            $product_type)))))))
                        );

    return FCPATH.'assets/images/'.$clean_product_type.'/'.$clean_product_name.'.jpg';
}