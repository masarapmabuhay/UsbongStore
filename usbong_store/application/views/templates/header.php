<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
		<div class="Topbar-container">
		    <div class="Cart-container">
				<button type="button" class="Button-cart" onclick="<?php echo site_url('browse/search/')?>">
					<img src="<?php echo base_url('assets/images/cart_icon.png'); ?>">	
				</button>
			</div>    
			<div class="Search-container">
				<form method="get" action="<?php echo site_url('browse/search')?>">
				<?php if (isset($param)) {
					echo '<input type="text" class="Search-input" placeholder="I\'m looking for..." value="'.$param.'" name="param">';
				}
				else { //default
					echo '<input type="text" class="Search-input" placeholder="I\'m looking for..." name="param">';
				}
				?>
				<div class="Button-container">
					<button type="submit" class="Button">
						<img src="<?php echo base_url('assets/images/magnifying_glass.png'); ?>">
					</button>
				</div>
				</form>
		    </div>
	    </div>
	<nav class="navbar navbar">
	  <div class="container-fluid">
		<ul class="nav navbar-nav">
		  <li class="active"><a href = "<?php echo site_url('b/books/')?>">BOOKS</a></li>
		  <li><a href = "<?php echo site_url('b/combos/')?>">COMBOS</a></li>
		  <li><a href = "<?php echo site_url('b/beverages/')?>">BEVERAGES</a></li>
		  <li><a href = "<?php echo site_url('b/comics/')?>">COMICS</a></a></li>
		  <li><a href = "<?php echo site_url('b/manga/')?>">MANGA</a></a></li>
		  <li><a href = "<?php echo site_url('b/toys-and-collectibles/')?>">TOYS & COLLECTIBLES</a></a></li>
		  </ul>
	  </div>
	</nav>	
</body>
</html>
