<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!--
<html lang="en">
<head>
</head>
<body>
 -->
	<h2 class="header">Merchants</h2>	
	<br>
	<?php 
		if (isset($categories)) {
			echo '<div class="container-merchant">';		
		}
		else {
			echo '<div class="container">';			
		}
	?>
		<div class="row">
		<?php 			
			//added by Mike, 20171109
			$customer_id = $this->session->userdata('customer_id');
			$merchant_id = $this->session->userdata('merchant_id');
			$is_admin = $this->session->userdata('is_admin');

			$colCounter = 0;
			foreach ($merchants as $value) {				
				
				$reformattedCategoryName = str_replace(':','',str_replace('\'','', $value['product_type_name'])); //remove ":" and "'"
				$URLFriendlyReformattedCategoryName = str_replace("(","",
				str_replace(")","",
				str_replace("&","and",
				str_replace(',','',
				str_replace(' ','-',
				str_replace('/','-',
				$reformattedCategoryName)))))); //replace "&", " ", and "-"
/*				
				$fileFriendlyCategoryName = str_replace("'","",
				str_replace(" & ","_and_",
				strtolower($value['product_type_name'])));
*/				
				if ($colCounter==0) {
					echo '<div class="row">';	
					echo '<a class="Product-item" href="'.site_url('b/'.strtolower($URLFriendlyReformattedCategoryName).'/'.$value['merchant_id']).'">';
					echo '<div class="col-sm-3 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<span class="Merchant-image"><img class="Image-item" src="'.base_url('assets/images/merchants/'.$value['merchant_name'].'.jpg').'"></span>';
																				
					echo '</a>';					
					echo '</div>';																	
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<a class="Product-item" href="'.site_url('b/'.strtolower($URLFriendlyReformattedCategoryName).'/'.$value['merchant_id']).'">';
					echo '<div class="col-sm-3 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<span class="Merchant-image"><img class="Image-item" src="'.base_url('assets/images/merchants/'.$value['merchant_name'].'.jpg').'"></span>';

					echo '</a>';				
					echo '</div>';													
					
					$colCounter++;
					
					if ($colCounter==3) {
						echo '</div>';						
						echo '<br>';
						
						$colCounter=0;
					}
				}/*
				else {
					echo '</div>';
					$colCounter=0;
				}*/
			}			
			echo '</div>';		
			echo '</div>';
	?>
	</div>	
<!-- 
</body>
</html>
 -->