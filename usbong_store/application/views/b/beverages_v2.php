<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // session fields
    $customer_id = $this->session->userdata('customer_id');
    $merchant_id = $this->session->userdata('merchant_id');
    $is_admin = $this->session->userdata('is_admin');
?>

<div class="container">
    <div class="row">
        <!-- Main Pane -->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-10">
            <!-- Header -->                        
            <div class="row">
                <h2 class="header">Beverages</h2>
            </div>
            <!-- Products -->
            <div class="row .row-eq-height">
                <!-- Prepare Data -->            
                <?php
                    foreach ($beverages as $value) {
                        // remove ":" and "'"
                        $reformattedProductName = str_replace(':','',str_replace('\'','',$value['name']));
                        // replace "&", " ", and "-"
                        $URLFriendlyReformattedProductName = str_replace("(","",
                            str_replace(")","",
                            str_replace("&","and",
                            str_replace(',','',
                            str_replace(' ','-',
                            str_replace('/','-',
                            $reformattedProductName))))));
                        // replace "&", " ", and "-"
                        $URLFriendlyReformattedProductAuthor = str_replace("(","",
                            str_replace(")","",
                            str_replace("&","and",
                            str_replace(',','',
                            str_replace(' ','-',
                            str_replace('/','-',
                            $value['author']))))));
                        $trimmedName = $value['name'];
                        if (strlen($value['name'])>40) {
                                $trimmedName = trim(substr($value['name'],0,40))."...";
                        }
                ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 Product-item text-center">
                        <a class="Product-item" href="<?php echo site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']); ?>">
                            <!-- General Description -->
                            <img class="imr-responsive center-block Image-item" src="<?php echo base_url('assets/images/beverages/'.$reformattedProductName.'.jpg'); ?>">
                            <br><div id="Product-item-titleOnly" class="Product-item-titleOnly"><?php echo $trimmedName;?></div>
                            <!-- Details -->
                            <label class="Product-item-details">
                                <!-- In Stock/Out of Stock -->
                                <?php if ($value['quantity_in_stock'] !=0 ) { ?>
                                    <label class="Product-item-price">&#x20B1;<?php echo $value['price']; ?></label>
                                    <!-- Has Old Price -->
                                    <?php if (isset($value['previous_price'])) { ?>
                                        <label class="Product-item-previous-price">&ensp;(<?php echo $value['previous_price']; ?>)</label>
                                    <?php } ?>
                                <?php } else { ?>
                                    <label class="Product-item-price">out of stock</label>
                                <?php } ?><!-- In Stock/Out of Stock -->
                                
                                <!-- Admin or Not Admin -->
                                <?php if (($customer_id != "-1") && ($is_admin == "1")) { ?>
                                    <br><label class="Product-item-view-num">View Num: <?php echo $value['product_view_num']; ?></label>
                                    <br><label class="Product-item-view-num">Qty Sold: <?php echo $value['quantity_sold'];    ?></label>
                                <?php } else { ?>
                                    <?php foreach ($merchant_customer_categories as $v) { ?>
                                        <?php if ($v['product_type_name']=='Beverages') { ?>
                                            <br><label class="Product-item-view-num">View Num: <?php echo $value['product_view_num']; ?></label>
                                            <br><label class="Product-item-view-num">Qty Sold: <?php echo $value['quantity_sold'];    ?></label>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?><!-- Admin or Not Admin -->
                            </label>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- Side Pane -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-2">
            <?php $this->load->view($right_side_bar); ?>
        </div>
    </div>
</div>