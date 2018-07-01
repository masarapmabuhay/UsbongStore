<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- App Header: Only Show on LG -->
<div class="header-banner hidden-xs hidden-sm hidden-md vissible-lg">
    <ul>
        <li class="header-banner-li"><a href="http://usbong.ph/resources" target="_blank"><img class="Image-usbong-icon" src="<?php echo base_url('assets/images/banner_icons/dahon.png'); ?>"></a>
            <span class="header-banner-span">&ensp;&ensp;UPLIFTING APPS FROM&ensp;&ensp;</span>
            <a href="http://usbong.ph" target="_blank">
                <img class="Image-usbong-logo" src="<?php echo base_url('assets/images/usbongLogo.png'); ?>">
            </a>
        </li>
        <li class="header-banner-li"><a href="http://kindness.usbong.ph" target="_blank"><img class="Image-usbong-icon" src="<?php echo base_url('assets/images/banner_icons/pagtsing.png'); ?>"></a></li>
        <li class="header-banner-li"><a href="http://kindness.usbong.ph" target="_blank"><img class="Image-usbong-icon" src="<?php echo base_url('assets/images/banner_icons/juanT.png'); ?>"></a></li>
        <li class="header-banner-li"><a href="http://kindness.usbong.ph" target="_blank"><img class="Image-usbong-icon" src="<?php echo base_url('assets/images/banner_icons/gamugamu.png'); ?>"></a></li>
        <li class="header-banner-li"><a href="http://nature.usbong.ph" target="_blank"><img class="Image-usbong-icon" src="<?php echo base_url('assets/images/banner_icons/pinya.png'); ?>"></a></li>
        <li class="header-banner-li"><a href="http://paspas.usbong.ph" target="_blank"><img class="Image-usbong-icon" src="<?php echo base_url('assets/images/banner_icons/paspas.png'); ?>"></a></li>
        <li class="header-banner-li"><a href="http://turon.usbong.ph" target="_blank"><img class="Image-usbong-icon" src="<?php echo base_url('assets/images/banner_icons/whenyoudontknow.png'); ?>"></a></li>
        <li class="header-banner-li"><a href="http://fish.usbong.ph" target="_blank"><img class="Image-usbong-icon" src="<?php echo base_url('assets/images/banner_icons/malansangisda.png'); ?>"></a></li>
        <li class="header-banner-li"><a href="http://filipino.usbong.ph" target="_blank"><img class="Image-usbong-icon" src="<?php echo base_url('assets/images/banner_icons/tiyaga.png'); ?>"></a></li>
        <li class="header-banner-li"><a href="http://heaven.usbong.ph" target="_blank"><img class="Image-usbong-icon" src="<?php echo base_url('assets/images/banner_icons/whereisheaven.png'); ?>"></a></li>
        <li class="header-banner-li"><a href="http://heaven.usbong.ph" target="_blank"><img class="Image-usbong-15pesos-icon" src="<?php echo base_url('assets/images/banner_icons/15pesos.png'); ?>"></a></li>
        <li class="header-banner-li"><a href="<?php echo site_url('contact/')?>" target="_blank"><img class="Image-usbong-icon" src="<?php echo base_url('assets/images/banner_icons/help.png'); ?>"></a></li>
    </ul>
</div>

<!-- Search Header -->
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <!-- Minimum Heder Content -->
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo site_url('/')?>">
                <img class="Image-usbong-store-logo" alt="Usbong" src="<?php echo base_url('assets/images/usbongStoreBrandLogo.png'); ?>">
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Expanded Header Content -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!-- Left Nav: Search Form -->
            <form class="navbar-form navbar-left" method="get" action="<?php echo site_url('browse/search')?>">
                <?php if ((isset($param)) && ($param!="")) { ?>
                    <input type="text" class="Search-input" placeholder="I'm looking for..." value="<?php echo $param; ?>" name="param" required>
                <?php } else { ?>
                    <input type="text" class="Search-input" placeholder="I'm looking for..." name="param" required>
                <?php } ?>
                <div class="input-group">                
                  <div class="input-group-btn">
                      <button class="btn btn-default" type="submit">
                          <i class="glyphicon glyphicon-search"></i>
                      </button>
                  </div>
                </div>                  
            </form>
            <!-- Right Nav -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Login -->
                <?php
                    $is_login_successful = FALSE;
                    if (
                        ($this->session->has_userdata('customer_first_name') !== null) &&
                        (!empty($this->session->userdata('customer_first_name')))
                    ) {
                        $is_login_successful = TRUE;
                    }
                ?>
                <?php if ($is_login_successful) { ?>
                    <!-- Login for Signed User -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <b>
                            Hi <?php echo /*ucfirst(*/$this->session->userdata('customer_first_name')/*)*/; ?>! <span class="caret"></span>
                        </b>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Account -->
                            <li><a href="<?php echo site_url('account/settings/'); ?>">My Account</a></li>
                            <li><a href="<?php echo site_url('account/ordersummary/'); ?>">Order Summary</a></li>
                            <li role="separator" class="divider"></li>
                            <!-- Admin -->
                            <?php if ($this->session->userdata('is_admin') == "1") { ?>
                                <li><a href="<?php echo site_url('account/ordersummaryadmin/'); ?>">Order Summary (Admin)</a></li>
                                <li><a href="<?php echo site_url('index.php/manage/'); ?>">Product Management (Admin)</a></li>
                                <li><a href="<?php echo site_url('auto-email/'); ?>">Auto-email (Admin)</a></li>
                                <li role="separator" class="divider"></li>
                            <?php } ?>
                            <!-- Merchant -->
                            <?php if ($this->session->userdata('merchant_id') != "0") { ?>
                                <li><a href="<?php echo site_url('account/ordersummarymerchant/'); ?>">Order Summary (Merchant Admin)</a></li>
                                <li role="separator" class="divider"></li>
                            <?php } ?>
                            <!-- Log Out -->
                            <li><a href="<?php echo site_url('account/logout/'); ?>">Log Out</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <!-- Login for Guest User -->
                    <li>
                        <a href="<?php echo site_url('account/login/');?>">
                            <b>Login</b>
                        </a>
                    </li>
                <?php } ?>
                <!-- Cart Form -->
                <?php
                    $cart_action = site_url('cart/shoppingcart');
                    if ($this->session->userdata('customer_id') == "") {
                        $cart_action = site_url('account/login/');
                    }
                    $totalQuantity = $this->uri->segment(5);
                    $totalQuantity = isset($totalQuantity) ? $totalQuantity : 0;
                ?>
                <form class="Cart-container navbar-form navbar-right" method="post" action="<?php echo $cart_action?>">
                    <button type="submit" class="Button-cart">
                        <input type="hidden" id="totalItemsInCartId" value="<?php echo $totalQuantity; ?>">
                        <label class="Text-cart" id="Text-cartId">
                            <?php 
                                if ($totalQuantity < 10) {
                                    echo $totalQuantity;
                                }
                            ?>
                        </label>
                        <label class="Text-cart-2digits" id="Text-cart-2digitsId">
                            <?php 
                                if (($totalQuantity > 9) && ($totalQuantity < 100)) {
                                    echo $totalQuantity;
                                }
                            ?>
                        </label>
                        <label class="Text-cart-3digits" id="Text-cart-3digitsId">
                            <?php 
                                if ($totalQuantity > 99) {
                                    echo $totalQuantity;
                                }
                            ?>
                        </label>	
                        <img src="<?php echo base_url('assets/images/cart_icon_not_empty.png');?>">
                    </button>
                </form>
            </ul>
        </div>
    </div>
</nav>

<!-- Category Header -->
<nav class="navbar-static-top categories-navbar">
    <div class="container-fluid Header-container">
        <ul class="nav navbar-nav container-navbar">
            <li><a href="<?php echo site_url('b/books/')?>">BOOKS</a></li>
            <li><a href="<?php echo site_url('b/childrens/')?>">CHILDREN'S</a></li>
            <li><a href="<?php echo site_url('b/textbooks/')?>">TEXTBOOKS</a></li>
            <li><a href="<?php echo site_url('b/medical/')?>">MEDICAL</a></li>
            <li><a href="<?php echo site_url('b/food/')?>">FOOD</a></li>
            <li><a href="<?php echo site_url('b/beverages/')?>">BEVERAGES</a></li>
            <li><a href="<?php echo site_url('b/comics/')?>">COMICS</a></li>
            <li><a href="<?php echo site_url('b/manga/')?>">MANGA</a></li>
            <li><a href="<?php echo site_url('b/toys-and-collectibles/')?>">TOYS & COLLECTIBLES</a></li>
            <li><a href="<?php echo site_url('b/miscellaneous/')?>">MISCELLANEOUS</a></li>
            <li><a href="<?php echo site_url('b/promos/')?>">PROMOS</a></li>
        </ul>
    </div>
</nav>
