<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<h2 class="header">Order Summary (Merchant): <?php echo $merchant_name?></h2>
	<br>
	<div>
		<div class="row">
			<div class="col-sm-3 Account-settings">
					<div class="row Account-settings-subject-header">Orders</div>
					<div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/ordersummarymerchant/')?>">Order Summary (Merch.)</a></div>				
					<div class="row Account-settings-subject-header">Settings</div>
					<div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/settingsmerchant/')?>">Update Information</a></div>
					<div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/updatepasswordmerchant/')?>">Update Password</a></div>
			</div>
			<div class="col-sm-9">		
				<?php 
					if (count($order_summary)==0) {
						echo '<div class="Order-Summary-noResult">';
						echo 'No customer has made any orders yet.';
						echo '</div>';
					}
					else {
				?>
					<div class="row">
						<div class="col-sm-1 Order-summary">		
						</div>
						<div class="col-sm-10 Order-summary">		
							<h3>Orders</h3>
							<div>
								<div class="row">
									<div class="col-sm-2 Order-summary">		
										<b>Date</b>
									</div>
									<div class="col-sm-2 Order-summary">		
										<b>Order #</b>
									</div>
									<div class="col-sm-2 Order-summary">		
										<b>Order Name</b>
									</div>
									<div class="col-sm-2 Order-summary">		
										<b># of Items</b>
									</div>
									<div class="col-sm-2 Order-summary">		
										<b>Price</b>
									</div>
									<div class="col-sm-2 Order-summary">		
										<b>Fulfilled?</b>
									</div>
								</div>
								<?php 
									$counter=0;
									$currentPurchasedDateTimeStamp = "";//added by Mike, 20170923
									
									foreach ($order_summary as $value) {										
//									foreach ($order_details as $value) {								
										//added by Mike, 20170923
										if ($currentPurchasedDateTimeStamp==$value['purchased_datetime_stamp']) {
											continue;
										}
										else {
											$currentPurchasedDateTimeStamp = $value['purchased_datetime_stamp'];										
										}
									
										echo '<div class="row">';
											if ($counter!=0) {
												echo '<div class="col-sm-2 Order-summary-alternate">';
												echo date_format(date_create($value['purchased_datetime_stamp']),'m/d/Y');
												echo '</div>';
												
												echo '<div class="col-sm-2 Order-summary-alternate">';
			//									echo strtotime($value['added_datetime_stamp']);
												$date = new DateTime($value['purchased_datetime_stamp'], new DateTimeZone("Asia/Hong_Kong"));
												$timestamp = $date->format('U');
//												echo $timestamp;
												echo '<b><a class="Order-details-order-number-link" href="'.site_url('account/orderdetailsmerchant/'.$timestamp).'/'.$value['customer_id'].'">'.$timestamp.'</a></b>';
												echo '</div>';

												echo '<div class="col-sm-2 Order-summary-alternate">';
												$trimmedName = "";												
												if (strlen($value['name'])>10) {
													$trimmedName = trim(substr($value['name'],0,10))."...";
													echo $trimmedName;
												}
												else {
													echo $value['name'];
												}												
//												echo $value['name'];												
												echo '</div>';
																								
												echo '<div class="col-sm-2 Order-summary-alternate">';
/*
												$count=0;
												foreach ($value as $v) {
													$count+=$v['quantity'];
												}																			
*/												
												$count=0;
												foreach ($order_summary as $v1) {
													$i=0;
													foreach ($v1 as $v2) {
														if ($i==0) {
															if ($v2==$value['purchased_datetime_stamp']) {
																$count++;
															}
														}
														$i++;
													}
												}
												echo $count;
												
//												echo $value['quantity'];
/*												echo $count;
*/												
												echo '</div>';
												
												$orderTotal = $value['order_total_price'];
												
												echo '<div class="col-sm-2 Order-summary-alternate offset-col-sm-2">';
												echo '<span class="Order-summary-order-total">&#x20B1;'.$orderTotal.'</span>';
												echo '</div>';
												
												echo '<div class="col-sm-2 Order-summary-alternate offset-col-sm-2">';
												if ($value['fulfilled_status']==0) {
													echo '<span class="Fulfilled-Status-Not-OK">&ensp;Not Yet&ensp;</span>';
												}
												else {
													echo '<span class="Fulfilled-Status-OK">&ensp;OK&ensp;</span>';												
												}												
												echo '</div>';
												
											}
											else {
												echo '<div class="col-sm-2 Order-summary">';
												echo date_format(date_create($value['purchased_datetime_stamp']),'m/d/Y');
												echo '</div>';
												
												echo '<div class="col-sm-2 Order-summary">';
			//									echo strtotime($value['added_datetime_stamp']);
												$date = new DateTime($value['purchased_datetime_stamp'], new DateTimeZone("Asia/Hong_Kong"));
												$timestamp = $date->format('U');
//												echo $timestamp;
												echo '<b><a class="Order-details-order-number-link" href="'.site_url('account/orderdetailsmerchant/'.$timestamp).'/'.$value['customer_id'].'">'.$timestamp.'</a></b>';											
												echo '</div>';
												
												echo '<div class="col-sm-2 Order-summary">';
												
												$trimmedName = "";
												if (strlen($value['name'])>10) {
													$trimmedName = trim(substr($value['name'],0,10))."...";
													echo $trimmedName;												
												}
												else {
													echo $value['name'];												
												}
//												echo $value['name'];
												echo '</div>';
												
												echo '<div class="col-sm-2 Order-summary">';

												$count=0;
												foreach ($order_summary as $v1) {
													$i=0;					
													foreach ($v1 as $v2) {
														if ($i==0) {
															if ($v2==$value['purchased_datetime_stamp']) {
																$count++;
															}																
														}
														$i++;
													}
												}
												echo $count;																								

//												echo $value['quantity'];
												echo '</div>';
																								
												$orderTotal = $value['order_total_price'];
												
												echo '<div class="col-sm-2 Order-summary">';											
												echo '<span class="Order-summary-order-total">&#x20B1;'.$orderTotal.'</span>';
												echo '</div>';			
												
												echo '<div class="col-sm-2 Order-summary">';
												if ($value['fulfilled_status']==0) {
													echo '<span class="Fulfilled-Status-Not-OK">&ensp;Not Yet&ensp;</span>';
												}
												else {
													echo '<span class="Fulfilled-Status-OK">&ensp;OK&ensp;</span>';
												}
												echo '</div>';												
											}
											
											$counter=($counter+1)%2;
											
										echo '</div>';		
									}
								?>					
							</div>
						</div>
					</div>
				<?php		
					}
				?>		
			</div>
		</div>
	</div>
	<br>
</body>
</html>