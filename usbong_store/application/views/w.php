<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<h3 class="header">Product Item</h3>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">	
				<img class="Product-image" src="<?php echo base_url('assets/images/books/Le Petit Prince.jpg');?>">	
			</div>
			<div class="col-sm-5">	
				<div class="row Product-name">
					The Little Prince					
				</div>
				<div class="row Product-author">
					<b>Antoine de Saint-Exupéry</b>
				</div>				
				<div class="row Product-price">
					<b>₱500</b><br>
					[Free Delivery]
				</div>				
			</div>
			<div class="col-sm-3">	
				<div class="row Product-quantity">
					<label class="Quantity-label">Quantity:</label>
					<div class="dropdown">
					  <button onclick="myFunction()" class="dropbtn">1</button>
					  <div id="myDropdown" class="dropdown-content">
					    <a href="#">1</a>
					    <a href="#">2</a>
					    <a href="#">3</a>
					  </div>
					</div>
				</div>
				<div class="row Product-purchase-button">
					<button type="submit" class="Button-purchase">
 						ADD TO CART
					</button>				
				</div>				
			</div>
		</div>			
	</div>		
</body>
</html>
