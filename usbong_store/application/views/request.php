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
					if (isset($data['productNameParam'])) {
						echo '<input type="text" class="Request-input" placeholder="Product Name" name="productNameParam" value="'.$data['productNameParam'].'" required>';
					}
					else { //default
						echo '<input type="text" class="Request-input" placeholder="Product Name" name="productNameParam" required>';
					}
					//-----------------------------------------------------------

					//Last Name--------------------------------------------------
					if (isset($data['productLinkParam'])) {
						echo '<input type="text" class="Request-input" placeholder="Product Link" name="productLinkParam" value="'.$data['productLinkParam'].'" required>';
					}
					else { //default
						echo '<input type="text" class="Request-input" placeholder="Product Link" name="productLinkParam" required>';
					}
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
						echo '<label><input type="radio" name="productTypeParam" value="0" checked>Used</label>';
						echo '</div>';
						echo '<div class="radio Checkout-input-mode-of-payment">';
						echo '<label><input type="radio" name="productTypeParam" value="1">New</label>';
						echo '</div>';
					}
					else {
						echo '<div class="radio Checkout-input-mode-of-payment">';
						echo '<label><input type="radio" name="productTypeParam" value="0">Used</label>';
						echo '</div>';
						echo '<div class="radio Checkout-input-mode-of-payment">';
						echo '<label><input type="radio" name="productTypeParam" value="1" checked>New</label>';
						echo '</div>';
					}
					?>
					
					<label class="Request-quantity-label">Quantity:</label>
					<input type="tel" id="quantityParam" class="Request-quantity-textbox no-spin"
								value="1" min="1" max="99" onKeyPress="if(this.value.length==2) {return false;} if(parseInt(this.value)<1) { this.value='1'; return false;}" required>
					<?php 		
					
					echo '<label class="Checkout-input-mode-of-payment">-Total Budget (for all copies/units)-</label>';
					$checkedBudgetId=0;
					if (isset($data['totalBudgetParam'])) {
						$checkedBudgetId = $data['totalBudgetParam'];
					}/*
					else if (isset($customer_information_result->mode_of_payment_id)) {
					if ($customer_information_result->mode_of_payment_id==0) {
					$isBankDepositChecked=true;
					}
					else {
					$isBankDepositChecked=false;
					}
					}*/
					
					echo '<div class="radio Checkout-input-mode-of-payment">';
					echo '<label><input type="radio" name="totalBudgetParam" value="0" checked>Less than 50pesos</label>';
					echo '</div>';
					echo '<div class="radio Checkout-input-mode-of-payment">';
					echo '<label><input type="radio" name="totalBudgetParam" value="1">Less than 100pesos</label>';
					echo '</div>';
					echo '<div class="radio Checkout-input-mode-of-payment">';
					echo '<label><input type="radio" name="totalBudgetParam" value="2">Less than 200pesos</label>';
					echo '</div>';
					echo '<div class="radio Checkout-input-mode-of-payment">';
					echo '<label><input type="radio" name="totalBudgetParam" value="3">Less than 300pesos</label>';
					echo '</div>';
					echo '<div class="radio Checkout-input-mode-of-payment">';
					echo '<label><input type="radio" name="totalBudgetParam" value="4">Less than 400pesos</label>';
					echo '</div>';
					echo '<div class="radio Checkout-input-mode-of-payment">';
					echo '<label><input type="radio" name="totalBudgetParam" value="5">Less than 500pesos</label>';
					echo '</div>';
					echo '<div class="radio Checkout-input-mode-of-payment">';
					echo '<label><input type="radio" name="totalBudgetParam" value="6">Less than 1000pesos</label>';
					echo '</div>';
					echo '<div class="radio Checkout-input-mode-of-payment">';
					echo '<label><input type="radio" name="totalBudgetParam" value="7">Less than 2000pesos</label>';
					echo '</div>';
					echo '<div class="radio Checkout-input-mode-of-payment">';
					echo '<label><input type="radio" name="totalBudgetParam" value="8">Less than 3000pesos</label>';
					echo '</div>';
					echo '<div class="radio Checkout-input-mode-of-payment">';
					echo '<label><input type="radio" name="totalBudgetParam" value="9">Less than 5000pesos</label>';
					echo '</div>';
					echo '<div class="radio Checkout-input-mode-of-payment">';
					echo '<label><input type="radio" name="totalBudgetParam" value="10">Less than 7500pesos</label>';
					echo '</div>';
					echo '<div class="radio Checkout-input-mode-of-payment">';
					echo '<label><input type="radio" name="totalBudgetParam" value="11">Less than 10000pesos</label>';
					echo '</div>';
					echo '<div class="radio Checkout-input-mode-of-payment">';
					echo '<label><input type="radio" name="totalBudgetParam" value="12">More than 10000pesos</label>';
					echo '</div>';
					
					echo '<br>';
					
					//Comments (optional)--------------------------------------------------
					if (isset($data['commentsParam'])) {
						echo '<textarea rows="3" class="Request-input" placeholder="Comments (optional)" name="commentsParam" value="'.$data['commentsParam'].'></textarea>';
					}
					else { //default
						echo '<textarea rows="3" class="Request-input" placeholder="Comments (optional)" name="commentsParam" required></textarea>';
					}
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
