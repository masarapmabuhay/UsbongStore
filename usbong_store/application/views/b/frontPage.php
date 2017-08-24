<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	<div class="Image-offers">
	<img class="Image-offers-save-more" src="<?php echo base_url('assets/images/usbongOffersBuyMoreSaveMore.jpg')?>">
	<br>
	<a class="Request-link" href="<?php echo site_url('sell/')?>"><img class="Image-offers-buy-back" src="<?php echo base_url('assets/images/usbongOffersBuyBack.jpg')?>"></a>
	<br>
	<a class="Request-link" href="<?php echo site_url('request/')?>"><img class="Image-offers-request" src="<?php echo base_url('assets/images/usbongOffersRequest.jpg')?>"></a>
	<br>
	<a class="Request-link"><img class="Image-offers-be-a-merchant" src="<?php echo base_url('assets/images/usbongOffersBecomeAMerchant.jpg')?>"></a>
	</div>

<!-- ################################################################################# -->
	<h3 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/books/')?>">Recommended <span class="Front-page-cat-name">Books</span></a></h3>	
	<br>
		<div class="container-frontPage">
		<div class="row">
	<?php
			$colCounter = 0;
			
			$d = array();
			foreach ($books as $value) {
				$d[] = $value;			
			}
			
			foreach ($books as $value) {
				$reformattedProductName = str_replace(':','',str_replace('\'','',$value['name'])); //remove ":" and "'"
				$URLFriendlyReformattedProductName = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$reformattedProductName)))))); //replace "&", " ", and "-"
				$URLFriendlyReformattedProductAuthor = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$value['author'])))))); //replace "&", " ", and "-"
				
				if ($colCounter==0) {										
					echo '<div class="row no-gutter">';						
					
					echo '<div class="col-sm-1">';
					if (count($books)>=15) {						
						echo "<br><br><br><button id='leftButtonId' onclick='myLeftArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-left-arrow-button'>‹</button>";
					}
					echo '</div>';
					
					echo '<div class="col-sm-10">';				
					echo '<div>';
					echo '<div class="col-sm-2 Product-item">';					
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/books/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
//					if ($value['price']!=null) {

					echo '<br><label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';

					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';					
					}
					echo '</label>';

					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {						
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
										
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<div class="col-sm-2 Product-item">';
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/books/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
					echo '<br><label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';
					
					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';
					}
					echo '</label>';
					
					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
					
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($books))){												
						
						echo '</div>';
						
						echo '<div col-sm-1>';	
						if (count($books)>=15) {							
							echo "<br><br><br><button id='rightButtonId' onclick='myRightArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-right-arrow-button'>›</button>";
						}
						echo '</div>';
						
						echo '</div>';
						$colCounter=0;
												
						//added by Mike, 20170818
						echo '<hr class="FrontPage-hr">';
						break;
					}
				}
			}			
			echo '</div>';		
			echo '</div>';
	?>
	</div>		
	
	<!-- ################################################################################# -->
	<h3 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/childrens/')?>">Recommended <span class="Front-page-cat-name"> Children's Books</span></a></h3>	
	<br>
		<div class="container-frontPage">
		<div class="row">
	<?php
			$colCounter = 0;
			
			$d = array();
			foreach ($childrens as $value) {
				$d[] = $value;			
			}
			
			foreach ($childrens as $value) {
				$reformattedProductName = str_replace(':','',str_replace('\'','',$value['name'])); //remove ":" and "'"
				$URLFriendlyReformattedProductName = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$reformattedProductName)))))); //replace "&", " ", and "-"
				$URLFriendlyReformattedProductAuthor = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$value['author'])))))); //replace "&", " ", and "-"
				
				if ($colCounter==0) {										
					echo '<div class="row no-gutter">';						
					
					echo '<div class="col-sm-1">';
					if (count($childrens)>=15) {						
						echo "<br><br><br><button id='leftButtonId' onclick='myLeftArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-left-arrow-button'>‹</button>";
					}
					echo '</div>';
					
					echo '<div class="col-sm-10">';				
					echo '<div>';
					echo '<div class="col-sm-2 Product-item">';					
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/childrens/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
//					if ($value['price']!=null) {

					echo '<br><label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';

					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';					
					}
					echo '</label>';

					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {						
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
										
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<div class="col-sm-2 Product-item">';
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/childrens/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
					echo '<br><label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';
					
					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';
					}
					echo '</label>';
					
					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
					
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($childrens))){												
						
						echo '</div>';
						
						echo '<div col-sm-1>';		
						if (count($childrens)>=15) {							
							echo "<br><br><br><button id='rightButtonId' onclick='myRightArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-right-arrow-button'>›</button>";
						}
						echo '</div>';
						
						echo '</div>';
						$colCounter=0;
												
						//added by Mike, 20170818
						echo '<hr class="FrontPage-hr">';
						break;
					}
				}
			}			
			echo '</div>';		
			echo '</div>';
	?>
	</div>		

<!-- ################################################################################# -->
	<h3 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/textbooks/')?>">Recommended <span class="Front-page-cat-name"> Textbooks</span></a></h3>	
	<br>
		<div class="container-frontPage">
		<div class="row">
	<?php
			$colCounter = 0;
			
			$d = array();
			foreach ($textbooks as $value) {
				$d[] = $value;			
			}
			
			foreach ($textbooks as $value) {
				$reformattedProductName = str_replace(':','',str_replace('\'','',$value['name'])); //remove ":" and "'"
				$URLFriendlyReformattedProductName = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$reformattedProductName)))))); //replace "&", " ", and "-"
				$URLFriendlyReformattedProductAuthor = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$value['author'])))))); //replace "&", " ", and "-"
				
				if ($colCounter==0) {										
					echo '<div class="row no-gutter">';						
					
					echo '<div class="col-sm-1">';
					if (count($textbooks)>=15) {						
						echo "<br><br><br><button id='leftButtonId' onclick='myLeftArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-left-arrow-button'>‹</button>";
					}
					echo '</div>';
					
					echo '<div class="col-sm-10">';				
					echo '<div>';
					echo '<div class="col-sm-2 Product-item">';					
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/textbooks/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
//					if ($value['price']!=null) {

					echo '<br><label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';

					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';					
					}
					echo '</label>';

					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {						
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
										
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<div class="col-sm-2 Product-item">';
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/textbooks/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
					echo '<br><label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';
					
					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';
					}
					echo '</label>';
					
					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
					
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($textbooks))){												
						
						echo '</div>';
						
						echo '<div col-sm-1>';						
						if (count($textbooks)>=15) {							
							echo "<br><br><br><button id='rightButtonId' onclick='myRightArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-right-arrow-button'>›</button>";
						}
						echo '</div>';
						
						echo '</div>';
						$colCounter=0;
												
						//added by Mike, 20170818
						echo '<hr class="FrontPage-hr">';
						break;
					}
				}
			}			
			echo '</div>';		
			echo '</div>';
	?>
	</div>		
	
	<!-- ################################################################################# -->
	<h3 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/promos/')?>">Recommended <span class="Front-page-cat-name"> Promos</span></a></h3>	
	<br>
		<div class="container-frontPage">
		<div class="row">
	<?php
			$colCounter = 0;
			
			$d = array();
			foreach ($promos as $value) {
				$d[] = $value;			
			}
			
			foreach ($promos as $value) {
				$reformattedProductName = str_replace(':','',str_replace('\'','',$value['name'])); //remove ":" and "'"
				$URLFriendlyReformattedProductName = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$reformattedProductName)))))); //replace "&", " ", and "-"
				$URLFriendlyReformattedProductAuthor = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$value['author'])))))); //replace "&", " ", and "-"
				
				if ($colCounter==0) {										
					echo '<div class="row no-gutter">';						
					
					echo '<div class="col-sm-1">';
					if (count($promos)>=15) {
						echo "<br><br><br><button id='leftButtonId' onclick='myLeftArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-left-arrow-button'>‹</button>";					
					}
					echo '</div>';
					
					echo '<div class="col-sm-10">';				
					echo '<div>';
					echo '<div class="col-sm-2 Product-item">';					
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/promos/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
//					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
//					if ($value['price']!=null) {

					echo '<br><label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';

					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';					
					}
					echo '</label>';

					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {						
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
										
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<div class="col-sm-2 Product-item">';
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/promos/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
//					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
					echo '<br><label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';
					
					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';
					}
					echo '</label>';
					
					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
					
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($promos))){												
						
						echo '</div>';
						
						echo '<div col-sm-1>';			
						if (count($promos)>=15) {							
							echo "<br><br><br><button id='rightButtonId' onclick='myRightArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-right-arrow-button'>›</button>";
						}
						echo '</div>';
						
						echo '</div>';
						$colCounter=0;
												
						//added by Mike, 20170818
						echo '<hr class="FrontPage-hr">';
						break;
					}
				}
			}			
			echo '</div>';		
			echo '</div>';
	?>
	</div>		
	
	<!-- ################################################################################# -->
	<h3 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/food/')?>">Recommended <span class="Front-page-cat-name"> Food</span></a></h3>	
	<br>
		<div class="container-frontPage">
		<div class="row">
	<?php
			$colCounter = 0;
			
			$d = array();
			foreach ($food as $value) {
				$d[] = $value;			
			}
			
			foreach ($food as $value) {
				$reformattedProductName = str_replace(':','',str_replace('\'','',$value['name'])); //remove ":" and "'"
				$URLFriendlyReformattedProductName = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$reformattedProductName)))))); //replace "&", " ", and "-"
				$URLFriendlyReformattedProductAuthor = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$value['author'])))))); //replace "&", " ", and "-"
				
				if ($colCounter==0) {										
					echo '<div class="row no-gutter">';						
					
					echo '<div class="col-sm-1">';
					if (count($food)>=15) {
						echo "<br><br><br><button id='leftButtonId' onclick='myLeftArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-left-arrow-button'>‹</button>";					
					}
					echo '</div>';
					
					echo '<div class="col-sm-10">';				
					echo '<div>';
					echo '<div class="col-sm-2 Product-item">';					
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/food/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
//					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
//					if ($value['price']!=null) {

					echo '<label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';

					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';					
					}
					echo '</label>';

					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {						
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
										
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<div class="col-sm-2 Product-item">';
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/food/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
//					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
					echo '<label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';
					
					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';
					}
					echo '</label>';
					
					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
					
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($food))){												
						
						echo '</div>';
						
						echo '<div col-sm-1>';			
						if (count($food)>=15) {							
							echo "<br><br><br><button id='rightButtonId' onclick='myRightArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-right-arrow-button'>›</button>";
						}
						echo '</div>';
						
						echo '</div>';
						$colCounter=0;
												
						//added by Mike, 20170818
						echo '<hr class="FrontPage-hr">';
						break;
					}
				}
			}			
			echo '</div>';		
			echo '</div>';
	?>
	</div>		
	
	<!-- ################################################################################# -->
	<h3 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/beverages/')?>">Recommended <span class="Front-page-cat-name"> Beverages</span></a></h3>	
	<br>
		<div class="container-frontPage">
		<div class="row">
	<?php
			$colCounter = 0;
			
			$d = array();
			foreach ($beverages as $value) {
				$d[] = $value;			
			}
			
			foreach ($beverages as $value) {
				$reformattedProductName = str_replace(':','',str_replace('\'','',$value['name'])); //remove ":" and "'"
				$URLFriendlyReformattedProductName = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$reformattedProductName)))))); //replace "&", " ", and "-"
				$URLFriendlyReformattedProductAuthor = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$value['author'])))))); //replace "&", " ", and "-"
				
				if ($colCounter==0) {										
					echo '<div class="row no-gutter">';						
					
					echo '<div class="col-sm-1">';
					if (count($beverages)>=15) {
						echo "<br><br><br><button id='leftButtonId' onclick='myLeftArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-left-arrow-button'>‹</button>";					
					}
					echo '</div>';
					
					echo '<div class="col-sm-10">';				
					echo '<div>';
					echo '<div class="col-sm-2 Product-item">';					
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/beverages/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
//					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
//					if ($value['price']!=null) {

					echo '<label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';

					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';					
					}
					echo '</label>';

					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {						
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
										
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<div class="col-sm-2 Product-item">';
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/beverages/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
//					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
					echo '<label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';
					
					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';
					}
					echo '</label>';
					
					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
					
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($beverages))){												
						
						echo '</div>';
						
						echo '<div col-sm-1>';			
						if (count($beverages)>=15) {							
							echo "<br><br><br><button id='rightButtonId' onclick='myRightArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-right-arrow-button'>›</button>";
						}
						echo '</div>';
						
						echo '</div>';
						$colCounter=0;
												
						//added by Mike, 20170818
						echo '<hr class="FrontPage-hr">';
						break;
					}
				}
			}			
			echo '</div>';		
			echo '</div>';
	?>
	</div>		
	
	<!-- ################################################################################# -->
	<h3 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/comics/')?>">Recommended <span class="Front-page-cat-name"> Comics</span></a></h3>	
	<br>
		<div class="container-frontPage">
		<div class="row">
	<?php
			$colCounter = 0;
			
			$d = array();
			foreach ($comics as $value) {
				$d[] = $value;			
			}
			
			foreach ($comics as $value) {
				$reformattedProductName = str_replace(':','',str_replace('\'','',$value['name'])); //remove ":" and "'"
				$URLFriendlyReformattedProductName = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$reformattedProductName)))))); //replace "&", " ", and "-"
				$URLFriendlyReformattedProductAuthor = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$value['author'])))))); //replace "&", " ", and "-"
				
				if ($colCounter==0) {										
					echo '<div class="row no-gutter">';						
					
					echo '<div class="col-sm-1">';
					if (count($comics)>=15) {
						echo "<br><br><br><button id='leftButtonId' onclick='myLeftArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-left-arrow-button'>‹</button>";					
					}
					echo '</div>';
					
					echo '<div class="col-sm-10">';				
					echo '<div>';
					echo '<div class="col-sm-2 Product-item">';					
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/comics/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
//					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
//					if ($value['price']!=null) {

					echo '<label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';

					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';					
					}
					echo '</label>';

					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {						
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
										
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<div class="col-sm-2 Product-item">';
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/comics/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
//					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
					echo '<label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';
					
					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';
					}
					echo '</label>';
					
					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
					
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($comics))){												
						
						echo '</div>';
						
						echo '<div col-sm-1>';			
						if (count($comics)>=15) {							
							echo "<br><br><br><button id='rightButtonId' onclick='myRightArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-right-arrow-button'>›</button>";
						}
						echo '</div>';
						
						echo '</div>';
						$colCounter=0;
												
						//added by Mike, 20170818
						echo '<hr class="FrontPage-hr">';
						break;
					}
				}
			}			
			echo '</div>';		
			echo '</div>';
	?>
	</div>		
	
	<!-- ################################################################################# -->
	<h3 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/manga/')?>">Recommended <span class="Front-page-cat-name"> Manga</span></a></h3>	
	<br>
		<div class="container-frontPage">
		<div class="row">
	<?php
			$colCounter = 0;
			
			$d = array();
			foreach ($manga as $value) {
				$d[] = $value;			
			}
			
			foreach ($manga as $value) {
				$reformattedProductName = str_replace(':','',str_replace('\'','',$value['name'])); //remove ":" and "'"
				$URLFriendlyReformattedProductName = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$reformattedProductName)))))); //replace "&", " ", and "-"
				$URLFriendlyReformattedProductAuthor = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$value['author'])))))); //replace "&", " ", and "-"
				
				if ($colCounter==0) {										
					echo '<div class="row no-gutter">';						
					
					echo '<div class="col-sm-1">';
					if (count($manga)>=15) {
						echo "<br><br><br><button id='leftButtonId' onclick='myLeftArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-left-arrow-button'>‹</button>";					
					}
					echo '</div>';
					
					echo '<div class="col-sm-10">';				
					echo '<div>';
					echo '<div class="col-sm-2 Product-item">';					
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/manga/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
//					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
//					if ($value['price']!=null) {

					echo '<label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';

					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';					
					}
					echo '</label>';

					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {						
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
										
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<div class="col-sm-2 Product-item">';
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/manga/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
//					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
					echo '<label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';
					
					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';
					}
					echo '</label>';
					
					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
					
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($comics))){												
						
						echo '</div>';
						
						echo '<div col-sm-1>';			
						if (count($manga)>=15) {							
							echo "<br><br><br><button id='rightButtonId' onclick='myRightArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-right-arrow-button'>›</button>";
						}
						echo '</div>';
						
						echo '</div>';
						$colCounter=0;
												
						//added by Mike, 20170818
						echo '<hr class="FrontPage-hr">';
						break;
					}
				}
			}			
			echo '</div>';		
			echo '</div>';
	?>
	</div>		
	
	<!-- ################################################################################# -->
	<h3 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/toys-and-collectibles/')?>">Recommended <span class="Front-page-cat-name"> Toys & Collectibles</span></a></h3>	
	<br>
		<div class="container-frontPage">
		<div class="row">
	<?php
			$colCounter = 0;
			
			$d = array();
			foreach ($toys_and_collectibles as $value) {
				$d[] = $value;			
			}
			
			foreach ($toys_and_collectibles as $value) {
				$reformattedProductName = str_replace(':','',str_replace('\'','',$value['name'])); //remove ":" and "'"
				$URLFriendlyReformattedProductName = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$reformattedProductName)))))); //replace "&", " ", and "-"
				$URLFriendlyReformattedProductAuthor = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$value['author'])))))); //replace "&", " ", and "-"
				
				if ($colCounter==0) {										
					echo '<div class="row no-gutter">';						
					
					echo '<div class="col-sm-1">';
					if (count($manga)>=15) {
						echo "<br><br><br><button id='leftButtonId' onclick='myLeftArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-left-arrow-button'>‹</button>";					
					}
					echo '</div>';
					
					echo '<div class="col-sm-10">';				
					echo '<div>';
					echo '<div class="col-sm-2 Product-item">';					
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/toys_and_collectibles/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
//					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
//					if ($value['price']!=null) {

					echo '<label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';

					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';					
					}
					echo '</label>';

					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {						
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
										
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<div class="col-sm-2 Product-item">';
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/toys_and_collectibles/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
//					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
					echo '<label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';
					
					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';
					}
					echo '</label>';
					
					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
					
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($comics))){												
						
						echo '</div>';
						
						echo '<div col-sm-1>';			
						if (count($toys_and_collectibles)>=15) {							
							echo "<br><br><br><button id='rightButtonId' onclick='myRightArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-right-arrow-button'>›</button>";
						}
						echo '</div>';
						
						echo '</div>';
						$colCounter=0;
												
						//added by Mike, 20170818
						echo '<hr class="FrontPage-hr">';
						break;
					}
				}
			}			
			echo '</div>';		
			echo '</div>';
	?>
	</div>		
	
	<!-- ################################################################################# -->
	<h3 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/miscellaneous/')?>">Recommended <span class="Front-page-cat-name"> Miscellaneous Items</span></a></h3>	
	<br>
		<div class="container-frontPage">
		<div class="row">
	<?php
			$colCounter = 0;
			
			$d = array();
			foreach ($miscellaneous as $value) {
				$d[] = $value;			
			}
			
			foreach ($miscellaneous as $value) {
				$reformattedProductName = str_replace(':','',str_replace('\'','',$value['name'])); //remove ":" and "'"
				$URLFriendlyReformattedProductName = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$reformattedProductName)))))); //replace "&", " ", and "-"
				$URLFriendlyReformattedProductAuthor = str_replace("(","",
														str_replace(")","",
														str_replace("&","and",
														str_replace(',','',
														str_replace(' ','-',
														str_replace('/','-',
														$value['author'])))))); //replace "&", " ", and "-"
				
				if ($colCounter==0) {										
					echo '<div class="row no-gutter">';						
					
					echo '<div class="col-sm-1">';
					if (count($miscellaneous)>=15) {
						echo "<br><br><br><button id='leftButtonId' onclick='myLeftArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-left-arrow-button'>‹</button>";					
					}
					echo '</div>';
					
					echo '<div class="col-sm-10">';				
					echo '<div>';
					echo '<div class="col-sm-2 Product-item" id="Product-item">';					
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/miscellaneous/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
//					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
//					if ($value['price']!=null) {

					echo '<label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';

					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';					
					}
					echo '</label>';

					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {						
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
										
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<div class="col-sm-2 Product-item" id="Product-item">';
					echo '<a id="linkId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img id="imageId~'.$colCounter.'~'.$value['product_type_id'].'" class="Image-item" src="'.base_url('assets/images/miscellaneous/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
//					echo '<span id="authorId~'.$colCounter.'~'.$value['product_type_id'].'">'.$value['author'].'</span>';
					
					echo '<label id="priceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-price">';
					
					if ($value['quantity_in_stock']!=0) {
						echo '&#x20B1;'.$value['price'];
					}
					else {
						echo 'out of stock';
					}
					echo '</label>';
					
					echo '<label id="previousPriceId~'.$colCounter.'~'.$value['product_type_id'].'" class="Product-item-previous-price">';
					if (isset($value['previous_price'])) {
						echo '&ensp;('.$value['previous_price'].')';
					}
					echo '</label>';
					
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($miscellaneous))){												
						
						echo '</div>';
						
						echo '<div col-sm-1>';			
						if (count($toys_and_collectibles)>=15) {							
							echo "<br><br><br><button id='rightButtonId' onclick='myRightArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').", ".$value['product_type_id'].")' class='Front-page-right-arrow-button'>›</button>";
						}
						echo '</div>';
						
						echo '</div>';
						$colCounter=0;
												
						//added by Mike, 20170818
						echo '<hr class="FrontPage-hr">';
						break;
					}
				}
			}			
			echo '</div>';		
			echo '</div>';
	?>
	</div>		
</body>
</html>
