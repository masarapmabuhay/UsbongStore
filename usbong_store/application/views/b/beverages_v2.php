<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    // session fields
    $customer_id = $this->session->userdata('customer_id');
    $merchant_id = $this->session->userdata('merchant_id');
    $is_admin = $this->session->userdata('is_admin');
    
    // css fields
    $left_pane_col = 'col-xs-12 col-sm-12 col-md-3 col-lg-2';
    if (isset($categories)) {
        $main_pane_col = 'col-xs-12 col-sm-12 col-md-6 col-lg-8';
        $right_pane_col = 'col-xs-12 col-sm-12 col-md-3 col-lg-2';
    } else {
        $main_pane_col = 'col-xs-12 col-sm-12 col-md-9 col-lg-10';
        $right_pane_col = 'col-xs-12 col-sm-12 col-md-3 col-lg-2';
    }
?>

<!--import javascript-->
<script src="https://store.usbong.ph/assets/js/responsive_bootstrap_toolkit/bootstrap-toolkit.min.js"></script>
<script src="https://store.usbong.ph/assets/js/b/common.js"></script>

<div class="container-fluid">
    <div class="row">
        <!-- Left Pane: optional -->
        <?php if (isset($categories)) { ?>
            <!-- Prepare Data -->
            <?php
                //remove ":" and "'"
                $reformattedCategoryName = str_replace(':','',str_replace('\'','', reset($categories)['product_type_name']));
                //replace "&", " ", and "-"
                $URLFriendlyReformattedCategoryName = str_replace("(","",
                    str_replace(")","",
                    str_replace("&","and",
                    str_replace(',','',
                    str_replace(' ','-',
                    str_replace('/','-',
                    $reformattedCategoryName))))));
            ?>
            <!-- Header -->
            <div class="row">
                <div class="hidden-xs hidden-sm vissible-md vissible-lg col-xs-12">
                        <h2 class="header">Beverages</h2>
                </div>
                <div class="vissible-xs vissible-sm hidden-md hidden-lg col-xs-12 text-center">
                        <h2 class="header">Beverages</h2>
                </div>                
            </div>
            
            <div class="<?php echo $left_pane_col;?> Merchant-category-b">
                <div class="row Merchant-category-image">
                    <a href="<?php echo site_url('b/'.$URLFriendlyReformattedCategoryName.'/'.$this->uri->segment(3)); ?>">
                        <img class="image-responsive center-block" src="<?php echo base_url('assets/images/merchants/'.$result->merchant_name.'.jpg'); ?>">
                    </a>
                </div>
                <?php foreach ($categories as $value) { ?>
                    <?php
                        $fileFriendlyCategoryName = str_replace(
                            "'",
                            "",
                            str_replace(
                                " & ",
                                "_and_",
                                strtolower($value['product_type_name'])
                            )
                        );
                    ?>
                    <div class="row text-center">
                        <div class="Merchant-category-content col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-0 col-md-12">
                            <a class="Merchant-category-content-link" href="<?php echo site_url('b/'.$fileFriendlyCategoryName.'/'.$value['merchant_id']);?>">
                                <?php echo strtoupper($value['product_type_name']); ?>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>        
        <!-- Main Pane -->
        <div class="<?php echo $main_pane_col; ?>" data="main-pane">
        	<?php 
        		if (!isset($categories)) { //if not on Merchant page due to no Merchant categorie s?>
	            <!-- Header -->
	            <div class="row">
	                <div class="hidden-xs hidden-sm vissible-md vissible-lg col-xs-12">
	                        <h2 class="header">Beverages</h2>
	                </div>
	                <div class="vissible-xs vissible-sm hidden-md hidden-lg col-xs-12 text-center">
	                        <h2 class="header">Beverages</h2>
	                </div>                
	            </div>
	        <?php 
               } 
	        ?>
            <!-- Products -->
            <div class="row">
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
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2 Product-item text-center" data="product-item-div">
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
        <!-- Right Pane -->
        <div class="<?php echo $right_pane_col; ?> right-pane" data="right-pane">
            <?php $this->load->view($right_side_bar); ?>
        </div>
    </div>
</div>