<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<h2 class="header">Order #<?php echo $this->uri->segment(3);?></h2>
	<br>
	<div>
		<div class="row">
			<div class="col-sm-9 Order-details">				
				<?php 	$addedDateTimeStamp = date('F j, Y H:i A', $this->uri->segment(3));		
						echo '<div class="Order-details-purchased-datetime-stamp">'.$addedDateTimeStamp.'</div>';
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 Order-details">		
				<?php 
//					echo count($order_details).'items';
					$count=0;
					foreach ($order_details as $value) {
						$count+=$value['quantity'];
					}
					
					if ($count>1) {
						echo $count." items";						
					}
					else {
						echo "1 item";
					}
						
					foreach ($order_details as $value) {
						$counter = 0;						
						while ($counter<$value['quantity']) {							
							$reformattedBookName = str_replace(':','',str_replace('\'','',$value['name'])); //remove ":" and "'"
							$URLFriendlyReformattedBookName = str_replace("(","",
																str_replace(")","",
																str_replace("&","and",
																str_replace(',','',
																str_replace(' ','-',
																$reformattedBookName))))); //replace "&", " ", and "-"
							$URLFriendlyReformattedBookAuthor = str_replace("(","",
																	str_replace(")","",
																	str_replace("&","and",
																	str_replace(',','',
																	str_replace(' ','-',
																	$value['author']))))); //replace "&", " ", and "-"
							
							echo '<div class="row Order-details-product">';
							echo	'<div class="col-sm-6 Order-details">';
							echo 	'<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedBookName.'-'.$URLFriendlyReformattedBookAuthor.'/'.$value['product_id']).'">';
							echo	'<b>'.$value['name'].'</b>';
							echo	'</a>';
							echo 	'</div>';
							echo	'<div class="col-sm-5 Order-details">';
							echo	'<div class="Order-details-align-right">&#x20B1;'.$value['price'].'</div>';
							echo	'</div>';
							echo '</div>';			
							
							$counter++;
						}				
					}
					echo '<div class="row">';
					echo	'<div class="col-sm-6 Order-details">';
					echo	'<div class="Order-details-align-right">Order Subtotal</div>';				
					echo 	'</div>';
					echo	'<div class="col-sm-5 Order-details">';
					echo	'<div class="Order-details-align-right">&#x20B1;'.$order_details['order_total_price'].'</div>';				
					echo	'</div>';
					echo '</div>';
					
					echo '<div class="row">';
					echo	'<div class="col-sm-6 Order-details">';
					echo	'<div class="Order-details-align-right">Shipping (PH)</div>';					
					echo 	'</div>';
					echo	'<div class="col-sm-5 Order-details">';
					echo	'<div class="Order-details-align-right"><b>FREE</b></div>';
					echo	'</div>';
					echo '</div>';
					
					echo '<div class="row Order-details-product">';
					echo	'<div class="col-sm-6 Order-details">';
					echo    '<div class="Order-details-align-right">Order Total</div>';
					echo 	'</div>';
					echo	'<div class="col-sm-5 Order-details">';
					echo	'<div class="Order-details-align-right-order-total">&#x20B1;'.$order_details['order_total_price'].'</div>';
					echo	'</div>';
					echo '</div>';
					
				?>
				
			</div>
			<div class="col-sm-3 Order-details">		
			<div class="Order-details-shipping-address">
				<h3><b>Payment Method:</b></h3>
				<?php 
					if ($result->mode_of_payment_id==0) {
						echo 'Bank Deposit<br>';
					}
					else {
						echo 'Paypal<br>';					
					}
				?>
			</div>

			<div class="Order-details-shipping-address">
				<h3><b>Shipped To:</b></h3>
				<?php 
					echo $result->customer_first_name.' '.$result->customer_last_name.'<br>';				
					echo $result->customer_shipping_address.'<br>';
					echo $result->customer_city.', '.$result->customer_postal_code.',<br>';
					echo $result->customer_country.'<br>';					
				?>
			</div>
			</div>
		</div>
	</div>
	<br>
</body>
</html>