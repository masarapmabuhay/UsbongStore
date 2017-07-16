<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<h3 class="header">Order #<?php echo $this->uri->segment(3);?></h3>
	<br>
	<div>
		<div class="row">
			<div class="col-sm-9 Order-summary">				
				<?php 	$addedDateTimeStamp = date('F j, Y H:i A', $this->uri->segment(3));		
						echo '<div class="Order-details-purchased-datetime-stamp">'.$addedDateTimeStamp.'</div>';
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-9 Order-summary">		
				<?php 
//					echo count($order_details).'items';
					$count=0;
					foreach ($order_details as $value) {
						$count+=$value['quantity'];
					}
					
					if ($count>1) {
						echo $count." items";						
					}
					else {
						echo "1 item";
					}
					
				
				?>
									<div class="row">
						<div class="col-sm-6 Order-summary">		
							The Salmon of Doubt
						</div>
						<div class="col-sm-3 Order-summary">		
							400pesos
						</div>
					</div>
				
			</div>
			<div class="col-sm-3 Order-summary">		
				<h2>Shipped To:</h2><br>
				Michael Syson<br>
				2 E. Rodriguez Ave. Sto. Nino<br>
				Marikina City, 1800,<br>
				Philippines<br>
			</div>
		</div>
	</div>
	<br>
</body>
</html>