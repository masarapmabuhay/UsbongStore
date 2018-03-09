<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!-- 
<html lang="en">
<head>
</head>
<body>
-->
	<div class="Uplift-container">
	<button onclick="upliftFunction()" class="Uplift-button" >Uplift</button>
	</div>
	<div class="Footer-container">
		<div class="row">
			<div class="col-sm-4">						
				<ul class="Footer-container-list">
					<li><span class="Footer-list-header"><b>Categories</b></span></li>					
					<li><a class="Footer-list-item" href = "<?php echo site_url('b/books/')?>">BOOKS</a></li>
					<li><a class="Footer-list-item" href = "<?php echo site_url('b/childrens/')?>">CHILDREN'S</a></li>
					<li><a class="Footer-list-item" href = "<?php echo site_url('b/textbooks/')?>">TEXTBOOKS</a></li>
				    <li><a class="Footer-list-item" href = "<?php echo site_url('b/medical/')?>">MEDICAL</a></li>
				    <li><a class="Footer-list-item" href = "<?php echo site_url('b/food/')?>">FOOD</a></li>
				    <li><a class="Footer-list-item" href = "<?php echo site_url('b/beverages/')?>">BEVERAGES</a></li>
				    <li><a class="Footer-list-item" href = "<?php echo site_url('b/comics/')?>">COMICS</a></li>
				    <li><a class="Footer-list-item" href = "<?php echo site_url('b/manga/')?>">MANGA</a></li>
				    <li><a class="Footer-list-item" href = "<?php echo site_url('b/toys-and-collectibles/')?>">TOYS & COLLECTIBLES</a></li>
				    <li><a class="Footer-list-item" href = "<?php echo site_url('b/Miscellaneous/')?>">MISCELLANEOUS</a></li>
				    <li><a class="Footer-list-item" href = "<?php echo site_url('b/promos/')?>">PROMOS</a></li>
				</ul>
			</div>
			<div class="col-sm-4">
				<ul class="Footer-container-list">
					<li><span class="Footer-list-header"><b>Mobile App</b></span></li>					
					<li><a class="Footer-list-item" href = "https://play.google.com/store/apps/details?id=usbong.android.store_app" target="_blank">Usbong Store App</a></li>
					<li><a class="Footer-list-item" href = ""><br></a></li>					
					<li><span class="Footer-list-header"><b>My Account</b></span></li>					
					<li><a class="Footer-list-item" href = "<?php echo site_url('account/settings/')?>">Settings</a></li>	
					<li><a class="Footer-list-item" href = "<?php 
																//added by Mike, 20170627
																if ($this->session->userdata('customer_id')=="") {
																	echo site_url('account/login/');									
																}
																else {
																	echo site_url('cart/shoppingcart');								
																}
															?>">Shopping Cart</a></li>					
					<li><a class="Footer-list-item" href = "<?php echo site_url('account/ordersummary/')?>">Order Summary</a></li>					
				</ul>
			</div>
			<div class="col-sm-4">		
				<ul class="Footer-container-list">
					<li><span class="Footer-list-header"><b>Information</b></span></li>					
					<li><a class="Footer-list-item" href ="http://www.usbong.ph" target="_blank">USBONG.PH</a></li>					
					<li><a class="Footer-list-item" href ="https://www.facebook.com/usbongschool" target="_blank">Usbong School</a></li>					
					<li><a class="Footer-list-item" href ="<?php echo site_url('privacy/')?>" target="_blank">Privacy Policy</a></li>					
					<li><a class="Footer-list-item" href = ""><br></a></li>					
					<li><span class="Footer-list-header"><b>Quick Help</b></span></li>					
					<li><a class="Footer-list-item" href = "<?php echo site_url('help/')?>">Help & Support</a></li>					
					<li><a class="Footer-list-item" href = "<?php echo site_url('sell/')?>">Sell Item</a></li>					
					<li><a class="Footer-list-item" href = "<?php echo site_url('request/b/b')?>">Request Item</a></li>					
					<li><a class="Footer-list-item" href = "<?php echo site_url('contact/')?>">Contact Usbong</a></li>					
					<li><br><a class="Footer-list-item" href = "<?php echo site_url('sitesecurity/')?>"><img src="<?php echo base_url('assets/images/RapidSSL_SEAL-90x50.gif'); ?>"></a></li>					
				</ul>
			</div>			
		</div>		
		<p class="footer">© Usbong Social Systems, Inc. 2011∼2018. All rights reserved.
		</p>
	</div>
</body>
</html>
