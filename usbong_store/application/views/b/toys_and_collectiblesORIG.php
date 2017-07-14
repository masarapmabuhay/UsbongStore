<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<h3 class="header">Toys & Collectibles</h3>
	<br>
	<div class="container">
	<?php
			$colCounter = 0;
			foreach ($toys_and_collectibles as $value) {
				$reformattedToys_and_CollectiblesName = str_replace(':','',str_replace('\'','',$value['name'])); //remove ":" and "'"
				if ($colCounter==0) {
					echo '<div class="row">';	
					echo '<div class="col-sm-3 Product-item">';
					echo '<img class="Image-item" src="'.base_url('assets/images/toys_and_collectibles/'.$reformattedToys_and_CollectiblesName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';

					if ($value['price']!=null) {
						echo '<label class="Product-item-price">₱'.$value['price'].'</label>';
						echo '</label>';
					}
					else {
						echo '<label class="Product-item-price">out of stock</label>';
						echo '</label>';
					}
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<4){
					echo '<div class="col-sm-3 Product-item">';
					echo '<img class="Image-item" src="'.base_url('assets/images/toys_and_Collectibles/'.$reformattedToys_and_CollectiblesName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
					
					if ($value['price']!=null) {
						echo '<label class="Product-item-price">₱'.$value['price'].'</label>';
						echo '</label>';
					}
					else {
						echo '<label class="Product-item-price">out of stock</label>';
						echo '</label>';
					}
					echo '</div>';
					$colCounter++;
				}
				else {
					echo '</div>';
					$colCounter=0;
				}
			}
			echo '</div>';			
	?>
	</div>
</body>
</html>
