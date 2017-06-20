<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>		
	<nav class="navbar navbar-inverse navbar-static-top">
	  <div class="container-fluid">
		<ul class="nav navbar-nav">
		  <li><div class="usbongLogo"><a href = "<?php echo site_url('/')?>"><img src="<?php echo base_url('assets/images/usbongStoreBrandLogo.png'); ?>"></a></div></li>
		  <li><div class="Search-container">
					<form method="get" action="<?php echo site_url('browse/search')?>">
					<?php if ((isset($param)) && ($param!="")) {
						echo '<input type="text" class="Search-input" placeholder="I\'m looking for..." value="'.$param.'" name="param" required>';
					}
					else { //default
						echo '<input type="text" class="Search-input" placeholder="I\'m looking for..." name="param" required>';
					}
					?>
					</form>
			  </div></li>
		  <li><a href = "<?php echo site_url('b/books/')?>">BOOKS</a></li>
		  <li><a href = "<?php echo site_url('b/combos/')?>">COMBOS</a></li>
		  <li><a href = "<?php echo site_url('b/beverages/')?>">BEVERAGES</a></li>
		  <li><a href = "<?php echo site_url('b/comics/')?>">COMICS</a></a></li>
		  <li><a href = "<?php echo site_url('b/manga/')?>">MANGA</a></a></li>
		  <li><a href = "<?php echo site_url('b/toys-and-collectibles/')?>">TOYS & COLLECTIBLES</a></a></li>
		</ul>		
		<div class="navbar-header">
			<div class="Topbar-container">
			  	<div class="Login-container">			  		
			  		<?php 
				  		//if (isset($customer_data['customer_first_name'])) {
			  			if (($this->session->has_userdata('customer_first_name')!==null) &&
			  				(!empty($this->session->userdata('customer_first_name')))) {
			  				echo "Hi, ".$this->session->userdata('customer_first_name')."!";
				  		}
				  		else {
				  			echo '<a href = "'.site_url('account/login/').'">';
				  			echo "Login";
				  			echo '</a>';
				  		}
			  		?>
			  	</div>		  
				 <div class="Cart-container">
					<form method="post" action="<?php echo site_url('cart/shoppingcart')?>">
						<button type="submit" class="Button-cart">
							<img src="<?php echo base_url('assets/images/cart_icon.png'); ?>">	
						</button>
					</form>
				</div>    
		  </div>
	  </div>	  
	</nav>	
</body>
</html>
