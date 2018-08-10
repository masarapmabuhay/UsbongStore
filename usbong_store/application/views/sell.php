<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!-- 
<html lang="en">
<head>
</head>
<body>
-->
	<h2 class="header">Sell</h2>
	<br>
	<div>
	<?php 	
		$data=[];
		if ($this->session->flashdata('data')) {
			$data = $this->session->flashdata('data');
		}
	
		//Success Message
		if (isset($data['is_success'])) {
			echo '<div class="Request-success">&#x2714; You have successfully sent us your product details.</div>';
		}	
	?>

	<div class="sell">
		<div class="sell-text"><b>Product Information</b></div>
		<div class="fields">
			<span class="sell-instructions">
			Please kindly fill out this form for each product item you want to sell. Thank you. Peace.
			<br><br>
			</span>
			
			<form method="post" action="<?php echo site_url('sell/confirm')?>">
				<?php 							
				
					//First Name--------------------------------------------------			
					echo '<div class="Checkout-div">';
					if (isset($productNameParam)) {
						echo '<input type="text" class="Request-input" placeholder="" name="productNameParam" value="'.$productNameParam.'" required>';
					}
/*					else if (isset($customer_information_result->customer_email_address)) {
						echo '<input type="text" class="Checkout-input" placeholder="" name="productNameParam" value="'.$customer_information_result->customer_email_address.'" required>';
					}
*/					
					else { //default					
						echo '<input type="text" class="Request-input" placeholder="" name="productNameParam" required>';
					}
					 
					echo '<span class="floating-label">Product Name</span>';
					echo '</div>';				
					//-----------------------------------------------------------

					//Last Name--------------------------------------------------
					echo '<div class="Checkout-div">';
					if (isset($productImageLinkParam)) {
						echo '<input type="text" class="Request-input" placeholder="" name="productImageLinkParam" value="'.$productImageLinkParam.'" required>';
					}
/*					else if (isset($customer_information_result->customer_email_address)) {
					 echo '<input type="text" class="Checkout-input" placeholder="" name="productNameParam" value="'.$customer_information_result->customer_email_address.'" required>';
					}
*/					
					else { //default					
						echo '<input type="text" class="Request-input" placeholder="" name="productImageLinkParam" required>';
					}
					
					echo '<span class="floating-label">Product Image Link</span>';
					echo '</div>';
					//-----------------------------------------------------------
					
					echo '<label class="Checkout-input-product-type">-Product Type-</label>';
			
					echo '<div class="radio Request-input-product-type">';
					echo '<label><input type="radio" name="productTypeParam" value="0" checked>Used</label>';
					echo '</div>';
					echo '<div class="radio Request-input-product-type">';
					echo '<label><input type="radio" name="productTypeParam" value="1">New</label>';
					echo '</div>';					
					?>
					
					<label class="Request-quantity-label">Quantity:</label>
					<input type="tel" id="quantityParam" name="quantityParam" class="Request-quantity-textbox no-spin"
								value="1" min="1" max="99" onKeyUp="mySellQuantityFunction(parseInt(this.value), this.id);" onKeyPress="if(this.value.length==2) {return false;} if(parseInt(this.value)<1) { this.value='1'; return false;}" required>
					<label class="Request-quantity-label">x <span class="Sell-cost">&#x20B1;50</span></label>
					<?php 		
					//Total Cost--------------------------------------------------
					echo '<div class="Checkout-div">';
					echo '<label>Total Cost (for all copies/units)</label>';					
					echo '<br><label class="Sell-total-cost-label">&#x20B1;</label><span id="totalCost" type="text" class="Sell-total-cost-input" placeholder="50">50</span>'; //name="totalCostParam
					echo '</div>';
					//-----------------------------------------------------------
																	
					//Comments--------------------------------------------------
					echo '<div class="Checkout-div Sell-comments-div">';					
					echo '<input type="text" class="Request-input" placeholder="" name="commentsParam" required>';
					echo '<span class="floating-label">Comments</span>';
					echo '</div>';
					//-----------------------------------------------------------
					
					//reset the session values to null
					$this->session->set_flashdata('errors', null);
					$this->session->set_flashdata('data', null); //added by Mike, 20170619
				?>
				<button type="submit" class="Button-login">
<!-- <img src="<?php echo base_url('assets/images/cart_icon.png'); ?>">	
 -->					
 				Sell
				</button>
			</form>
		</div>		
	</div>
<!-- 
</body>
</html>
-->