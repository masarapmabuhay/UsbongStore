<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!-- 
<html lang="en">
<head>
</head>
<body>
-->
	<h2 class="header">Customer Details (Admin) | Customer: <?php echo $customer_email_address;?></h2>
	<br>		
		<div class="row">
			<div class="col-sm-3 Account-settings">
					<div class="row Account-settings-subject-header">Orders</div>
					<div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/ordersummaryadmin/')?>">Order Summary (Admin)</a></div>				
					<div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/carthistoryadmin/')?>">Cart History (Admin)</a></div>				
					<div class="row Account-settings-subject-header">Settings</div>
					<div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/settings/')?>">Update Information</a></div>
					<div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/updatepassword/')?>">Update Password</a></div>
			</div>
			<div class="col-sm-9">		
				<?php 
					if (count($cart_history)==0) {
						echo '<div class="Order-Summary-noResult">';
						echo 'The customer has made no orders yet.';
						echo '</div>';
					}
					else {
				?>
					<div class="Customer-details-container">
					<div class="row">
						<div class="col-sm-9 Customer-order-summary">		
							<h3>Orders</h3>
							<div>
								<div class="row">
									<div class="col-sm-2 Order-summary col-sm-offset-2">		
										<b>Date Added</b>
									</div>
									<div class="col-sm-3 Order-summary">		
										<b>Product Name</b>
									</div>
									<div class="col-sm-2 Order-summary">		
										<b># of Items</b>
									</div>
									<div class="col-sm-2 Order-summary">		
										<b>Price</b>
									</div>
									<div class="col-sm-2 Order-summary">		
										<b>Purchased?</b>
									</div>
								</div>
								<?php 
									$counter=0;
									foreach ($cart_history as $value) {										
										//added by Mike, 20171009
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
																				
										echo '<div class="row">';
											if ($counter!=0) {
												echo '<div class="col-sm-2 Order-summary-alternate col-sm-offset-2">';
												echo date_format(date_create($value['added_datetime_stamp']),'m/d/Y');
												echo '</div>';
												
												echo '<div class="col-sm-3 Order-summary-alternate">';
			//									echo strtotime($value['added_datetime_stamp']);
//												$date = new DateTime($value['added_datetime_stamp'], new DateTimeZone("Asia/Hong_Kong"));
//												$timestamp = $date->format('U');
//												echo $timestamp;
												echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';	
												
												$trimmedName = "";
												if (strlen($value['name'])>16) {
													$trimmedName = trim(substr($value['name'],0,16))."...";
													echo $trimmedName;
												}
												else {
													echo $value['name'];
												}														
//												echo '<b>'.$value['name'].'</b>';

												echo '</a>';
												echo '</div>';
												
												echo '<div class="col-sm-2 Order-summary-alternate">';
												echo $value['quantity'];
												echo '</div>';

//												$orderTotal = ($value['order_total_price']-$value['order_total_discount']);
																								
												$orderTotal = $value['quantity']*$value['price'];
												
												echo '<div class="col-sm-2 Order-summary-alternate">';
												echo '<span class="Order-summary-order-total">&#x20B1;'.$orderTotal.'</span>';
												echo '</div>';
																								
												echo '<div class="col-sm-2 Order-summary-alternate">';
												if ($value['purchased_datetime_stamp']==0) {
													echo '<span class="Fulfilled-Status-Not-OK">&ensp;Not Yet&ensp;</span>';
												}
												else {
													echo '<span class="Fulfilled-Status-OK">';
													echo date_format(date_create($value['purchased_datetime_stamp']),'m/d/Y');													
													echo '</span>';												
												}												
												echo '</div>';
												
											}
											else {
												echo '<div class="col-sm-2 Order-summary col-sm-offset-2">';
												echo date_format(date_create($value['added_datetime_stamp']),'m/d/Y');
												echo '</div>';
												
												echo '<div class="col-sm-3 Order-summary">';
			//									echo strtotime($value['added_datetime_stamp']);
/*												$date = new DateTime($value['added_datetime_stamp'], new DateTimeZone("Asia/Hong_Kong"));
												$timestamp = $date->format('U');
*/												
//												echo $timestamp;
//												echo '<b><a class="Order-details-order-number-link" href="'.site_url('account/orderdetailsadmin/'.$timestamp).'/'.$value['customer_id'].'">'.$timestamp.'</a></b>';											
												echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
												
												$trimmedName = "";
												if (strlen($value['name'])>16) {
													$trimmedName = trim(substr($value['name'],0,16))."...";
													echo $trimmedName;
												}
												else {
													echo $value['name'];
												}												
//												echo '<b>'.$value['name'].'</b>';												
												echo '</a>';
												echo '</div>';
												
												echo '<div class="col-sm-2 Order-summary">';
												echo $value['quantity'];
												echo '</div>';
												
//												$orderTotal = ($value['order_total_price']-$value['order_total_discount']);
												$orderTotal = $value['quantity']*$value['price'];
												
												echo '<div class="col-sm-2 Order-summary">';
												echo '<span class="Order-summary-order-total">&#x20B1;'.$orderTotal.'</span>';
												echo '</div>';
																																				
												echo '<div class="col-sm-2 Order-summary">';
												if ($value['purchased_datetime_stamp']==0) {
													echo '<span class="Fulfilled-Status-Not-OK">&ensp;Not Yet&ensp;</span>';
												}
												else {
													echo '<span class="Fulfilled-Status-OK">';
													echo date_format(date_create($value['purchased_datetime_stamp']),'m/d/Y');
													echo '</span>';
												}
												echo '</div>';												
											}
											
											$counter=($counter+1)%2;
											
										echo '</div>';		
									}
								?>					
							</div>
						</div>
						<div class="col-sm-3 Customer-details">		
								<div class="Order-details-shipping-address">
									<h3><b>Contact Number:</b></h3>
									<?php 
										echo $result->customer_contact_number.'<br>';				
									?>
								</div>

								<div class="Order-details-shipping-address">
									<h3><b>Payment Method:</b></h3>
									<?php 
										if ($result->mode_of_payment_id==0) {
											echo 'Bank Deposit<br>';
										}
										else if ($result->mode_of_payment_id==1) {
											echo 'Paypal<br>';
										}
										else {
											echo 'Cash upon Meetup at MOSC<br>(Marikina Orthopedic Specialty Clinic)<br>';
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
				<?php		
					}
				?>		
			</div>
			
					
				</div>
			</div>
		</div>
	</div>
	<br>
<!-- 
</body>
</html>
-->