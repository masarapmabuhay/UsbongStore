<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!-- 
<html lang="en">
<head>
</head>
<body>
-->
	<h2 class="header">Contact Case Summary (Admin)</h2>
	<br>
	<div>
		<div class="row">
			<div class="col-sm-3 Account-settings">
					<div class="row Account-settings-subject-header">Summary</div>
					<div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/ordersummaryadmin/')?>">Order Summary (Admin)</a></div>				
					<div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/carthistoryadmin/')?>">Cart History (Admin)</a></div>				
					<div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/requestsummaryadmin/')?>">Requests (Admin)</a></div>				
					<div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/sellsummaryadmin/')?>">Sell (Admin)</a></div>				
					<div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/searchhistoryadmin/')?>">Search (Admin)</a></div>
					<div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/customersummaryadmin/')?>">Customer List (Admin)</a></div>
					<div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('contact/contactcasesummaryadmin/')?>">Case Summary (Admin)</a></div>
					<div class="row Account-settings-subject-header">Settings</div>
					<div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/settings/')?>">Update Information</a></div>
					<div class="row Account-settings-subject-content"><a class="Account-settings-subject-content-link" href="<?php echo site_url('account/updatepassword/')?>">Update Password</a></div>
			</div>
			<div class="col-sm-9">		
				<?php 
					if (count($contact_case_summary)==0) {
						echo '<div class="Order-Summary-noResult">';
						echo 'No customer has sent any case yet.';
						echo '</div>';
					}
					else {
				?>
					<div class="row">
						<div class="col-sm-1 Order-summary">		
						</div>
						<div class="col-sm-10 Order-summary">		
							<h3>Contact Case</h3>
							<div>
								<div class="row">
									<div class="col-sm-2 Order-summary">		
										<b>Date</b>
									</div>
									<div class="col-sm-6 Order-summary">		
										<b>Message</b>
									</div>
									<div class="col-sm-2 Order-summary">		
										<b>Customer Email</b>
									</div>
									<div class="col-sm-2 Order-summary">		
										<b>Type</b>
									</div>
								</div>
								<?php 
									$counter=0;
									foreach ($contact_case_summary as $value) {
										echo '<div class="row">';
											if ($counter!=0) {
												echo '<div class="col-sm-2 Order-summary-alternate">';
												echo date_format(date_create($value['added_datetime_stamp']),'m/d/Y');
												echo '</div>';
												
												echo '<div class="col-sm-6 Order-summary-alternate">';
			//									echo strtotime($value['added_datetime_stamp']);
												$date = new DateTime($value['added_datetime_stamp'], new DateTimeZone("Asia/Hong_Kong"));
												$timestamp = $date->format('U');
//												echo $timestamp;

												if ($value['status']==0) {
													echo '<a class="Product-item-message" href="'.site_url('contact/contactcasedetailsadmin/'.$value['contact_case_id']).'">';
												}
												else {
													echo '<a class="Product-item-message-read" href="'.site_url('contact/contactcasedetailsadmin/'.$value['contact_case_id']).'">';
												}
												
												
												if (strlen($value['subject'])+strlen($value['description'])>46) {
													$messageLength=0;
	
													if (strlen($value['subject'])>40) {
														$trimmedName = trim(substr($value['subject'],0,40))."...";
														echo $trimmedName;
	
														$messageLength = strlen($trimmedName);
													}
													else {
														echo $value['subject'];
	
														$messageLength = strlen($value['subject']);
													}												
													
													if (strlen($messageLength<40)) {
														echo " - ";
	
														if (strlen($value['description'])>20) {
															$trimmedName = trim(substr($value['description'],0,20))."...";
															echo $trimmedName;
														}
														else {
															echo $value['description'];
														}												
													}
												}																								
												else {
														echo $value['subject']." - ".$value['description'];													
												}

												
//												echo '<a class="Product-item" href="'.site_url('account/customerdetailsadmin/'.$value['customer_id']).'">';												
//												echo '<b><a class="Order-details-order-number-link" href="'.site_url('account/orderdetailsadmin/'.$timestamp).'/'.$value['customer_id'].'">'.$timestamp.'</a></b>';
												echo '</div>';
																																				
												echo '<div class="col-sm-2 Order-summary-alternate offset-col-sm-2">';
												echo '<a class="Product-item" href="'.site_url('account/customerdetailsadmin/'.$value['customer_id']).'">';
												
												if (!isset($value['contact_case_email_address'])) {
													echo "N/A";													
												}
												else {
													if (strlen($value['contact_case_email_address'])>14) {
														$trimmedName = trim(substr($value['contact_case_email_address'],0,14))."...";
														echo $trimmedName;
													}
													else {
														echo $value['contact_case_email_address'];
													}
												}																								
												echo '</a>';
												echo '</div>';

												echo '<div class="col-sm-2 Order-summary-alternate">';
												echo $value['contact_case_type_name_shortened'];
												echo '</div>';												
												
/*
												 echo '<div class="col-sm-2 Order-summary-alternate offset-col-sm-2">';
												 echo $value['status'];
												 echo '</div>';
*/												
											}
											else {
												echo '<div class="col-sm-2 Order-summary">';
												echo date_format(date_create($value['added_datetime_stamp']),'m/d/Y');
												echo '</div>';
												
												echo '<div class="col-sm-6 Order-summary">';
			//									echo strtotime($value['added_datetime_stamp']);
												$date = new DateTime($value['added_datetime_stamp'], new DateTimeZone("Asia/Hong_Kong"));
												$timestamp = $date->format('U');
//												echo $timestamp;

												if ($value['status']==0) {
													echo '<a class="Product-item-message" href="'.site_url('contact/contactcasedetailsadmin/'.$value['contact_case_id']).'">';												
												}
												else {
													echo '<a class="Product-item-message-read" href="'.site_url('contact/contactcasedetailsadmin/'.$value['contact_case_id']).'">';													
												}													

												if (strlen($value['subject'])+strlen($value['description'])>46) {
													$messageLength=0;
	
													if (strlen($value['subject'])>40) {
														$trimmedName = trim(substr($value['subject'],0,40))."...";
														echo $trimmedName;
	
														$messageLength = strlen($trimmedName);
													}
													else {
														echo $value['subject'];
	
														$messageLength = strlen($value['subject']);
													}												
													
													if (strlen($messageLength<40)) {
														echo " - ";
	
														if (strlen($value['description'])>20) {
															$trimmedName = trim(substr($value['description'],0,20))."...";
															echo $trimmedName;
														}
														else {
															echo $value['description'];
														}												
													}
												}																								
												else {
														echo $value['subject']." - ".$value['description'];													
												}
												echo '</a>';
												echo '</div>';																								
												
												echo '<div class="col-sm-2 Order-summary">';		
												echo '<a class="Product-item" href="'.site_url('account/customerdetailsadmin/'.$value['customer_id']).'">';												
												
												if (!isset($value['contact_case_email_address'])) {
													echo "N/A";													
												}
												else {
													if (strlen($value['contact_case_email_address'])>14) {
														$trimmedName = trim(substr($value['contact_case_email_address'],0,14))."...";
														echo $trimmedName;
													}
													else {
														echo $value['contact_case_email_address'];
													}													
												}
												
												echo '</a>';
												echo '</div>';
												
												echo '<div class="col-sm-2 Order-summary">';
												echo $value['contact_case_type_name_shortened'];
												echo '</div>';
												
/*												
												echo '<div class="col-sm-2 Order-summary">';
												echo $value['status'];
												echo '</div>';												
*/												
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
<!-- 
</body>
</html>
-->