<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<h3 class="header">Shopping Cart</h3>
	<br>
	<?php 
		$resultCount = 0;//count($result);
		if ($resultCount==0) {
			echo '<div class="Cart-noResult">';
			echo 'It is currently empty.';
			echo '</div>';
		}
		else {
	?>
		<div class="container">
			<?php
				$colCounter = 0;
				foreach ($result as $value) {
					$reformattedProductName = str_replace(':','',str_replace('\'','',$value['name'])); //remove ":" and "'"
					$URLFriendlyReformattedProductName = str_replace(',','',str_replace(' ','-',$reformattedProductName)); //replace " " and "-"
					$URLFriendlyReformattedBookAuthor = str_replace(',','',str_replace(' ','-',$value['author'])); //replace " " and "-"
					
					$productType="books"; //default
					switch($value['product_type_id']) {
						case 3: //beverages
							$productType="beverages";
							break;
						case 5: //combos
							$productType="combos";
							break;
						case 6: //comics
							$productType="comics";
							break;
						case 7: //manga
							$productType="manga";
							break;
						case 8: //toys & collectibles
							$productType="toy_and_collectibles";
							break;
					}
				?>
					<div class="row">
						<div class="col-sm-3">	
							<img class="Product-image" src="<?php echo base_url('assets/images/'.$productType.'/'.$reformattedProductName.'.jpg');?>">				
						</div>
						<div class="col-sm-5">	
							<div class="row Product-name">							
								<?php
									echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedBookAuthor.'/'.$value['product_id']).'">';
									echo $value['name'];
									echo '</a>';
								?>
							</div>
							<div class="row Product-author">
								<b>
								<?php
									echo $value['author'];
								?>
								</b>
							</div>				
						</div>
						<div class="col-sm-3">	
							<div class="row Product-price">
								<b>
								<?php
								if (trim($value['price'])=='') {
									echo 'out of stock';						
								}
								else {
									echo '&#x20B1;'.$value['price'].' [Free Delivery]';
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
					<hr class="horizontal-line">
				<?php 
				  }
				?>					
			</div>		
			<?php 
			  }
			?>					
</body>
</html>