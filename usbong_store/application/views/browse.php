<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<h3>Search</h3>
	<br>
	<div class="container">
	<?php
			$colCounter = 0;
			foreach ($result as $value) {
				$reformattedResultName = str_replace(':','',str_replace('\'','',$value['name'])); //remove ":" and "'"
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
				
				if ($colCounter==0) {
					echo '<div class="row">';	
// 					echo '<div class="col-sm-3">'.$value['name'].'</div>';
					echo '<div class="col-sm-3">';					
					echo '<img class="Image-item" src="'.base_url('assets/images/'.$productType.'/'.$reformattedResultName.'.jpg').'">';										
//					echo '<img class="Image-item" src="'.base_url('assets/images/books/'.$reformattedResultName.'.jpg').'">';
					echo '<br>'.$value['name'];
					echo '<br>'.$value['author'];			
					
					if ($value['price']!=null) {
						echo '<br>₱'.$value['price'].'</div>';
					}
					else {
						echo '<br>out of stock</div>';					
					}
					$colCounter++;				
				}
				else if ($colCounter<4){
// 					echo '<div class="col-sm-3">'.$value['name'].'</div>';
					echo '<div class="col-sm-3">';
					echo '<img class="Image-item" src="'.base_url('assets/images/'.$productType.'/'.$reformattedResultName.'.jpg').'">';
					echo '<br>'.$value['name'];
					echo '<br>'.$value['author'];
					
					if ($value['price']!=null) {
						echo '<br>₱'.$value['price'].'</div>';
					}
					else {
						echo '<br>out of stock</div>';
					}
					$colCounter++;
				}
				else {
					echo '</div>';
					$colCounter=0;
				}
			}
	?>
	</div>	
	
	
</body>
</html>
