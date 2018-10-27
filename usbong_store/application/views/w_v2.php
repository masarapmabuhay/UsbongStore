<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// process strings: remove ":" and "'"
$reformattedCategoryName = str_replace(':','',str_replace('\'','', reset($merchant_categories)['product_type_name']));

// process strings: replace "&", " ", and "-"
$URLFriendlyReformattedCategoryName = str_replace("(","",
                str_replace(")","",
                str_replace("&","and",
                str_replace(',','',
                str_replace(' ','-',
                str_replace('/','-',
                $reformattedCategoryName))))));

// header
if ($result->product_type_name == 'Children\'s') {
    $header = 'Children\'s Books';
} elseif ($result->product_type_name == 'Miscellaneous') {
    $header = 'Miscellaneous Items';
} else {
    $header = $result->product_type_name;
}
?>

<div class="container-fluid">
    <!-- Header Row -->
    <div class="row">
        <h3 class="header header-catalogue hidden-xs hidden-sm hidden-md">
            <?php echo $header; ?>
        </h3>
    </div><!-- Header Row -->

    <!-- Spacer -->
    <div class="hidden-lg">
        <br>
        <br>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Category Pane -->
        <div class="col-lg-2 Merchant-category-pane">
            <div class="Merchant-category-image">
                <a href="<?php echo site_url('b/'.strtolower($URLFriendlyReformattedCategoryName).'/'.$result->merchant_id); ?>">
                    <img class="img-responsive center-block" src="<?php echo base_url('assets/images/merchants/'.$result->merchant_name.'.jpg');?>">
                </a>
            </div>
            <?php foreach ($merchant_categories as $value) { ?>
                <?php
                    $fileFriendlyCategoryName = str_replace("'","",
                                                    str_replace(" & ","_and_",
                                                        strtolower($value['product_type_name'])
                                                    )
                                                );
                ?>
                <div class="Merchant-category-content text-center">
                    <a class="Merchant-category-content-link" href="<?php echo site_url('b/'.$fileFriendlyCategoryName.'/'.$value['merchant_id']); ?>">
                        <?php echo strtoupper($value['product_type_name']); ?>
                    </a>
                </div>
            <?php } ?>
        </div><!-- Category Pane -->

        <!-- Spacer -->
        <div class="hidden-lg">
            <br>
            <br>
        </div>

        <!-- Image Pane -->
        <div class="col-md-3 col-lg-3" data="image-pane">
            <!-- Image -->
            <div class="Image-item-container">
                <!-- General Description -->
                <img class="img-responsive center-block Image-item" src="<?php echo create_image_url($result->name, $result->product_type_name); ?>">
                <!-- Essential Reading Overlay -->
                <?php if (isset($result->is_essential_reading) && ($result->is_essential_reading)) { ?>
                    <img class="img-responsive center-block Image-item Image-item-essential-reading" src="<?php echo base_url('assets/images/essential_reading.png'); ?>">
                <?php } ?>
            </div>
            <!-- Product Brief (Books Only) -->
            <?php if (($result->product_type_name == "Books") || ($result->product_type_name == "Children's") || ($result->product_type_name == "Textbooks") || ($result->product_type_name == "Manga") || ($result->product_type_name == "Comics")) { ?>
                <div class="Product-format center-block">
                    <div class="visible-sm text-center">
                        Format: <b><?php echo $result->format; ?></b>
                    </div>
                    <div class="hidden-sm">
                        Format: <b><?php echo $result->format; ?></b>
                    </div>
                </div>
                <div class="Product-condition center-block">
                    <div class="visible-sm text-center">
                        Condition: <b><?php echo $result->description; ?></b>
                    </div>
                    <div class="hidden-sm">
                        Condition: <b><?php echo $result->description; ?></b>
                    </div>
                </div>
                <div class="Product-language center-block">
                    <div class="visible-sm text-center">
                        Language: <b><?php echo $result->language; ?></b>
                    </div>
                    <div class="hidden-sm">
                        Language: <b><?php echo $result->language; ?></b>
                    </div>
                </div>
                <!-- Product Brief (Optional Fields) -->
                <?php if (isset($result->publisher) && (strcmp(trim($result->publisher),'') != 0)) { ?>
                    <div class="Product-publisher center-block">
                        <div class="visible-sm text-center">
                            Publisher: <b><?php echo $result->publisher; ?></b>
                        </div>
                        <div class="hidden-sm">
                            Publisher: <b><?php echo $result->publisher; ?></b>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isset($result->released_date) && (strcmp(trim($result->released_date),'') != 0)) { ?>
                    <div class="Product-released_date center-block">
                        <div class="visible-sm text-center">
                            Released Date: <b><?php echo $result->released_date; ?></b>
                        </div>
                        <div class="hidden-sm">
                            Released Date: <b><?php echo $result->released_date; ?></b>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isset($result->pages)) { ?>
                    <div class="Product-pages center-block">
                        <div class="visible-sm text-center">
                            Pages: <b><?php echo $result->pages; ?></b>
                        </div>
                        <div class="hidden-sm">
                            Pages: <b><?php echo $result->pages; ?></b>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div><!-- Image Pane -->

        <!-- Spacer -->
        <div class="visible-xs visible-sm">
            <br>
            <br>
        </div>

        <!-- Description Pane -->
        <div class="col-md-6 col-lg-4" data="description-pane">
            <div class="row Product-name">
                <?php echo $result->name;?>
            </div>
            <div class="row Product-author">
                <b class="hidden-xs">
                    <?php echo $result->author;?>
                </b>
                <b class="visible-xs center-block text-center">
                    <?php echo $result->author;?>
                </b>
            </div>
            <div class="row">
                <div class="Product-overview-header">
                    <b>Product Overview</b>
                </div>
                <div class="Product-overview-content">
                    <?php if (!empty($result->product_overview) && (strcmp($result->product_overview, "<p>&nbsp;</p>") != 0)) { ?>
                        <?php echo $result->product_overview; ?>
                        <br><br>
                    <?php } else { ?>
                        <!-- Spacer -->
                        <div class="hidden-xs">
                            <br>
                        </div>
                        <br>
                        <i class="center-block text-center">
                            No synopsis available.
                        </i>
                    <?php } ?>
                </div>
            </div>
        </div><!-- Description Pane -->

        <!-- Spacer -->
        <div class="visible-xs visible-sm">
            <br>
            <br>
        </div>

        <!-- Add to Cart Pane -->
        <div class="col-md-3 col-lg-3">
            <!-- Price -->
            <div class="Product-price text-center">
                <b>
                    <?php if (trim($result->price) == '') { ?>
                        out of stock
                    <?php } else { ?>
                        <a class="Product-price" href ="<?php echo site_url('help/'); ?>" target="_blank">
                            &#x20B1;<?php echo $result->price; ?> [Free Delivery]
                        </a>
                    <?php } ?>
                </b>
            </div><!-- Price -->
            <!-- Add to Cart -->
            <div class="Product-quantity  text-center">
                <?php if ($result->quantity_in_stock < 1) { ?>
                    <label class="Quantity-label">Quantity: <span class="Quantity-out-of-stock">out of stock</span></label>
                <?php } else { ?>
                    <label class="Quantity-label">Quantity:</label>
                    <input type="tel" id="quantityParam" class="Quantity-textbox no-spin" value="1" min="1" max="99" onKeyPress="if (this.value.length == 2) {return false;} if (parseInt(this.value) < 1) { this.value = '1'; return false;}" required>
                    <div class="row Product-purchase-button">
                        <input type="hidden" id="product_idParam" value="<?php echo $result->product_id; ?>" required>
                        <input type="hidden" id="customer_idParam" value="<?php echo $this->session->userdata('customer_id'); ?>" required>
                        <input type="hidden" id="priceParam" value="<?php echo $result->price; ?>" required>
                        <button onclick="myPopupFunction()" class="Button-purchase">ADD TO CART</button>
                    </div>
                <?php } ?>
            </div><!-- Add to Cart -->
            <!-- Ads -->
            <div>
                <br><br>
                <?php if ($result->quantity_in_stock < 1) { ?>
                    <!--  $this->uri->segment(2) is a URL friendly product name-->
                    <a class="Request-link" href="<?php echo site_url('request/'.$this->uri->segment(2).'/'.$result->product_id)?>">
                        <img class="Product-item-page-image-offers-request img-responsive center-block" src="<?php echo base_url('assets/images/usbongOffersRequest_L.jpg')?>">
                    </a>
                <?php } else { ?>
                    <?php if ($result->product_type_name == "Manga") { ?>
                        <a href="https://www.linkedin.com/in/michaelsyson/" target="_blank">
                            <img class="Product-item-page-image-offers-jlpt img-responsive center-block" src="<?php echo base_url('assets/images/usbongSchoolJLPTReview_L.jpg')?>">
                        </a>
                    <?php } else { ?>
                        <img class="Product-item-page-image-offers-save-more img-responsive center-block" src="<?php echo base_url('assets/images/usbongOffersBuyMoreSaveMore_L.jpg')?>">
                    <?php } ?>
                    <br><br>
                    <!--  $this->uri->segment(2) is a URL friendly product name-->
                    <a class="Sell-link" href="<?php echo site_url('sell/'.$this->uri->segment(2).'/'.$result->product_id);?>">
                        <img class="Product-item-page-image-offers-sell img-responsive center-block" src="<?php echo base_url('assets/images/usbongOffersBuyBack_L.jpg')?>">
                    </a>
                    <br><br>
                <?php } ?>
            </div><!-- Ads -->
        </div><!-- Add to Cart Pane -->

    </div><!-- Content Row -->

    <!-- Spacer -->
    <div>
        <br>
        <br>
    </div>

</div><!--<div class="container">-->

<!--  Modal -->
<div id="myPopup" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-5">
                        <img class="img-responsive center-block" src="<?php echo create_image_url($result->name, $result->product_type_name); ?>">
                    </div>
                    <div class="col-xs-7 Popup-product-details text-center">
                        <span id="quantityId"></span>
                        <label class="Popup-product-name"><?php echo '<b>'.$result->name.'</b>!'; ?></label>
                        <br><b>Total Amt: </b>
                        <label class="Popup-product-price">&#x20B1;<span id="productPriceId"><?php echo $result->price;?></span></label><br>
                        <label class="Popup-product-free-delivery">[Free Delivery]</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <form method="post" action="<?php echo site_url('cart/shoppingcart')?>">
                <button type="submit" class="Button-view-cart">
                    View Cart
                </button>
            </form>
            </div>
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->