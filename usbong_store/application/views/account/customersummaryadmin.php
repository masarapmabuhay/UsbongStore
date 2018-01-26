<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!-- 
<html lang="en">
<head>
</head>
<body>
-->
	<h2 class="header">Customer Summary (Admin)</h2>
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
					if (count($customer_summary)==0) {
						echo '<div class="Order-Summary-noResult">';
						echo 'There are no customers yet.';
						echo '</div>';
					}
					else {
				?>
					<div class="row">
						<div class="col-sm-1 Order-summary">		
						</div>
						<div class="col-sm-10 Order-summary">		
							<h3>Customer List (from newest)</h3>
							<div>
								<div class="row">
									<div class="col-sm-3 Order-summary">		
										<b>Email Address</b>
									</div>
									<div class="col-sm-2 Order-summary">		
										<b>Is Admin?</b>
									</div>
									<div class="col-sm-2 Order-summary">		
										<b>Merchant Name</b>
									</div>
									<div class="col-sm-2 Order-summary">		
										<b>Logged In</b>
									</div>
									<div class="col-sm-2 Order-summary">		
										<b>Logged Out</b>
									</div>
								</div>
								<?php 
									$counter=0;
									foreach ($customer_summary as $value) {
										echo '<div class="row">';
											if ($counter!=0) {
												echo '<div class="col-sm-3 Order-summary-alternate">';
												if (isset($value['customer_email_address'])) {
//													echo $value['customer_email_address'];		
													echo '<u><a class="Product-item" href="'.site_url('account/customerdetailsadmin/'.$value['customer_id']).'">'.$value['customer_email_address'].'</a></u>';
												}
												else {
													echo 'n/a';												
												}
												echo '</div>';
												
												echo '<div class="col-sm-2 Order-summary-alternate">';
												if ($value['is_admin']=='0') {
													echo 'No';
												}
												else {
													echo 'Yes';
												}
//												echo $value['is_admin'];
												echo '</div>';
												
												echo '<div class="col-sm-2 Order-summary-alternate">';
												
												$trimmedName = "";
												if (strlen($value['merchant_name'])>10) {
													$trimmedName = trim(substr($value['merchant_name'],0,10))."...";
													echo $trimmedName;
												}
												else {
													echo $value['merchant_name'];
												}
																								
												echo '</div>';
												
												echo '<div class="col-sm-2 Order-summary-alternate">';
												if (isset($value['last_logged_in_datetime_stamp'])) {
													echo date_format(date_create($value['last_logged_in_datetime_stamp']),'m/d/Y');												
												}
												else {
													echo 'n/a';
												}
												echo '</div>';				
												
												echo '<div class="col-sm-2 Order-summary-alternate">';
												if (isset($value['last_logged_out_datetime_stamp'])) {
													echo date_format(date_create($value['last_logged_out_datetime_stamp']),'m/d/Y');
												}
												else {
													echo 'n/a';
												}
												echo '</div>';												
											}
											else {
												echo '<div class="col-sm-3 Order-summary">';
												if (isset($value['customer_email_address'])) {
//													echo $value['customer_email_address'];
													echo '<u><a class="Product-item" href="'.site_url('account/customerdetailsadmin/'.$value['customer_id']).'">'.$value['customer_email_address'].'</a></u>';												
												}
												else {
													echo 'n/a';
												}
												echo '</div>';
												
												echo '<div class="col-sm-2 Order-summary">';
												if ($value['is_admin']=='0') {
													echo 'No';
												}
												else {
													echo 'Yes';
												}
//												echo $value['is_admin'];
												echo '</div>';
												
												echo '<div class="col-sm-2 Order-summary">';
												$trimmedName = "";
												if (strlen($value['merchant_name'])>10) {
													$trimmedName = trim(substr($value['merchant_name'],0,10))."...";
													echo $trimmedName;
												}
												else {
													echo $value['merchant_name'];
												}												
												echo '</div>';
												
												echo '<div class="col-sm-2 Order-summary">';
												if (isset($value['last_logged_in_datetime_stamp'])) {
													echo date_format(date_create($value['last_logged_in_datetime_stamp']),'m/d/Y');
												}
												else {
													echo 'n/a';
												}
												echo '</div>';
												
												echo '<div class="col-sm-2 Order-summary">';											
												if (isset($value['last_logged_out_datetime_stamp'])) {
													echo date_format(date_create($value['last_logged_out_datetime_stamp']),'m/d/Y');
												}
												else {
													echo 'n/a';
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
<!-- 
</body>
</html>
-->