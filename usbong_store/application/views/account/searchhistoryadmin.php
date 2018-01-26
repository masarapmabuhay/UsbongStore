<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!-- 
<html lang="en">
<head>
</head>
<body>
-->
	<h2 class="header">Search History (Admin)</h2>
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
					if (count($search_history)==0) {
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
									<div class="col-sm-4 Order-summary">		
										<b>Searched Item</b>
									</div>
									<div class="col-sm-2 Order-summary">		
										<b>Customer Email</b>
									</div>
<!-- 
									<div class="col-sm-2 Order-summary">		
										<b>Fulfilled?</b>
									</div>
-->									
								</div>
								<?php 
									$counter=0;
									foreach ($search_history as $value) {
										echo '<div class="row">';
											if ($counter!=0) {
												echo '<div class="col-sm-2 Order-summary-alternate">';
												echo date_format(date_create($value['added_datetime_stamp']),'m/d/Y');
												echo '</div>';
												
												echo '<div class="col-sm-4 Order-summary-alternate">';
												echo $value['searched_item'];
												echo '</div>';
												
												echo '<div class="col-sm-2 Order-summary-alternate">';												
												if ($value['customer_id']!=-1) {
													echo '<a class="Product-item" href="'.site_url('account/customerdetailsadmin/'.$value['customer_id']).'">';
													if (strlen($value['customer_email_address'])>14) {
														$trimmedName = trim(substr($value['customer_email_address'],0,14))."...";
														echo $trimmedName;
													}
													else {
														echo $value['customer_email_address'];
													}
													echo '</a>';
												}
												else {
													echo 'N/A';												
												}												
												echo '</div>';
/*												
												echo '<div class="col-sm-2 Order-summary-alternate offset-col-sm-2">';
												if ($value['fulfilled_status']==0) {
													echo '<a class="Order-details-order-number-link" href="'.site_url('account/requestsummaryadmin/1').'/'.$value['customer_request_id'].'">';
													echo '<span class="Fulfilled-Status-Not-OK">&ensp;Not Yet&ensp;</span>';
													echo '</a>';
												}
												else {
													echo '<a class="Order-details-order-number-link" href="'.site_url('account/requestsummaryadmin/0').'/'.$value['customer_request_id'].'">';
													//													echo '<span class="Fulfilled-Status-OK">&ensp;OK&ensp;</span>';
													echo '<b>'.date_format(date_create($value['fulfilled_datetime_stamp']),'m/d/Y').'</b>';
													echo '</a>';
												}
												echo '</div>';																								
*/												
											}
											else {
												echo '<div class="col-sm-2 Order-summary">';
												echo date_format(date_create($value['added_datetime_stamp']),'m/d/Y');
												echo '</div>';
												
												echo '<div class="col-sm-4 Order-summary">';
												echo $value['searched_item'];
												echo '</div>';
												
												echo '<div class="col-sm-2 Order-summary">';
												if ($value['customer_id']!=-1) {													
													echo '<a class="Product-item" href="'.site_url('account/customerdetailsadmin/'.$value['customer_id']).'">';
													if (strlen($value['customer_email_address'])>14) {
														$trimmedName = trim(substr($value['customer_email_address'],0,14))."...";
														echo $trimmedName;
													}
													else {
														echo $value['customer_email_address'];
													}
													echo '</a>';
												}
												else {
													echo 'N/A';
												}
												echo '</div>';
																								
/*																				
												echo '<div class="col-sm-2 Order-summary">';
												if ($value['fulfilled_status']==0) {
													echo '<a class="Order-details-order-number-link" href="'.site_url('account/requestsummaryadmin/1').'/'.$value['customer_request_id'].'">';
													echo '<span class="Fulfilled-Status-Not-OK">&ensp;Not Yet&ensp;</span>';
													echo '</a>';
												}
												else {
													echo '<a class="Order-details-order-number-link" href="'.site_url('account/requestsummaryadmin/0').'/'.$value['customer_request_id'].'">';
													//													echo '<span class="Fulfilled-Status-OK">&ensp;OK&ensp;</span>';
													echo '<b>'.date_format(date_create($value['fulfilled_datetime_stamp']),'m/d/Y').'</b>';
													echo '</a>';
												}
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