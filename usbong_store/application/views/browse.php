<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<h3 class="header">Search</h3>
	<br>
	<?php 
		$resultCount = count($result);
		if ($resultCount==0) {
			echo '<div class="Search-noResult">';
			echo 'Your search <b>- '.$param.' -</b> did not match any of our products.';
			echo '<br><br>Suggesion:';
			echo '<br>・ Make sure that all words are spelled correctly.';				
			echo '</div>';
		}
		else {
			if ($resultCount==1) {
				echo '<div class="Search-result"><b>'.count($result).'</b> result found.</div>';
			}
			else {
				echo '<div class="Search-result"><b>'.count($result).'</b> results found.</div>';			
			}
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
									echo $value['name'];
								?>
							</div>
							<div class="row Product-author">
								<b>
								<?php
									echo $value['author'];
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
								if (trim($value['price'])=='') {
									echo 'out of stock';						
								}
								else {
									echo '₱'.$value['price'].' [Free Delivery]';
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