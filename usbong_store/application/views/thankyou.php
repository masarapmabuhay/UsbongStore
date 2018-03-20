<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!-- 
<html lang="en">
<head>
</head>
<body>
-->
	<?php 
		$data=[];
		if ($this->session->flashdata('data')) {
			$data = $this->session->flashdata('data');
		}
	?>
	<br>
	<h2 class="Thankyou-header">&#x2714; Thank you<?php echo ', '.$data['firstNameParam'];?>! Your order is confirmed.</h2>
	<p class="Thankyou-text"> We've accepted your order, and are now processing it. You will receive a confirmation email from us with the next steps.</p>
	<br>
	<h4 class="header"><b>Order Details</b></h4>
	<p class="Thankyou-order-detail-date-and-number">Order on <?php echo $date;?> | Order# <?php echo $order_number;?></p>
	<div class="Thankyou-order-container">
		<div class="row">
			<div class="col-sm-3 Thankyou-order-details">
				<div class="Thankyou-order-details-text">
					<b>Shipping Address</b><br>
					<?php echo $data['firstNameParam'].' '.$data['lastNameParam'].'<br>';?>
					<?php echo $data['shippingAddressParam'].'<br>';?>
					<?php echo $data['cityParam'].', '.$data['postalCodeParam'].',<br>';?>
					<?php echo $data['countryParam'].'<br>';?>
				</div>
			</div>
			<div class="col-sm-3 Thankyou-order-details">		
				<b>Payment Method</b><br>
					<?php 
						if ($data['modeOfPaymentParam']==0) {
							echo 'Bank Deposit (BDO/BPI)';
						}
						else if ($data['modeOfPaymentParam']==1) {
							echo 'Paypal';
						}						
						else {
							echo 'Cash upon Meetup at MOSC<br>(Marikina Orthopedic Specialty Clinic)';
						}
					?>
			</div>
			<div class="col-sm-2 Thankyou-order-details">		
			</div>
			<div class="col-sm-4 Thankyou-order-details">		
				<b>Order Summary</b>
				<div class="Cart-order-total">
					<div class="row Cart-order-total-row">
						<div class="col-sm-6">		
							<?php 
//								$totalQuantity=1;
//								$orderTotal=1000;
								
								if ($quantity>1) {	
									echo '<span id="totalQuantityId">'.$quantity.'</span> items';
								}
								else {
									echo '<span id="totalQuantityId">'.$quantity.'</span> item';
								}
							?>		
						</div>
						<div class="col-sm-6 Cart-order-price">		
						    <?php echo '<label>&#x20B1;<span id="orderTotalId1">'.$order_total_price.'</span></label>';?>
						
							<?php //echo '&#x20B1; '.$orderTotal?>		
						</div>								
					</div>
					<div class="row Cart-order-discount-row">
							<div class="col-sm-6">		
								Less &#x20B1;70 promo
							</div>
							<div class="col-sm-6 Cart-order-discount">		
								<?php 
									if ($quantity>1) {
										$totalDiscount = ($quantity-1)*70;
									}
									else {
										$totalDiscount=0;
									}
									
									echo '-&#x20B1;'.$totalDiscount;
								?>	
							</div>		
					</div>		
					<div class="row Cart-order-discount-row">
							<div class="col-sm-6">		
								Meetup at MOSC
							</div>
							<div id="meetupAtMOSCDiscountId" class="col-sm-6 Cart-order-discount">		
								<?php
									if (isset($data['shippingAddressParam']) && ($data['shippingAddressParam']=="2 E. Rodriguez Ave. Sto. Niño")) {
										echo '-&#x20B1;70';									
									}
									else {
										echo '-&#x20B1;0';									
									}
								?>	
							</div>		
					</div>	
					<div class="row Cart-order-total-row">
						<div class="col-sm-6">		
							Shipping (PH)
						</div>
						<div class="col-sm-6">		
							FREE
						</div>		
					</div>						
					<div class="row Cart-order-total-with-checkout-row">
						<div class="col-sm-6">		
							Order Total
						</div>
						<div class="col-sm-6 Cart-order-price">		
						    <?php 
							    if (isset($data['shippingAddressParam']) && ($data['shippingAddressParam']=="2 E. Rodriguez Ave. Sto. Niño")) {
							    	$order_total_price-=70;
							    }
							    else {
							    	$order_total_price-=70;
							    }						    
						    
						    	$order_total_price-=$totalDiscount;						    
						    	echo '<label>&#x20B1;<span id="orderTotalId2">'.$order_total_price.'</span></label>';
						    ?>
						</div>								
					</div>
				  </div>
			</div>			
		</div>		
	</div>
<!-- 
</body>
</html>
-->