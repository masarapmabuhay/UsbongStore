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
	</div>

<!-- ################################################################################# -->
	<h2 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/books/')?>">Books</a></h2>	
	<br>
		<div class="container-frontPage">
		<div class="row">
	<?php
			$colCounter = 0;
			
			$d = array();
			foreach ($books as $value) {
//				$d[] = array_map("utf8_encode", $value);
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
					echo "<br><br><br><button id='leftButtonId' onclick='myLeftArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').")' class='Front-page-left-arrow-button'>‹</button>";
					echo '</div>';
					
					echo '<div class="col-sm-10">';				
					echo '<div>';
					echo '<div class="col-sm-2 Product-item">';					
					echo '<a id="linkId~'.$colCounter.'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img id="imageId~'.$colCounter.'" class="Image-item" src="'.base_url('assets/images/books/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
					echo '<span id="authorId~'.$colCounter.'">'.$value['author'].'</span>';
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<br><label id="priceId~'.$colCounter.'" class="Product-item-price">&#x20B1;'.$value['price'].'</label>';

						if (isset($value['previous_price'])) {
							echo '<label id="previousPriceId~'.$colCounter.'" class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
						
						echo '</label>';					
					}
					else {
						echo '<br><label class="Product-item-price">out of stock</label>';					
						echo '</label>';
					}			
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<a id="linkId~'.$colCounter.'" class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img id="imageId~'.$colCounter.'" class="Image-item" src="'.base_url('assets/images/books/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div id="nameId~'.$colCounter.'" class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
					echo '<span id="authorId~'.$colCounter.'">'.$value['author'].'</span>';
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<br><label id="priceId~'.$colCounter.'" class="Product-item-price">&#x20B1;'.$value['price'].'</label>';

						if (isset($value['previous_price'])) {
							echo '<label id="previousPriceId~'.$colCounter.'" class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
												
						echo '</label>';
					}
					else {
						echo '<br><label class="Product-item-price">out of stock</label>';
						echo '</label>';
					}
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($books))){												
						
						echo '</div>';
						
						echo '<div col-sm-1>';						
						echo "<br><br><br><button id='rightButtonId' onclick='myRightArrowFunction(".htmlspecialchars(json_encode($d), ENT_QUOTES, 'UTF-8').")' class='Front-page-right-arrow-button'>›</button>";
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
	<h2 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/childrens/')?>">Children's Books</a></h2>	
	<br>
		<div class="container-frontPage">	
		<div class="row">
	<?php
			$colCounter = 0;
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
					echo '<div class="row">';	
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
					echo '<img class="Image-item" src="'.base_url('assets/images/childrens/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<br><label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';

						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
						
						echo '</label>';					
					}
					else {
						echo '<br><label class="Product-item-price">out of stock</label>';					
						echo '</label>';
					}			
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
					echo '<img class="Image-item" src="'.base_url('assets/images/childrens/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<br><label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';

						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
						
						echo '</label>';
					}
					else {
						echo '<br><label class="Product-item-price">out of stock</label>';
						echo '</label>';
					}
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($childrens))){
						echo '</div>';
						$colCounter=0;
						
						//added by Mike, 20170818
						echo '<hr class="FrontPage-hr">';
						break;						
					}
				}/*
				else {
					echo '</div>';
					$colCounter=0;
				}*/
			}
			echo '</div>';
			echo '</div>';
	?>
	</div>	

<!-- ################################################################################# -->
	<h2 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/textbooks/')?>">Textbooks</a></h2>	
	<br>
		<div class="container-frontPage">	
		<div class="row">
	<?php
			$colCounter = 0;
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
					echo '<div class="row">';	
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/textbooks/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<br><label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';
						
						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
						
						echo '</label>';					
					}
					else {
						echo '<br><label class="Product-item-price">out of stock</label>';					
						echo '</label>';
					}			
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/textbooks/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<br><label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';
						
						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
												
						echo '</label>';
					}
					else {
						echo '<br><label class="Product-item-price">out of stock</label>';
						echo '</label>';
					}
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($textbooks))){
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
	<h2 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/promos/')?>">Promos</a></h2>	
	<br>	
		<div class="container-frontPage">		
		<div class="row">
	<?php
			$colCounter = 0;
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
					echo '<div class="row">';	
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/promos/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
//					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';

						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
						
						echo '</label>';					
					}
					else {
						echo '<br><label class="Product-item-price">out of stock</label>';					
						echo '</label>';
					}			
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/promos/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
//					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';

						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
						
						echo '</label>';
					}
					else {
						echo '<br><label class="Product-item-price">out of stock</label>';
						echo '</label>';
					}
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($promos))){
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
	<h2 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/food/')?>">Food</a></h2>	
	<br>	
		<div class="container-frontPage">		
		<div class="row">
	<?php
			$colCounter = 0;
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
					echo '<div class="row">';	
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/food/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
//					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';
						
						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}						
						
						echo '</label>';					
					}
					else {
						echo '<label class="Product-item-price">out of stock</label>';					
						echo '</label>';
					}			
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/food/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
//					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';

						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
						
						echo '</label>';
					}
					else {
						echo '<label class="Product-item-price">out of stock</label>';
						echo '</label>';
					}
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($food))){
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
	<h2 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/beverages/')?>">Beverages</a></h2>	
	<br>	
		<div class="container-frontPage">		
		<div class="row">
	<?php
			$colCounter = 0;
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
					echo '<div class="row">';	
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/beverages/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
//					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';
						
						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}						
						
						echo '</label>';					
					}
					else {
						echo '<br><label class="Product-item-price">out of stock</label>';					
						echo '</label>';
					}			
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/beverages/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
//					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';

						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
						
						echo '</label>';
					}
					else {
						echo '<br><label class="Product-item-price">out of stock</label>';
						echo '</label>';
					}
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($beverages))){
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
	<h2 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/comics/')?>">Comics</a></h2>	
	<br>	
		<div class="container-frontPage">		
		<div class="row">
	<?php
			$colCounter = 0;
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
					echo '<div class="row">';	
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/comics/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
//					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';

						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
												
						echo '</label>';					
					}
					else {
						echo '<br><label class="Product-item-price">out of stock</label>';					
						echo '</label>';
					}			
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/comics/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
//					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';

						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
												
						echo '</label>';
					}
					else {
						echo '<br><label class="Product-item-price">out of stock</label>';
						echo '</label>';
					}
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($comics))){
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
	<h2 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/manga/')?>">Manga</a></h2>	
	<br>	
		<div class="container-frontPage">		
		<div class="row">
	<?php
			$colCounter = 0;
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
					echo '<div class="row">';	
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/manga/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
//					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';

						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
						
						echo '</label>';					
					}
					else {
						echo '<br><label class="Product-item-price">out of stock</label>';					
						echo '</label>';
					}			
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/manga/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
//					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';

						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
						
						echo '</label>';
					}
					else {
						echo '<br><label class="Product-item-price">out of stock</label>';
						echo '</label>';
					}
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($manga))){
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
	<h2 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/toys-and-collectibles/')?>">Toys & Collectibles</a></h2>	
	<br>	
		<div class="container-frontPage">		
		<div class="row">
	<?php
			$colCounter = 0;
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
					echo '<div class="row">';	
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/toys_and_collectibles/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
//					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';

						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
												
						echo '</label>';					
					}
					else {
						echo '<br><label class="Product-item-price">out of stock</label>';					
						echo '</label>';
					}			
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/toys_and_collectibles/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
//					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';

						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
												
						echo '</label>';
					}
					else {
						echo '<br><label class="Product-item-price">out of stock</label>';
						echo '</label>';
					}
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($toys_and_collectibles))){
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
	<h2 class="header"><a class="FrontPage-header-link" href="<?php echo site_url('b/miscellaneous/')?>">Miscellaneous</a></h2>	
	<br>	
		<div class="container-frontPage">		
		<div class="row">
	<?php
			$colCounter = 0;
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
					echo '<div class="row">';	
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/miscellaneous/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';
//					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';
						
						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}						
						
						echo '</label>';					
					}
					else {
						echo '<label class="Product-item-price">out of stock</label>';					
						echo '</label>';
					}			
					echo '</a>';
					echo '</div>';
					$colCounter++;				
				}
				else if ($colCounter<5){
					echo '<a class="Product-item" href="'.site_url('w/'.$URLFriendlyReformattedProductName.'-'.$URLFriendlyReformattedProductAuthor.'/'.$value['product_id']).'">';
					echo '<div class="col-sm-2 Product-item">';
/*					echo '<button class="Button-merchant">&#x2617; Usbong Specialty Bookstore</button>';				
*/
					echo '<img class="Image-item" src="'.base_url('assets/images/miscellaneous/'.$reformattedProductName.'.jpg').'">';
					echo '<br><div class="Product-item-titleOnly">'.$value['name'].'</div>';
					echo '<label class="Product-item-details">';					
//					echo $value['author'];
					
//					if ($value['price']!=null) {
					if ($value['quantity_in_stock']!=0) {
						echo '<label class="Product-item-price">&#x20B1;'.$value['price'].'</label>';

						if (isset($value['previous_price'])) {
							echo '<label class="Product-item-previous-price">&ensp;('.$value['previous_price'].')</label>';
						}
						
						echo '</label>';
					}
					else {
						echo '<label class="Product-item-price">out of stock</label>';
						echo '</label>';
					}
					echo '</a>';
					echo '</div>';
					$colCounter++;
					
					if (($colCounter==5) || ($colCounter==count($miscellaneous))){
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
