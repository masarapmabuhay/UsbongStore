<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<h2 class="header">Request</h2>
	<br>
	<div>
	<div class="request">
		<div class="request-text"><b>Product Information</b></div>
		<?php
			$validation_errors="";
			if ($this->session->flashdata('errors')) {
				$validation_errors = $this->session->flashdata('errors');
			}	
			
			$data=[];
			if ($this->session->flashdata('data')) {
				$data = $this->session->flashdata('data');
			}
	    ?>
		<div class="fields">
			<form method="post" action="<?php echo site_url('b/literature_and_fiction')?>">
				<?php 
					//First Name--------------------------------------------------			
					echo '<div class="Checkout-div">';
					if (isset($data['productNameParam'])) {
						echo '<input type="text" class="Request-input" placeholder="" name="productNameParam" value="'.$data['productNameParam'].'" required>';
					}
/*					else if (isset($customer_information_result->customer_email_address)) {
						echo '<input type="text" class="Checkout-input" placeholder="" name="productNameParam" value="'.$customer_information_result->customer_email_address.'" required>';
					}*/
					else { //default
						echo '<input type="text" class="Request-input" placeholder="" name="productNameParam" required>';
					}
					echo '<span class="floating-label">Product Name</span>';
					echo '</div>';				
					//-----------------------------------------------------------

					//Last Name--------------------------------------------------
					echo '<div class="Checkout-div">';
					if (isset($data['productLinkParam'])) {
						echo '<input type="text" class="Request-input" placeholder="" name="productLinkParam" value="'.$data['productLinkParam'].'" required>';
					}
					/*					else if (isset($customer_information_result->customer_email_address)) {
					 echo '<input type="text" class="Checkout-input" placeholder="" name="productNameParam" value="'.$customer_information_result->customer_email_address.'" required>';
					 }*/
					else { //default
						echo '<input type="text" class="Request-input" placeholder="" name="productLinkParam" required>';
					}
					echo '<span class="floating-label">Product Link</span>';
					echo '</div>';
					//-----------------------------------------------------------
					
					echo '<label class="Checkout-input-mode-of-payment">-Product Type-</label>';
					$isUsedChecked=true;
					if (isset($data['productTypeParam'])) {
						if ($data['productTypeParam']==0) {
							$isUsedChecked=true;
						}
						else {
							$isUsedChecked=false;
						}
					}/*
					else if (isset($customer_information_result->mode_of_payment_id)) {
						if ($customer_information_result->mode_of_payment_id==0) {
							$isBankDepositChecked=true;
						}
						else {
							$isBankDepositChecked=false;
						}
					}*/
					
					if ($isUsedChecked==true) {
						echo '<div class="radio Checkout-input-mode-of-payment">';
						echo '<label><input type="radio" name="modeOfPaymentParam" value="0" checked>Used</label>';
						echo '</div>';
						echo '<div class="radio Checkout-input-mode-of-payment">';
						echo '<label><input type="radio" name="modeOfPaymentParam" value="1">New</label>';
						echo '</div>';
					}
					else {
						echo '<div class="radio Checkout-input-mode-of-payment">';
						echo '<label><input type="radio" name="modeOfPaymentParam" value="0">Used</label>';
						echo '</div>';
						echo '<div class="radio Checkout-input-mode-of-payment">';
						echo '<label><input type="radio" name="modeOfPaymentParam" value="1" checked>New</label>';
						echo '</div>';
					}
					?>
					
					<label class="Request-quantity-label">Quantity:</label>
					<input type="tel" id="quantityParam" class="Request-quantity-textbox no-spin"
								value="1" min="1" max="99" onKeyPress="if(this.value.length==2) {return false;} if(parseInt(this.value)<1) { this.value='1'; return false;}" required>
					<?php 		
/*					
					echo '<label class="Checkout-input-mode-of-payment">-Total Budget (for all copies/units)-</label>';
					$checkedBudgetId=0;
					if (isset($data['totalBudgetParam'])) {
						$checkedBudgetId = $data['totalBudgetParam'];
					}
*/					
					/*
					else if (isset($customer_information_result->mode_of_payment_id)) {
					if ($customer_information_result->mode_of_payment_id==0) {
					$isBankDepositChecked=true;
					}
					else {
					$isBankDepositChecked=false;
					}
					}*/
					//Last Name--------------------------------------------------
					echo '<div class="Checkout-div">';
					if (isset($data['totalBudgetParam'])) {
						echo '<input type="text" class="Request-input" placeholder="" name="totalBudgetParam" value="'.$data['totalBudgetParam'].'" required>';
					}
					/*					else if (isset($customer_information_result->customer_email_address)) {
					 echo '<input type="text" class="Checkout-input" placeholder="" name="productNameParam" value="'.$customer_information_result->customer_email_address.'" required>';
					 }*/
					else { //default
						echo '<input type="text" class="Request-input" placeholder="" name="totalBudgetParam" required>';
					}
					echo '<span class="floating-label">Total Budget (for all copies/units in Philippine &#x20B1;)</span>';
					echo '</div>';
					//-----------------------------------------------------------
															
					//Comments (optional)--------------------------------------------------
					echo '<div class="Checkout-div">';
					if (isset($data['commentsParam'])) {
						echo '<textarea class="Request-textarea" placeholder="" name="commentsParam" value="'.$data['commentsParam'].'></textarea>';
					}
					/*					else if (isset($customer_information_result->customer_email_address)) {
					 echo '<input type="text" class="Checkout-input" placeholder="" name="productNameParam" value="'.$customer_information_result->customer_email_address.'" required>';
					 }*/
					else { //default
						echo '<textarea class="Request-textarea" placeholder="" name="commentsParam" required></textarea>';
					}
					echo '<span class="floating-label">Comments (optional)</span>';
					echo '</div>';
					//-----------------------------------------------------------
															
					//reset the session values to null
					$this->session->set_flashdata('errors', null);
					$this->session->set_flashdata('data', null); //added by Mike, 20170619
				?>
				<button type="submit" class="Button-login">
<!-- <img src="<?php echo base_url('assets/images/cart_icon.png'); ?>">	
 -->					
 				Request
				</button>
			</form>
		</div>		
	</div>
</body>
</html>
