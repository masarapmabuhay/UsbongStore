<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!-- 
<html lang="en">
<head>
</head>
<body>
-->
	<h2 class="header">Toys & Collectibles</h2>	
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
		
			if (isset($categories)) {						
				//added by Mike, 20170903
				$reformattedCategoryName = str_replace(':','',str_replace('\'','', reset($categories)['product_type_name'])); //remove ":" and "'"
				$URLFriendlyReformattedCategoryName = str_replace("(","",
				str_replace(")","",
				str_replace("&","and",
				str_replace(',','',
				str_replace(' ','-',
				str_replace('/','-',
				$reformattedCategoryName)))))); //replace "&", " ", and "-"
																
				echo '<div class="col-sm-2 Merchant-category-b">';						
				echo '<div class="row Merchant-category-image"><a href="'.site_url('b/'.$URLFriendlyReformattedCategoryName.'/'.$this->uri->segment(3)).'"><img class="" src="'.base_url('assets/images/merchants/'.$result->merchant_name.'.jpg').'"></a></div>';
				
					foreach ($categories as $value) {
						$fileFriendlyCategoryName = str_replace("'","",
								str_replace(" & ","_and_",
										strtolower($value['product_type_name'])));
						echo '<div class="row Merchant-category-content"><a class="Merchant-category-content-link" href="'.site_url('b/'.$fileFriendlyCategoryName.'/'.$value['merchant_id']).'">'.strtoupper($value['product_type_name']).'</a></div>';
					}
					
				echo '</div>';
				
				echo '<div class="col-sm-9 Merchant-products">';						
			}					

			$colCounter = 0;
			foreach ($toys_and_collectibles as $value) {
				$reformattedProductName = str_replace(':','',str_replace('\'','',$value['name'])); //remove ":" and "'"
				$URLFriendlyReformattedProductName = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$reformattedProductName)))))); //replace "&", " ", and "-"
				$URLFriendlyReformattedProductAuthor = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$value['author'])))))); //replace "&", " ", and "-"
				
				if ($colCounter==0) {
					echo '<div class="row">';	
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/toys_and_collectibles/'.$reformattedProductName.'.jpg').'">';

					//edited by Mike, 20170902
					$trimmedName = $value['name'];
					if (strlen($value['name'])>40) {
						$trimmedName = trim(substr($value['name'],0,40))."...";
					}
					echo '<br><div id="Product-item-titleOnly" class="Product-item-titleOnly">'.$trimmedName.'</div>';
					echo '<label class="Product-item-details">';
										
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';

						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
												
//						echo '</label>';					
					}
					else {
						echo '<label class="Product-item-price">out of stock</label>';					
//						echo '</label>';
					}			
					
					//edited by Mike, 20171109
					if (($customer_id!="-1") &&
					($is_admin=="1")) {
						echo '<br><label class="Product-item-view-num">View Num: '.$value['product_view_num'].'</label>';
					}
					else {
						//added by Mike, 20171109
						foreach ($merchant_customer_categories as $v) {
							if ($v['product_type_name']=='Books') {
								echo '<br><label class="Product-item-view-num">View Num: '.$value['product_view_num'].'</label>';
							}
						}
					}
					
					echo '</label>';
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/toys_and_collectibles/'.$reformattedProductName.'.jpg').'">';

					//edited by Mike, 20170902
					$trimmedName = $value['name'];
					if (strlen($value['name'])>40) {
						$trimmedName = trim(substr($value['name'],0,40))."...";
					}
					echo '<br><div id="Product-item-titleOnly" class="Product-item-titleOnly">'.$trimmedName.'</div>';
					echo '<label class="Product-item-details">';
										
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';

						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
												
//						echo '</label>';
					}
					else {
						echo '<label class="Product-item-price">out of stock</label>';
//						echo '</label>';
					}
					
					//edited by Mike, 20171109
					if (($customer_id!="-1") &&
					($is_admin=="1")) {
						echo '<br><label class="Product-item-view-num">View Num: '.$value['product_view_num'].'</label>';
					}
					else {
						//added by Mike, 20171109
						foreach ($merchant_customer_categories as $v) {
							if ($v['product_type_name']=='Books') {
								echo '<br><label class="Product-item-view-num">View Num: '.$value['product_view_num'].'</label>';
							}
						}
					}
					
					echo '</label>';
					echo '</a>';
					echo '</div>';					
					$colCounter++;
					
					if ($colCounter==5) {
						echo '</div>';
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
			
			if (isset($categories)) {
				echo '</div><br>';
			}			
	?>
	</div>	
<!-- 
</body>
</html>
-->