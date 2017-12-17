<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!-- 
<html lang="en">
<head>
</head>
<body>
-->
	<h2 class="header">Request</h2>
	<br>
	<div>
	<?php 
		$data=[];
		if ($this->session->flashdata('data')) {
			$data = $this->session->flashdata('data');
		}
	
		//Success Message
		if (isset($data['is_success'])) {
			echo '<div class="Request-success">&#x2714; You have successfully sent us your request.</div>';
		}	
	?>

	<div class="request">
		<div class="request-text"><b>Product Information</b></div>
		<div class="fields">
			<form method="post" action="<?php echo site_url('request/confirm')?>">
				<?php 							
				
					//Product Name--------------------------------------------------			
					echo '<div class="Checkout-div">';					
					if (isset($productNameParam)) {
						echo '<input type="text" class="Request-input" placeholder="" name="productNameParam" value="'.$productNameParam.'" required>';
					}/*
					else if (isset($customer_information_result->customer_email_address)) {
						echo '<input type="text" class="Checkout-input" placeholder="" name="productNameParam" value="'.$customer_information_result->customer_email_address.'" required>';
					}*/
					else { //default				
						echo '<input type="text" class="Request-input" placeholder="" name="productNameParam" required>';
					}

					echo '<span class="floating-label">Product Name</span>';
					echo '</div>';				
					//-----------------------------------------------------------

					//Product Link--------------------------------------------------
					echo '<div class="Checkout-div">';
					if (isset($productLinkParam)) {
						echo '<input type="text" class="Request-input" placeholder="" name="productLinkParam" value="'.$productLinkParam.'" required>';
					}
/*					else if (isset($customer_information_result->customer_email_address)) {
					 echo '<input type="text" class="Checkout-input" placeholder="" name="productNameParam" value="'.$customer_information_result->customer_email_address.'" required>';
					 }
*/					 
					else { //default
					
						echo '<input type="text" class="Request-input" placeholder="" name="productLinkParam" required>';
					}

					echo '<span class="floating-label">Product Link</span>';
					echo '</div>';
					//-----------------------------------------------------------
					
					echo '<label class="Checkout-input-product-type">-Product Type-</label>';
/*					$isUsedChecked=true;
					if (isset($data['productTypeParam'])) {
						if ($data['productTypeParam']==0) {
							$isUsedChecked=true;
						}
						else {
							$isUsedChecked=false;
						}
					}
					if ($isUsedChecked==true) {
						echo '<div class="radio Request-input-product-type">';
						echo '<label><input type="radio" name="productTypeParam" value="0" checked>Used</label>';
						echo '</div>';
						echo '<div class="radio Request-input-product-type">';
						echo '<label><input type="radio" name="productTypeParam" value="1">New</label>';
						echo '</div>';
					}
					else {
						echo '<div class="radio Request-input-product-type">';
						echo '<label><input type="radio" name="productTypeParam" value="0">Used</label>';
						echo '</div>';
						echo '<div class="radio Request-input-product-type">';
						echo '<label><input type="radio" name="productTypeParam" value="1" checked>New</label>';
						echo '</div>';
					}
*/					
					echo '<div class="radio Request-input-product-type">';
					echo '<label><input type="radio" name="productTypeParam" value="0">Used</label>';
					echo '</div>';
					echo '<div class="radio Request-input-product-type">';
					echo '<label><input type="radio" name="productTypeParam" value="1" checked>New</label>';
					echo '</div>';
					
					?>
					
					<label class="Request-quantity-label">Quantity:</label>
					<input type="tel" id="quantityParam" name="quantityParam" class="Request-quantity-textbox no-spin"
								value="1" min="1" max="99" onKeyPress="if(this.value.length==2) {return false;} if(parseInt(this.value)<1) { this.value='1'; return false;}" required>
					<?php 		
					//Total Budget--------------------------------------------------
					echo '<div class="Checkout-div">';
					echo '<input type="tel" class="Request-input" placeholder="" name="totalBudgetParam" required>';
					echo '<span class="floating-label">Total Budget (for all copies/units in Philippine &#x20B1;)</span>';
					echo '</div>';
					//-----------------------------------------------------------
								
					//Comments--------------------------------------------------
					echo '<div class="Checkout-div">';
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
 				Request
				</button>
			</form>
		</div>		
	</div>
<!-- 
</body>
</html>
-->