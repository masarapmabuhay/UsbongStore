<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!-- 
<html lang="en">
<head>
</head>
<body>
-->
	<br>
	<div class="container-product-item">
		<div class="row">
			<div class="col-sm-2 Merchant-category">
<?php 
				$reformattedCategoryName = str_replace(':','',str_replace('\'','', reset($categories)['product_type_name'])); //remove ":" and "'"
				$URLFriendlyReformattedCategoryName = str_replace("(","",
						str_replace(")","",
						str_replace("&","and",
						str_replace(',','',
						str_replace(' ','-',
						str_replace('/','-',
						$reformattedCategoryName)))))); //replace "&", " ", and "-"
									
				echo '<div class="row Merchant-category-image"><a href="'.site_url('b/'.$URLFriendlyReformattedCategoryName.'/'.$result->merchant_id).'"><img class="" src="'.base_url('assets/images/merchants/'.$result->merchant_name.'.jpg').'"></a></div>';

					foreach ($categories as $value) {
						$fileFriendlyCategoryName = str_replace("'","",
													str_replace(" & ","_and_",
														strtolower($value['product_type_name'])));
						echo '<div class="row Merchant-category-content"><a class="Merchant-category-content-link" href="'.site_url('b/'.$fileFriendlyCategoryName.'/'.$value['merchant_id']).'">'.strtoupper($value['product_type_name']).'</a></div>';
					}
				?>
			</div>
			<div class="col-sm-3">	
				<?php 
				
					$reformattedProductName = str_replace(':','',str_replace('\'','',$result->name)); //remove ":" and "'"				
					
					$productType="books"; //default
					switch($result->product_type_id) {
						case 3: //beverages
							$productType="beverages";
							break;
						case 5: //combos
							$productType="promos";
							break;
						case 6: //comics
							$productType="comics";
							break;
						case 7: //manga
							$productType="manga";
							break;
						case 8: //toys & collectibles
							$productType="toys_and_collectibles";
							break;
						case 9: //textbooks
							$productType="textbooks";
							break;						
						case 10: //childrens
							$productType="childrens";
							break;
						case 11: //food
							$productType="food";
							break;						
						case 12: //miscellaneous
							$productType="miscellaneous";
							break;						
					}
				?>
				<img class="Product-image" src="<?php echo base_url('assets/images/'.$productType.'/'.$reformattedProductName.'.jpg');?>">				
				<?php
				if (($productType=="books") || ($productType=="childrens") || ($productType=="textbooks")
							|| ($productType=="manga") || ($productType=="comics")) {
				?>						
				<div class="row Product-format">
					<?php
						echo 'Format: <b>'.$result->format.'</b>';						
					?>
				</div>					
				<div class="row Product-condition">
					<?php
						echo 'Condition: <b>'.$result->description.'</b>';						
					?>
				</div>
				<div class="row Product-language">
					<?php
						echo 'Language: <b>'.$result->language.'</b>';						
					?>
				</div>
				<div class="row Product-pages">
					<?php
					if (isset($result->pages)) {
						echo 'Pages: <b>'.$result->pages.'</b>';					
					}
					?>
				</div>
				<?php 	
					}
				?>
			</div>
			<div class="col-sm-4">	
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
					<div class="Product-overview-content">
					<?php	
						if (!empty($result->product_overview)) {							
							echo $result->product_overview;
						}
						else {
							echo '<br><br><i>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;No synopsis available.</i>';							
						}
					?>
					</div>
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
						echo '&#x20B1;'.$result->price.' [Free Delivery]';
					}
					?>
					</b>					
				</div>						
				<div class="row Product-quantity">
				<?php 
					if ($result->quantity_in_stock<1) {
				?>
						<label class="Quantity-label">Quantity: <span class="Quantity-out-of-stock">out of stock</span></label>						
				<?php						
					}
					else {
				?>
						<label class="Quantity-label">Quantity:</label>
						<input type="tel" id="quantityParam" class="Quantity-textbox no-spin"
							value="1" min="1" max="99" onKeyPress="if(this.value.length==2) {return false;} if(parseInt(this.value)<1) { this.value='1'; return false;}" required>
				<?php 
					}
				?>
				</div>
				<?php 
					if ($result->quantity_in_stock>=1) {
				?>				
					<div class="row Product-purchase-button">				
						<?php 
								//$quantity = 1;
								//TODO: fix quantity and price
									
								echo '<input type="hidden" id="product_idParam" value="'.$result->product_id.'" required>';
								echo '<input type="hidden" id="customer_idParam" value="'.$this->session->userdata('customer_id').'" required>';										
// 								echo '<input type="hidden" id="quantityParam" value="'.$quantity.'" required>';
								echo '<input type="hidden" id="priceParam" value="'.$result->price.'" required>';							
						?>												
						<button onclick="myPopupFunction()" class="Button-purchase">ADD TO CART</button>				
						
						<div>					
						<br>
							<img class="Product-item-page-image-offers-save-more" src="<?php echo base_url('assets/images/usbongOffersBuyMoreSaveMore_L.jpg')?>">
						</div>															
						
						<div id="myPopup" class="popup-content">
							<div class="row">
								<div class="col-sm-4">									
									<img class="Popup-product-image" src="<?php echo base_url('assets/images/'.$productType.'/'.$reformattedProductName.'.jpg');?>">				
								</div>
								<div class="col-sm-8 Popup-product-details">
									<span id="quantityId"></span>
									<?php 
									
/*									
										$quantity=1;
										if ($quantity>1) {
											echo 'Added<b>'.$quantity.'</b> copies of ';									
										}
										else {
											echo 'Added <b>1</b> copy of ';
										}
*/										
										echo '<b>'.$result->name.'</b>!'
									?>
									<br><b>Total Amt: </b>
									<label class="Popup-product-price">&#x20B1;<span id="productPriceId"><?php echo $result->price;?></span></label>
									<label class="Popup-product-free-delivery"><br>[Free Delivery]</label> 												
								<form method="post" action="<?php echo site_url('cart/shoppingcart')?>">
									<button type="submit" class="Button-view-cart">
										View Cart 
									</button>
								</form>						
								</div>
							</div>
						</div>					
					</div>												
				<?php 
					}
					else {
				?>
					<br><br>
					<div>						
					<a class="Request-link" href="<?php echo site_url('request/')?>"><img class="Product-item-page-image-offers-request" src="<?php echo base_url('assets/images/usbongOffersRequest_L.jpg')?>"></a>
					</div>	
				<?php 						
					}
				?>				
			</div>
		</div>	
	</div>		
<!-- 
</body>
</html>
-->