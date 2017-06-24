<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">	
				<?php 
					$reformattedBookName = str_replace(':','',str_replace('\'','',$result->name)); //remove ":" and "'"				
				?>
				<img class="Product-image" src="<?php echo base_url('assets/images/books/'.$reformattedBookName.'.jpg');?>">				
			</div>
			<div class="col-sm-5">	
				<div class="row Product-name">
					<?php
						echo $result->name;
					?>
				</div>
				<div class="row Product-author">
					<b>
					<?php
						echo $result->author;
					?>
					</b>
				</div>				
				<div class="row">	
					<div class="Product-overview-header"><b>Product Overview</b><br></div>
					<div class="Product-overview-content">This book's often quoted phrase, «On ne voit bien qu’avec le cœur. L’essentiel est invisible pour les yeux.  (We can only see well with our hearts. What is essential is invisible to the eye.)» reminds us that a person can be vain, difficult, and demanding, but it is the quality time that we spent for that person that makes him or her special and unique from all the other persons in the world.</div>
				</div>		
			</div>
			<div class="col-sm-3">	
				<div class="row Product-price">
					<b>
					<?php
					if (trim($result->price)=='') {
						echo 'out of stock';						
					}
					else {
						echo '₱'.$result->price.' [Free Delivery]';
					}
					?>
					</b>					
				</div>					
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
