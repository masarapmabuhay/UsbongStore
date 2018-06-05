<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!-- 
<html lang="en">
<head>
</head>
<body>		
-->
	<div class="header-banner">
<!--  <a class="header-banner-link" href = "http://usbong.ph" target="_blank">	
 -->	
		<ul>
			<li class="header-banner-li"><a href="http://usbong.ph/resources" target="_blank"><img class="Image-usbong-icon" src="<?php echo base_url('assets/images/banner_icons/dahon.png'); ?>"></a>
			<span class="header-banner-span">&ensp;&ensp;UPLIFTING APPS FROM&ensp;&ensp;</span><a href="http://usbong.ph" target="_blank"><img class="Image-usbong-logo" src="<?php echo base_url('assets/images/usbongLogo.png'); ?>"></a>
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
			<li class="header-banner-li"><a href="http://tree.usbong.ph" target="_blank"><img class="Image-usbong-icon" src="<?php echo base_url('assets/images/banner_icons/fi.png'); ?>"></a></li>
 			<li class="header-banner-li"><a href="http://heaven.usbong.ph" target="_blank"><img class="Image-usbong-15pesos-icon" src="<?php echo base_url('assets/images/banner_icons/15pesos.png'); ?>"></a></li>
 			<li class="header-banner-li"><a href="<?php echo site_url('contact/')?>" target="_blank"><img class="Image-usbong-question-icon" src="<?php echo base_url('assets/images/banner_icons/help.png'); ?>"></a></li>
		</ul>
<!-- 
	</a>
 -->
	</div>
	<nav class="navbar navbar-inverse navbar-static-top">
	  <div class="Header-container">
		<ul class="nav navbar-nav">
		  <li><div class="usbongLogo"><a href = "<?php echo site_url('/')?>"><img class="Image-usbong-store-logo" src="<?php echo base_url('assets/images/usbongStoreBrandLogo.png'); ?>"></a></div></li>
		  <li><div class="input-group Search-container">
					<form method="get" action="<?php echo site_url('browse/search')?>">
					<?php if ((isset($param)) && ($param!="")) {
						echo '<input type="text" class="Search-input" placeholder="I\'m looking for..." value="'.$param.'" name="param" required>';
					}
					else { //default
						echo '<input type="text" class="Search-input" placeholder="I\'m looking for..." name="param" required>';
					}
					?>
					<div class="input-group-btn">
				      <button class="btn btn-default" type="submit">
				        <i class="glyphicon glyphicon-search"></i>
				      </button>
					</div>
					</form>
			  </div></li>
		</ul>		
		<ul class="nav navbar-nav navbar-right" role="menu">
		  <li>
			<div class="dropdown">
				<?php
						$is_login_successful = false;
			  			if (($this->session->has_userdata('customer_first_name')!==null) &&
			  				(!empty($this->session->userdata('customer_first_name')))) {
							$is_login_successful = true;
						}

			  			if ($is_login_successful) {
				 			echo '<div class="Customer-dropdown">';
			  				echo "<a><b>Hi, ".$this->session->userdata('customer_first_name')."!</b></a>";

								echo '<div class="dropdown">';
								echo '<ul class="dropdown-menu">';			  		
								  	echo '<li><a href = "'.site_url('account/settings/').'">My Account</a></li>';				

								  	if ($this->session->userdata('is_admin')=="1") { //true								  		
								  		if ($this->session->userdata('merchant_id')=="0") { //true								  			
								  			echo '<li><a href = "'.site_url('account/ordersummaryadmin/').'">Order Summary (Admin)</a></li>';
								  			echo '<li><a href = "'.site_url('index.php/manage/').'">Product Management (Admin)</a></li>';								  		
								  			echo '<li><a href = "'.site_url('auto-email/').'">Auto-email (Admin)</a></li>';
								  			
/*
								  			echo '<li><a href = "'.site_url('account/carthistoryadmin/').'">Cart History (Admin)</a></li>'; //added by Mike, 20171009								  			
								  			echo '<li><a href = "'.site_url('account/requestsummaryadmin/').'">Requests (Admin)</a></li>'; //added by Mike, 20171026
								  			echo '<li><a href = "'.site_url('account/sellsummaryadmin/').'">Sell (Admin)</a></li>'; //added by Mike, 20171030								  		
								  			echo '<li><a href = "'.site_url('account/searchhistoryadmin/').'">Search (Admin)</a></li>'; //added by Mike, 20171105
*/
								  		}/*
								  		else {
								  			echo '<li><a href = "'.site_url('account/ordersummarymerchant/').'">Order Summary (Merchant Admin)</a></li>';								  		
								  		}*/
								  	}
								  	else {
								  		if ($this->session->userdata('merchant_id')!="0") { //true
								  			echo '<li><a href = "'.site_url('account/ordersummarymerchant/').'">Order Summary (Merchant Admin)</a></li>';								  			
								  		}
								  		else {
								  			echo '<li><a href = "'.site_url('account/ordersummary/').'">Order Summary</a></li>';								  		
								  		}
								  	}
								  	
//								  	echo '<li><a href = "'.site_url('account/ordersummary/').'">Order Summary</a></li>';								  
								  	echo '<li><a href = "'.site_url('account/logout/').'">Log Out</a></li>';
								echo '</ul>';
								echo '</div>';
							echo '</div>';
			  			}
				  		else {
				 			echo '<div class="Customer-dropdown">';
				  			echo '<a href = "'.site_url('account/login/').'">';
				  			echo "<b>Login</b>";
				  			echo '</a>';
				 			echo '</div">';
				  		}
				 ?>
			</div>
		  </li>
		  <li>
			<div class="Cart-container">
				<form method="post" action="<?php 
										//added by Mike, 20170627
										if ($this->session->userdata('customer_id')=="") {
											echo site_url('account/login/');									
										}
										else {
											echo site_url('cart/shoppingcart');								
										}
											?>"				
					>
					<button type="submit" class="Button-cart">
							<input type="hidden" id="totalItemsInCartId" 
									value="<?php
												//edited by Mike, 20170916
												$totalQuantity = $this->uri->segment(5);
												if (isset($totalQuantity)) {
													$totalItemsInCart = $totalQuantity;													
												}
												else {
													echo $totalItemsInCart;
												}												
											?>">

							<label class="Text-cart" id="Text-cartId">
								<?php 
									if ($totalItemsInCart<10) {
										echo $totalItemsInCart;
									}
								?>
							</label>
									
							<label class="Text-cart-2digits" id="Text-cart-2digitsId">
								<?php 
									if (($totalItemsInCart>9) && ($totalItemsInCart<100)) {
										echo $totalItemsInCart;
									}
								?>
							</label>

							<label class="Text-cart-3digits" id="Text-cart-3digitsId">
								<?php 
									if ($totalItemsInCart>99) {
										echo $totalItemsInCart;
									}
								?>
							</label>	
							<?php 
								echo '<img src="'.base_url('assets/images/cart_icon_not_empty.png').'">'
							?>
					</button>
				</form>
			</div>    
		  </li>
		</ul>
		</div>
	</nav>	
	<nav class="navbar-static-top categories-navbar">
	  <div class="container-fluid">  
		<ul class="nav navbar-nav">
		  <li><a href = "<?php echo site_url('b/books/')?>">BOOKS</a></li>
		  <li><a href = "<?php echo site_url('b/childrens/')?>">CHILDREN'S</a></li>
		  <li><a href = "<?php echo site_url('b/textbooks/')?>">TEXTBOOKS</a></li>
		  <li><a href = "<?php echo site_url('b/medical/')?>">MEDICAL</a></li>
		  <li><a href = "<?php echo site_url('b/food/')?>">FOOD</a></li>
		  <li><a href = "<?php echo site_url('b/beverages/')?>">BEVERAGES</a></li>
		  <li><a href = "<?php echo site_url('b/comics/')?>">COMICS</a></li>
		  <li><a href = "<?php echo site_url('b/manga/')?>">MANGA</a></li>
		  <li><a href = "<?php echo site_url('b/toys-and-collectibles/')?>">TOYS & COLLECTIBLES</a></li>
		  <li><a href = "<?php echo site_url('b/miscellaneous/')?>">MISCELLANEOUS</a></li>
		  <li><a href = "<?php echo site_url('b/promos/')?>">PROMOS</a></li>
		</ul>
	  </div>
	</nav>	
<!-- 
</body>
</html>
-->
