<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!-- 
<html lang="en">
<head>
</head>
<body>
-->
	<h2 class="header">Contact Case Details (Admin) | Customer: <?php echo '<u><a class="Product-item" href="'.site_url('account/customerdetailsadmin/'.$contact_case_details->customer_id).'">'.$contact_case_details->contact_case_email_address.'</a></u>';?></h2>
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
				<div class="row">
					<div class="col-sm-7 Order-details">				
						<?php 						
							echo '<b>Subject: </b>';
							echo $contact_case_details->subject;
							echo '<br><br>';
//							echo '<b>Description:</b><br>';						
							echo $contact_case_details->description;	
							echo "<hr class='mail'>";
							echo '<span class="reply-text">Click here to <a href="mailto:'.$contact_case_details->contact_case_email_address.'">Reply</a></span>';
						?>
					</div>
					<div class="col-sm-4 Order-details">		
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
							<h3><b>Customer Address:</b></h3>
							<?php 
								echo $result->customer_first_name.' '.$result->customer_last_name.'<br>';				
/*								
								if ($totalMeetupAtMOSCPromoDiscount==0) {
*/								
									echo $result->customer_shipping_address.'<br>';
									echo $result->customer_city.', '.$result->customer_postal_code.',<br>';
									echo $result->customer_country.'<br>';
/*								}
								else {
									echo '2 E. Rodriguez Ave. Sto. Niño<br>';
									echo 'Marikina City, 1800,<br>';
									echo 'Philippines<br>';											
								}
*/								
							?>
						</div>
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