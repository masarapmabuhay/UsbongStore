<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<h3 class="header">Your Account at the Usbong Store</h3>
	<p><i>&ensp;&ensp;&ensp;You're logged in as masarapmabuhay@gmail.com</i></p>
	<br>
	<div>
		<div class="row">
			<div class="col-sm-3 Order-summary">		
				Order Summary
			</div>
			<div class="col-sm-9 Order-summary">		
				<h3>Orders</h3>
				<div>
					<div class="row">
						<div class="col-sm-2 Order-summary">		
							<b>Date</b>
						</div>
						<div class="col-sm-2 Order-summary">		
							<b>Order Number</b>
						</div>
						<div class="col-sm-2 Order-summary">		
							<b># of Items</b>
						</div>
						<div class="col-sm-2 Order-summary">		
							<b>Status</b>
						</div>
						<div class="col-sm-2 Order-summary">		
							<b>Price</b>
						</div>
					</div>
					<?php 
						foreach ($order_summary as $value) {
							echo '<div class="row">';
							
							echo date_format(date_create($value['added_datetime_stamp']),'m/d/Y');
							
							echo '</div>';		
						}
					?>					
				</div>
			</div>
		</div>
	</div>
</body>
</html>