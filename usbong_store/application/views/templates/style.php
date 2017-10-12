<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="icon" type="image/ico" href="<?=base_url()?>/favicon.ico"> 
	
	<script>
		//Reference: https://www.w3schools.com/howto/howto_js_dropdown.asp;
		//last accessed: 20170622
		/* When the user clicks on the button, 
		toggle between hiding and showing the dropdown content */
		function myFunction(id) {
		    document.getElementById("myDropdown"+id).classList.toggle("show");
		}

//		window.onclick = function(event) {
		$(document).click(function(){
// 			$("#dropbtn").hide();
//			if (!event.target.matches('.dropbtn')) {				
//			if (event.target.matches('.window')) {
/*
				if (!event) { 
					var event = window.event; 
				}
*/	
/*
				var S = event.srcElement ? event.srcElement : event.target;
				if(($(S).attr('id')!='myDropDown')||$(S).hasClass('option')==false)
				{ 
					alert("hello");
					$('.dropdown-content').hide();
				}
*/
//				$("div").is(".dropdown-content").hide();
				$(".dropdown-content").hide();
//			}
		});
	</script>
	
	<script>
		//Reference: https://www.w3schools.com/howto/howto_js_scroll_to_top.asp;
		//last accessed: 20170824
		function upliftFunction() {
		    document.body.scrollTop = 0; // For Chrome, Safari and Opera 
		    document.documentElement.scrollTop = 0; // For IE and Firefox
		}	
	</script>

	<script>
//		var isEnabled = false;
		
		function clickShipToMOSCFunction(isEnabled) {
//			alert("hello");

			if (isEnabled==0) {
				document.getElementById("shippingAddressId").value = '2 E. Rodriguez Ave. Sto. Niño';
				document.getElementById("cityId").value = 'Marikina City';
				document.getElementById("countryId").value = 'Philippines';
				document.getElementById("postalCodeId").value = '1800';
//				isEnabled=true;
				document.getElementById("shippingToMOSCId").value = '1';				

				//added by Mike, 20170911
				document.getElementById("meetupAtMOSCDiscountId").innerHTML = '-&#x20B1;70';				
				document.getElementById("orderTotalId2").innerHTML = parseInt(document.getElementById("orderTotalId2").innerHTML)-70;		

				//added by Mike, 20170918
				document.getElementById("modeOfPaymentBankDepositId").checked = false;				
				document.getElementById("modeOfPaymentPaypalId").checked = false;		
				document.getElementById("modeOfPaymentMeetupAtMOSCId").checked = true;		
			}
			else {
				document.getElementById("shippingAddressId").value = '';
				document.getElementById("cityId").value = '';
				document.getElementById("countryId").value = '';
				document.getElementById("postalCodeId").value = '';					
//				isEnabled=false;				
				document.getElementById("shippingToMOSCId").value = '0';				

				//added by Mike, 20170911
				document.getElementById("meetupAtMOSCDiscountId").innerHTML = '-&#x20B1;0';				
				document.getElementById("orderTotalId2").innerHTML = parseInt(document.getElementById("orderTotalId2").innerHTML)+70;		

				//added by Mike, 20170918
				document.getElementById("modeOfPaymentBankDepositId").checked = true;				
				document.getElementById("modeOfPaymentPaypalId").checked = false;		
				document.getElementById("modeOfPaymentMeetupAtMOSCId").checked = false;		
			}

//			alert("hello: "+document.getElementById("shippingAddressId").value);
			
		}	
	</script>
		
	<script type="text/javascript">
//		var leftArrowClickNum = 0;
//		var rightArrowClickNum = 1; //starts at 1

//		var clickNumArray[productTypeId] = 0;

		var clickNumArray = [];
		for (var i=0; i<15; i++) {
			clickNumArray.push(0);
		}

		//added by Mike, 20170830
		var imgIds = [];
		var imgAddresses = [];
		
		function myLeftArrowFunction(data, productTypeId) {				
			if (imgIds.length > 0) { //imgAddresses
				return;
			}

			var productType;
			switch (productTypeId) {
				case 2:
					productType = "books";
					break;
				case 10:
					productType = "childrens";
					break;					
				case 9:
					productType = "textbooks";
					break;				
				case 5:
					productType = "promos";
					break;						
				case 11:
					productType = "food";
					break;						
				case 3:
					productType = "beverages";
					break;						
				case 6:
					productType = "comics";
					break;						
				case 7:
					productType = "manga";
					break;																		
				case 8:
					productType = "toys_and_collectibles";
					break;																		
				case 12:
					productType = "miscellaneous";
					break;																							
			}			 
						
//			alert("clickNumArray[productTypeId]: "+clickNumArray[productTypeId]);

			if ((clickNumArray[productTypeId]==0) || (clickNumArray[productTypeId]==1)) {
				clickNumArray[productTypeId]=-1;
			}
			
//			alert("hello "+productTypeId);
					
			//reverse the order of the array
//			data.reverse();

			var index;

			if (clickNumArray[productTypeId]>0) { //postive number
				//why 5? there is always 5 product items in a row
				var sum = ((clickNumArray[productTypeId]*5)-5); //+1
				if (sum < 0) {
					index = sum + 5;
/*					
					index = data.length - 1;
					clickNumArray[productTypeId] = -1;
*/					
				}
				else {
					index = sum-5;
					clickNumArray[productTypeId]--;
				}			
			}
			else { //negative number
				
				sum = data.length - Math.abs(clickNumArray[productTypeId])*5 +5;
/*
//				alert("data.length: "+data.length);				
				alert("hello: "+clickNumArray[productTypeId]);
				alert("sum: "+sum);
*/
				if (data.length%5==0) {
					if (sum <= 0) {
						index = data.length - 5;
						clickNumArray[productTypeId]=-1;
					}
					else if (sum == data.length) {
						index = data.length - 5;
					}
					else {					
						index = sum - 5;					
					}
				}
				else {
					if (sum <= 0) {
						index = data.length - (data.length%5);
						clickNumArray[productTypeId]=-1;
					}
					else if (sum == data.length) {
						index = data.length - (data.length%5);
//						clickNumArray[productTypeId]--;
					}
					else {					
						index = sum - data.length%5;
//						index = data.length - sum+5;
					}
				}				
				clickNumArray[productTypeId]--;
//				alert("index: "+index);				
			}

			var hasReachedDataLength=false;			
			var totalColumns = 5;
		    for (var i = 0; i < totalColumns; i++) { //5 product items per row only
//		    	colNum = totalColumns - i -1; //column numbering starts at 0
				colNum = i;
/*				
				alert("Hello "+colNum);				    					
				alert("index "+index);				    					
*/
				//-----------------------------------------------
				//formatting
				//-----------------------------------------------								
				var reformattedProductName = data[index].name.replace(new RegExp(':', 'g'),'').replace(new RegExp('\'', 'g'),'');

				var urlFriendlyReformattedProductName = reformattedProductName.replace(new RegExp('[(),]', 'g'),'').replace(new RegExp('[ /]', 'g'),'-').replace(new RegExp('[&]', 'g'),'and');

				var urlFriendlyReformattedAuthor;
				if (data[index].author!=null) {
					urlFriendlyReformattedAuthor = data[index].author.replace(new RegExp('[(),]', 'g'),'').replace(new RegExp('[ /]', 'g'),'-').replace(new RegExp('[&]', 'g'),'and');
				}
				
		    	//-----------------------------------------------
		    	//product name
		    	//-----------------------------------------------		    	
		    	var productName = document.getElementById("nameId~"+colNum+"~"+productTypeId);
		    	
				if (!hasReachedDataLength) {			    	
					//edited by Mike, 20170902
					var trimmedName = data[index].name;
					if (data[index].name.length>32) {
						trimmedName = trimmedName.substr(0,32).trim().concat("...");
					}
		    		productName.innerHTML = trimmedName;					
				}
				else {
					productName.innerHTML = '';					
				}

		    	//-----------------------------------------------
		    	//link name
		    	//-----------------------------------------------		    	
		    	var linkName = document.getElementById("linkId~"+colNum+"~"+productTypeId);
				var site_url = "<?php echo site_url('w/');?>";				
				var link_url = site_url.concat(urlFriendlyReformattedProductName,"-",urlFriendlyReformattedAuthor,"/",data[index].product_id);			    	

				if (!hasReachedDataLength) {			    	
					linkName.href = link_url;		
				}
				else {
//					linkName.href = '';		
//					linkName.removeAttribute("href");
//					linkName.innerHTML = "";		
//					linkName.disabled = true;
//					linkName.remove();
					linkName.style.pointerEvents="none";
					linkName.style.cursor="default";
				}
				
//				alert("colNum"+colNum+"~"+productTypeId);
//				alert("linkName.href: "+linkName.href);
				
		    	//-----------------------------------------------
		    	//image name
		    	//-----------------------------------------------		    									
		    	var imageName = document.getElementById("imageId~"+colNum+"~"+productTypeId);				
				var base_url = "<?php echo site_url('assets/images/');?>";
				var my_url = base_url.concat(productType,'/',reformattedProductName,".jpg");

				//edited by Mike, 20170830
//				imageName.src = my_url;
				if (!hasReachedDataLength) {			    					
					imgAddresses.push(my_url);
					imgIds.push(imageName);
				}
				else {
//					imageName.src = '#';
//					imageName.remove();
					imgAddresses.push(base_url.concat("blank_image.png"));
					imgIds.push(imageName);					
				}

		    	//-----------------------------------------------
		    	//author name
		    	//-----------------------------------------------		 
		    	if ((data[index].author!=null) && (productType != "promos") && (productType != "comics") 
				    	&& (productType != "manga") && (productType != "beverages") 
				    	&& (productType != "toys_and_collectibles") && (productType != "miscellaneous")) {  								
			    	var authorName = document.getElementById("authorId~"+colNum+"~"+productTypeId);

					if (!hasReachedDataLength) {			
						//edited by Mike, 20170902
						var trimmedAuthor = data[index].author;
						if (data[index].author.length>32) {
							trimmedAuthor = data[index].author.substr(0,32).trim().concat("...");
						}
						authorName.innerHTML = trimmedAuthor;		
					}
					else {
						authorName.innerHTML = '';		
					}
		    	}
		    	
		    	//-----------------------------------------------
		    	//price name
		    	//-----------------------------------------------		    								
		    	var priceName = document.getElementById("priceId~"+colNum+"~"+productTypeId);			    			    	

				if (!hasReachedDataLength) {			    					
			    	if (data[index].quantity_in_stock!=0) {
						priceName.innerText = "₱" + data[index].price;		
			    	}
			    	else {
						priceName.innerText = "out of stock";		
			    	}
				}
				else {
					priceName.innerText = '';		
				}
				
		    	//-----------------------------------------------
		    	//previous price name
		    	//-----------------------------------------------		    								
				var previousPriceName = document.getElementById("previousPriceId~"+colNum+"~"+productTypeId);			    			    	

				if (!hasReachedDataLength) {			    								    	
			    	if (data[index].previous_price!=null) {
			    		previousPriceName.innerHTML = "&ensp;(" + data[index].previous_price + ")";					
					}
			    	else {
			    		previousPriceName.innerHTML = "";					
			    	}
				}
				else {
		    		previousPriceName.innerHTML = '';					
				}
		    	
				index++;
//				alert("index: "+index);

				if (index == data.length) {
//					alert("hello");
					hasReachedDataLength=true;
					index = 5 - (colNum+1);
				}
		    }

//		    imgAddresses.reverse();
//		    imgIds.reverse();
		    loadImage(0);		    
		}

		//Reference: https://stackoverflow.com/questions/4211519/controlling-image-load-order-in-html;
		//last accessed: 20170830
		//answer by: Ben; Edited by: Ploink
		//added by Mike, 20170830
		function loadImage(counter) {
			  //Break out if no more images
			  if (counter==imgAddresses.length) { 
				 //empty the arrays
				 imgIds = [];
				 imgAddresses = [];

				 return; 
			  }

			  //Grab an image obj
			  var I = imgIds[counter];

			  //Monitor load or error events, moving on to next image in either case
			  I.onload = I.onerror = function() { loadImage(counter+1); }

			  //Change source (then wait for event)
			  I.src = imgAddresses[counter];
		}
		
		function myRightArrowFunction(data, productTypeId) {	
			if (imgIds.length > 0) { //imgAddresses
				return;
			}			

			var productType;
			switch (productTypeId) {
				case 2:
					productType = "books";
					break;
				case 10:
					productType = "childrens";
					break;
				case 9:
					productType = "textbooks";
					break;
				case 5:
					productType = "promos";
					break;
				case 11:
					productType = "food";					
					break;				
				case 3:
					productType = "beverages";
					break;						
				case 6:
					productType = "comics";
					break;																		
				case 7:
					productType = "manga";
					break;																		
				case 8:
					productType = "toys_and_collectibles";
					break;																		
				case 12:
					productType = "miscellaneous";
					break;																		
			}

			if (clickNumArray[productTypeId]==0) {
				clickNumArray[productTypeId]=1;
			}

//			alert("hello "+productTypeId);
			
			//reverse the order of the array
			//data.reverse();

			var index;
//			alert("clickNumArray[productTypeId]: "+clickNumArray[productTypeId]);

			if (clickNumArray[productTypeId]>0) {
				//why 5? there is always 5 product items in a row
				var sum = ((clickNumArray[productTypeId]*5)+5); //+1

				if (sum > data.length) {
//					index = (5 - sum % data.length) - 1; //starts at 0
					index = sum - 5;
/*
					if (index==-1) { //happens when data.length is exactly a multiple of 5
						index=0;
					}
					
					clickNumArray[productTypeId] = 1; //starts at 1
*/					
				}
				else {
					index = clickNumArray[productTypeId]*5;
					clickNumArray[productTypeId]++;
				}			
			}
			else { //negative number								
				sum = (clickNumArray[productTypeId]+1)*5 +5;
//				alert("sum "+sum);

				if (data.length%5==0) {
					if (sum >= 0) {
						index = 0;
						clickNumArray[productTypeId] = 0;
					}
					else {
						index = data.length + sum;
						clickNumArray[productTypeId]++;
					}
				}
				else {
//					alert("sum "+sum);
					if (sum >= 0) {
						index = 0;
						clickNumArray[productTypeId] = 0;
					}
					else {
						index = data.length - data.length%5  + (sum+5);

//						alert("index "+index);

						clickNumArray[productTypeId]++;
					}
				}
//				alert("clickNumArray[productTypeId] "+clickNumArray[productTypeId]);
				
			}

			var hasReachedDataLength=false;
			var totalColumns = 5;
		    for (var i = 0; i < totalColumns; i++) { //5 product items per row only
//		    	colNum = totalColumns - i -1; //column numbering starts at 0
//				alert("Hello "+colNum);				    					
				colNum = i;

				//-----------------------------------------------
				//formatting
				//-----------------------------------------------						
				var reformattedProductName = data[index].name.replace(new RegExp(':', 'g'),'').replace(new RegExp('\'', 'g'),'');

				var urlFriendlyReformattedProductName = reformattedProductName.replace(new RegExp('[(),]', 'g'),'').replace(new RegExp('[ /]', 'g'),'-').replace(new RegExp('[&]', 'g'),'and');

				var urlFriendlyReformattedAuthor;
				if (data[index].author!=null) {
					urlFriendlyReformattedAuthor = data[index].author.replace(new RegExp('[(),]', 'g'),'').replace(new RegExp('[ /]', 'g'),'-').replace(new RegExp('[&]', 'g'),'and');
				}

		    	//-----------------------------------------------				
				//product item 
				//-----------------------------------------------
//				var productItem = document.getElementById('Product-item');
				//productItem.style.left = parseFloat(getComputedStyle(this).left) + 42 + 'px';
/*
				$("#ProductItem").animate({
		            left: '250px',
		            height: '+=150px',
		            width: '+=150px'
		        });
*/

		    	//-----------------------------------------------
		    	//product name
		    	//-----------------------------------------------		    	
		    	var productName = document.getElementById("nameId~"+colNum+"~"+productTypeId);

				if (!hasReachedDataLength) {
					//edited by Mike, 20170902
					var trimmedName = data[index].name;
					if (data[index].name.length>32) {
						trimmedName = data[index].name.substr(0,32).trim().concat("...");
					}
		    		productName.innerHTML = trimmedName;					
				}
				else {
					productName.innerHTML = '';		
				}

		    	//-----------------------------------------------
		    	//link name
		    	//-----------------------------------------------		    	
		    	var linkName = document.getElementById("linkId~"+colNum+"~"+productTypeId);
				var site_url = "<?php echo site_url('w/');?>";				
				var link_url = site_url.concat(urlFriendlyReformattedProductName,"-",urlFriendlyReformattedAuthor,"/",data[index].product_id);			    	

				if (!hasReachedDataLength) {
					linkName.href = link_url;		
				}
				else {
//					linkName.href = 'javascript: void(0)';		
//					linkName.removeAttribute("href");
//					linkName.innerHTML = "";		
//					linkName.disabled = true;
//					linkName.remove();
					linkName.style.pointerEvents="none";
					linkName.style.cursor="default";
				}
									
//				alert("colNum"+colNum+"~"+productTypeId);
//				alert("linkName.href: "+linkName.href);
				
		    	//-----------------------------------------------
		    	//image name
		    	//-----------------------------------------------		    					
				var reformattedProductName = data[index].name.replace(':','').replace('\'','');
				
		    	var imageName = document.getElementById("imageId~"+colNum+"~"+productTypeId);				
				var base_url = "<?php echo site_url('assets/images/');?>";
				var my_url = base_url.concat(productType,'/',reformattedProductName,".jpg");

				//edited by Mike, 20170830
//				imageName.src = my_url;
				if (!hasReachedDataLength) {				
					imgAddresses.push(my_url);
					imgIds.push(imageName);
				}
				else {
//					imageName.src = '#';
//					imageName.remove();
					imgAddresses.push(base_url.concat("blank_image.png"));
					imgIds.push(imageName);
				}

				//-----------------------------------------------
		    	//author name
		    	//-----------------------------------------------				    	    								
		    	if ((data[index].author!=null) && (productType != "promos") && (productType != "comics") 
				    	&& (productType != "manga") && (productType != "beverages") 
				    	&& (productType != "toys_and_collectibles") && (productType != "miscellaneous")) {  								
			    	var authorName = document.getElementById("authorId~"+colNum+"~"+productTypeId);

					if (!hasReachedDataLength) {
						//edited by Mike, 20170902
						var trimmedAuthor = data[index].author;
						if (data[index].author.length>32) {
							trimmedAuthor = data[index].author.substr(0,32).trim().concat("...");
						}
						authorName.innerHTML = trimmedAuthor;		
					}
					else {
			    		authorName.innerHTML = '';		
					}					
		    	}

		    	//-----------------------------------------------
		    	//price name
		    	//-----------------------------------------------		    								
		    	var priceName = document.getElementById("priceId~"+colNum+"~"+productTypeId);			    			    	
				if (!hasReachedDataLength) {				    	
			    	if (data[index].quantity_in_stock!=0) {
						priceName.innerText = "₱" + data[index].price;		
			    	}
			    	else {
						priceName.innerText = "out of stock";		
			    	}
				}
				else {
					priceName.innerText = '';
				}
				
		    	//-----------------------------------------------
		    	//previous price name
		    	//-----------------------------------------------		    								
				var previousPriceName = document.getElementById("previousPriceId~"+colNum+"~"+productTypeId);

				if (!hasReachedDataLength) {				    				    	
			    	if (data[index].previous_price!=null) {
			    		previousPriceName.innerHTML = "&ensp;(" + data[index].previous_price + ")";					
					}
			    	else {
			    		previousPriceName.innerHTML = "";					
			    	}
				}
				else {
		    		previousPriceName.innerHTML = '';					
				}
		    			    			    	
				index++;

				if (index == data.length) {
//					alert("hello");
					clickNumArray[productTypeId] = -2; //starts at 0					
					hasReachedDataLength=true;
					index = 5 - (colNum+1);
				}
		    }

		    imgAddresses.reverse();
		    imgIds.reverse();		    
		    loadImage(0); //added by Mike, 20170830
		}
	</script>
	
	<script>
		//-----------------------------------------------------------
		//PRODUCT ITEM PAGE
		//-----------------------------------------------------------

		//added by Mike, 20170626
		function myPopupFunction() {				
			var product_id = document.getElementById("product_idParam").value;
			var customer_id = document.getElementById("customer_idParam").value;
			var quantity = document.getElementById("quantityParam").value;
			var price = document.getElementById("priceParam").value;
			
			var textCart = document.getElementById("Text-cartId");
			var textCart2Digits = document.getElementById("Text-cart-2digitsId");
			var textCart3Digits = document.getElementById("Text-cart-3digitsId");
	
			var totalItemsInCart = parseInt(document.getElementById("totalItemsInCartId").value);
			//do the following only if quantity is a Number, i.e. not NaN
			if (!isNaN(quantity)) {								
				//added by Mike, 20170701
				var quantityField = document.getElementById("quantityId");
				if (quantity>1) {
					quantityField.innerHTML = "Added <b>" +quantity +"</b> units of ";
				}
				else {
					quantityField.innerHTML = "Added <b>1</b> unit of ";
				}

				var productPriceField = document.getElementById("productPriceId");
				var totalPrice = quantity*price;
				productPriceField.innerHTML = totalPrice;								
				//-----------------------------------------------------------
				
				totalItemsInCart+=parseInt(quantity);
				if (totalItemsInCart>99) {
					totalItemsInCart=99;
				}
	
				document.getElementById("totalItemsInCartId").value = totalItemsInCart;
						
				//added by Mike, 20170627
				if (customer_id=="") {
					window.location.href = "<?php echo site_url('account/login/');?>";
				}
				else {				
		//			var base_url = window.location.origin;
					var site_url = "<?php echo site_url('cart/addToCart/');?>";
					var my_url = site_url.concat(product_id,'/',customer_id,'/',quantity,'/',price);
					
					$.ajax({
				        type:"POST",
				        url:my_url,
		
				        success:function() {			        	
				        	if (totalItemsInCart<10) {
					        	textCart.innerHTML=totalItemsInCart;
								textCart2Digits.innerHTML="";
								textCart3Digits.innerHTML="";
				        	}
							else if (totalItemsInCart<100) {
					        	textCart.innerHTML="";
								textCart2Digits.innerHTML=totalItemsInCart;
								textCart3Digits.innerHTML="";
							}
							else {
					        	textCart.innerHTML="";
								textCart2Digits.innerHTML="";
								textCart3Digits.innerHTML=totalItemsInCart;
							}
							
							document.getElementById("myPopup").classList.toggle("show");			        
				        }
		
				    });
				    event.preventDefault();
				}
			}
		}	
/*
		// Close the dropdown menu if the user clicks outside of it
		window.onclick = function(event) {
		  if (!event.target.matches('.Button-purchase')) {
		
		    var dropdowns = document.getElementsByClassName("popup-content");
		    var i;
		    for (i = 0; i < dropdowns.length; i++) {
		      var openDropdown = dropdowns[i];
		      if (openDropdown.classList.contains('show')) {
		        openDropdown.classList.remove('show');
		      }
		    }
		  }
		}		
*/		
	</script>

	<script>
		//-----------------------------------------------------------
		//SEARCH PRODUCT PAGE
		//-----------------------------------------------------------

		//added by Mike, 20170626
		function myPopupFunctionInSearchPage(id) {	
			var trimmedId = id.split("~")[0].substring("addToCartId".length, id.length);
			var totalItemsInCart = id.split("~")[1];	
			
			var product_id = document.getElementById("productId"+trimmedId).value;
			var quantity = document.getElementById("quantityId"+trimmedId+"~"+totalItemsInCart).value;
			
// 			var product_id = document.getElementById("product_idParam").value;
			var customer_id = document.getElementById("customer_idParam").value;
// 			var quantity = document.getElementById("quantityParam").value;
			var price = document.getElementById("priceParam").value;
			
			var textCart = document.getElementById("Text-cartId");
			var textCart2Digits = document.getElementById("Text-cart-2digitsId");
			var textCart3Digits = document.getElementById("Text-cart-3digitsId");
	
			var totalItemsInCart = parseInt(document.getElementById("totalItemsInCartId").value);

			//do the following only if quantity is a Number, i.e. not NaN
			if (!isNaN(quantity)) {								
				//added by Mike, 20170701
				var quantityField = document.getElementById("quantityId");

				if (quantity>1) {
					quantityField.innerHTML = "Added <b>" +quantity +"</b> units of ";
				}
				else {
					quantityField.innerHTML = "Added <b>1</b> unit of ";
				}

				//-----------------------------------------------------------

				var productName = document.getElementById("productName"+trimmedId).value;				
				var productNameField = document.getElementById("productNameId");
				productNameField.innerHTML = productName;

				//-----------------------------------------------------------

				var productImageSrc = document.getElementById("productImage"+trimmedId).value;
				var productImageId = document.getElementById("productImageId");
				productImageId.src = productImageSrc;
								
				//-----------------------------------------------------------
				
				totalItemsInCart+=parseInt(quantity);

				if (totalItemsInCart>99) {
					totalItemsInCart=99;
				}
	
				document.getElementById("totalItemsInCartId").value = totalItemsInCart;
						
				//added by Mike, 20170627
				if (customer_id=="") {
					window.location.href = "<?php echo site_url('account/login/');?>";
				}
				else {				
		//			var base_url = window.location.origin;
					var site_url = "<?php echo site_url('cart/addToCart/');?>";
					var my_url = site_url.concat(product_id,'/',customer_id,'/',quantity,'/',price);
					
					$.ajax({
				        type:"POST",
				        url:my_url,
		
				        success:function() {			        	
				        	if (totalItemsInCart<10) {
					        	textCart.innerHTML=totalItemsInCart;
								textCart2Digits.innerHTML="";
								textCart3Digits.innerHTML="";
				        	}
							else if (totalItemsInCart<100) {
					        	textCart.innerHTML="";
								textCart2Digits.innerHTML=totalItemsInCart;
								textCart3Digits.innerHTML="";
							}
							else {
					        	textCart.innerHTML="";
								textCart2Digits.innerHTML="";
								textCart3Digits.innerHTML=totalItemsInCart;
							}
							
							document.getElementById("myPopup").classList.toggle("show");			        
				        }
		
				    });
				    event.preventDefault();
				}
			}
		}	

		// Close the dropdown menu if the user clicks outside of it
		window.onclick = function(event) {
		  if (!event.target.matches('.Button-purchase')) {
		
		    var dropdowns = document.getElementsByClassName("popup-content");
		    var i;
		    for (i = 0; i < dropdowns.length; i++) {
		      var openDropdown = dropdowns[i];
		      if (openDropdown.classList.contains('show')) {
		        openDropdown.classList.remove('show');
		      }
		    }
		  }
		}		
	</script>
	
	<script>
		//added by Mike, 20170626
		function myQuantityFunction(quantity, id) {			
			var trimmedId = id.split("~")[0].substring("quantityId".length, id.length);
			var totalItemsInCart = id.split("~")[1];	

//			alert("hello"+totalItemsInCart);			
//			alert("hello"+id.substring("quantityParam".length, id.length));
					
			var subTotalField = document.getElementById("subtotalId"+trimmedId);
			var priceField = document.getElementById("priceId"+trimmedId);

			if (Number.isNaN(quantity)) {
				quantity = 1;
			}			

			var subTotal = quantity * parseInt(priceField.innerHTML);
//1//subTotalField.innerHTML = "&#x20B1;" + subTotal;
			
			//-----------------------------------------------------------------------
			//update Order Total
			//-----------------------------------------------------------------------
			var orderTotalField1 = document.getElementById("orderTotalId1");
			var orderTotalField2 = document.getElementById("orderTotalId2");

			var orderTotal=0;
			
			for (i=0; i<totalItemsInCart; i++) {
				var sField = document.getElementById("subtotalId"+i);
				orderTotal += parseInt(sField.innerHTML.substring(1, sField.innerHTML.length));
			}

//2//orderTotalField1.innerHTML = orderTotal;
//3//orderTotalField2.innerHTML = orderTotal;	

			//-----------------------------------------------------------------------
			//update Total Quantity		
			//-----------------------------------------------------------------------			
			var totalQuantityField = document.getElementById("totalQuantityId");
			var totalQuantity = 0;

			var quantityArray = [];
			
			for (i=0; i<totalItemsInCart; i++) {
				var q = document.getElementById("quantityId"+i+"~"+totalItemsInCart);				
				totalQuantity += parseInt(q.value);

				//added by Mike, 20170916
				quantityArray.push(q.value);
			}
//5			
/*
			//edited by Mike, 20170911			
			if (Number.isNaN(totalQuantity)) {
				totalQuantityField.innerHTML = '1 item';
			}									
			else if (totalQuantity>1) {	
				totalQuantityField.innerHTML = totalQuantity + ' items';
			}
			else {
				totalQuantityField.innerHTML = totalQuantity + " item";
			}	
*/

			//-----------------------------------------------------------------------
			//update Less 70pesos promo
			//-----------------------------------------------------------------------			
			var less70pesosPromoField = document.getElementById("less70pesosPromoId");
//6
/*
			if(totalQuantity>1) {
				var discount = (totalQuantity-1)*70;
				less70pesosPromoField.innerHTML = discount;
			}
			else {
				less70pesosPromoField.innerHTML = 0;
			}
*/			
			//-----------------------------------------------------------------------
			//update Order Total (less 70pesos)
			//-----------------------------------------------------------------------			
			var orderTotalField = document.getElementById("orderTotalId2");
//7//orderTotalField.innerHTML = orderTotalField.innerHTML-less70pesosPromoField.innerHTML;
						
			//update the DB as well
			var product_id = document.getElementById("productId"+trimmedId).value;			
			var site_url = "<?php echo site_url('cart/shoppingcart/');?>";
			var my_url = site_url.concat(product_id, "/", quantity, "/", totalQuantity);
			
			$.ajax({
		        type:"POST",
		        url:my_url,

		        success:function() {	
					window.location.href = my_url;			        	        			        				        
					/*
					//added by Mike, 20170916
					for (i=0; i<totalItemsInCart; i++) {
						var q = document.getElementById("quantityId"+i+"~"+totalItemsInCart);				
						totalQuantity += parseInt(q.value);

						var orderTotalField = document.getElementById("orderTotalId2");

						
						alert("hello "+ q.value);
					}					
*/				
					subTotalField.innerHTML = "&#x20B1;" + subTotal;
					orderTotalField1.innerHTML = orderTotal;
					orderTotalField2.innerHTML = orderTotal;	

					//edited by Mike, 20170911			
					if (Number.isNaN(totalQuantity)) {
						totalQuantityField.innerHTML = '1 item';
					}									
					else if (totalQuantity>1) {	
						totalQuantityField.innerHTML = totalQuantity + ' items';
					}
					else {
						totalQuantityField.innerHTML = totalQuantity + " item";
					}	

					if(totalQuantity>1) {
						var discount = (totalQuantity-1)*70;
						less70pesosPromoField.innerHTML = discount;
					}
					else {
						less70pesosPromoField.innerHTML = 0;
					}

					orderTotalField.innerHTML = orderTotalField.innerHTML-less70pesosPromoField.innerHTML;

					//added by Mike, 20170916
					var totalItemsInCartField = document.getElementById("totalItemsInCartId");
					totalItemsInCartField.value = totalQuantity;
				
					var totalItemsInCartField = document.getElementById("Text-cartId");
					var totalItemsInCart2digitsField = document.getElementById("Text-cart-2digitsId");
					var totalItemsInCart3digitsField = document.getElementById("Text-cart-3digitsId");

					if (totalQuantity<10) {
						totalItemsInCartField.innerHTML = totalQuantity;
					}
					
					if ((totalQuantity>9) && (totalQuantity<100)) {
						totalItemsInCart2digitsField.innerHTML = totalQuantity;
					}

					if (totalQuantity>99) {
						totalItemsInCart3digitsField.innerHTML = totalQuantity;
					}
		       	}
		    });
			event.preventDefault();			
		}
	</script>

	<script>
		//added by Mike, 20170808
		function mySellQuantityFunction(quantity, id) {								
			var totalCostField = document.getElementById("totalCost");
			if (Number.isNaN(quantity)) {
				quantity = 0;
			}
			
			var subTotal = quantity * 50;
			totalCostField.value = subTotal;
		}
	</script>
	
	<script>
		//added by Mike, 20170626
		function removeProductItemFunction(id) {			
//			alert("hello"+id);

			var productId = id;
			var totalItemsInCart = id.split("~")[1];	

//			alert("hello "+productId);						
//			alert("hello"+totalItemsInCart);			
//			alert("hello"+id.substring("quantityParam".length, id.length));

			var site_url = "<?php echo site_url('cart/shoppingcart/');?>";
			var my_url = site_url.concat(productId);

//			alert("hey! "+my_url);
			
			$.ajax({
		        type:"POST",
		        url:my_url,

		        success:function() {		
					window.location.href = "<?php echo site_url('cart/shoppingcart/');?>";			        	        			        				        
		       	}
		    });
			event.preventDefault();

/*					
			var subTotalField = document.getElementById("subtotalId"+trimmedId);
			var priceField = document.getElementById("priceId"+trimmedId);

			if (Number.isNaN(quantity)) {
				quantity = 0;
			}
			
			var subTotal = quantity * parseInt(priceField.innerHTML);
			subTotalField.innerHTML = "&#x20B1;" + subTotal;

			//-----------------------------------------------------------------------
			//update Order Total
			//-----------------------------------------------------------------------
			var orderTotalField1 = document.getElementById("orderTotalId1");
			var orderTotalField2 = document.getElementById("orderTotalId2");

			var orderTotal=0;
			
			for (i=0; i<totalItemsInCart; i++) {
				var sField = document.getElementById("subtotalId"+i);
				orderTotal += parseInt(sField.innerHTML.substring(1, sField.innerHTML.length));
			}

			orderTotalField1.innerHTML = orderTotal;
			orderTotalField2.innerHTML = orderTotal;			
*/			
		}
	</script>
	
	<title>Usbong Store</title>
	<style type="text/css">

	::selection { background-color: #f07746; color: #fff; }
	::-moz-selection { background-color: #f07746; color: #fff; }
		
	body {
		background-color:  #f6f6f6;
		margin: 0px 0px 0px 0px;
		max-width: 100%;
		font: 16px/24px normal "Helvetica Neue",Helvetica,Arial,sans-serif;
		color: #808080;
		position: relative;		
	}
	
	.navbar {
		background-color: #1a0d00;
		z-index: 1;
		margin-bottom: 0 !important;
		padding-bottom: 0 !important;
	}
	
	.categories-navbar {	
		background-color: #efe6ca;
		padding-left: 60px;
  		z-index: 0;
  		width: 100%;  		
	}

	.categories-navbar li a {
		color: #281e1a;
		padding-top: 6px;		
		padding-bottom: 10px;
		font-weight: bold;
		font-size: 14px;
	}


	.categories-navbar li a:hover {
		color: #3a1d00;
		background-color: #efe6ca;
		border-bottom: 3px solid #77b043;
		font-weight: bold;
		padding-bottom: 6px;
	}
	
	a {
		color: #dec32e;
	}

	a:hover {
		color: #dec32e;
	}
	
	a.Footer-list-item {
		color: #fff;
	}
	
	a.Security {
		color: #77b043;
		font-weight: bold;	
	}

	span.Footer-list-header {
		color: #fff;
		font-weight: bold;
		font-size: 20px;
	}

	span.Footer-list-header:hover {
	}
	
	hr {
		margin-right: 142px;
		border: 1px solid #6d8f48;
	}

	hr.Cart-hr {
		border: 1px solid #6d8f48;
		margin: 10px 10px 10px 10px;
	}

	hr.FrontPage-hr {
		border: 1px dotted #6d8f48;
		margin: 6px 200px 6px 30px;
	}
	
	p {
		 padding:0;
	}

	p.footer {		
		text-align: right;
		font-size: 12px;
		border-top: 1px solid #d0d0d0;
		line-height: 32px;
		background: #52493f;
		color:#fff;
		margin: 20px 0 0 0; 
		padding: 0 10px 0 10px;
	}

	.Uplift-container {		
		line-height: 32px;
		padding: 6px 20px 6px 20px; 
		z-index: 2;		
		position: relative;
		text-align: center;
		background: #77b043;
		margin-top: 450px;
	}

	.Uplift-button {		
		font-size: 16px;
		color:#fff;
		background-color: Transparent;
	    border: none;
	}

	.Uplift-button:hover {		
		font-size: 16px;
		text-decoration: underline;
		background-color: Transparent;
	    border: none;
	}

	.Footer-container {		
		font-size: 18px;
		line-height: 32px;
		background: #52493f;
		color:#fff;
		padding: 42px 20px 42px 120px; 
		z-index: 2;		
		position: relative;
	}
	
	.Footer-container-list{		
		text-align: left;
		font-size: 14px;
		list-style-type: none;
	}
	
	.Customer-information-ul {
		text-align: left;
		font-size: 16px;
		list-style-type: none;
	}
	
	.Customer-information-li {
		display: inline-block;
	}

	.Contact-information-ul {
		text-align: left;
		font-size: 16px;
		list-style-type: none;

	    columns: 2;
	    -webkit-columns: 2;
	    -moz-columns: 2;
	}

	.Search-container {
		float: left;
		margin-top: 6px;	
		margin-left: 16px;	
	}

	.Search-input {
		float: left;
		font-size: 18px;
		padding: 4px;
		border: #ffffff;		
		border-radius: 3px;
		width: 300px;
	}
	
	.Button-container {
	}
	
	.Button {		
		padding: 5.5px;
		border-top: 1px solid #d0d0d0;
		border-right: 1px solid #d0d0d0;
		border-bottom: 1px solid #d0d0d0;
		border-left: #ffffff;		
		background:#ffffff;
	}

	.Remove-button {
		background-color: Transparent;
	    border: none;
	}
	
	Remove-button-image-text {
		pointer-events: none;
	}

	.Remove-button:hover {
		border: 1px solid #969696;
		border-radius: 4px;	
	}
	
	.Image-usbong-store-logo {
 		opacity: 0.9;
    	filter: alpha(opacity=90); /* For IE8 and earlier */
	}
	
	.Image-usbong-store-logo:hover {
 		opacity: 1;
    	filter: alpha(opacity=100); /* For IE8 and earlier */
   	}	

	.Image-usbong-logo {
	    max-width: 75%;
    	height: auto;		
 		opacity: 0.9;
    	filter: alpha(opacity=90); /* For IE8 and earlier */
	}

	.Image-usbong-icon {
	    width: 3.5%;
    	height: auto;		
	}

	.Image-usbong-first-icon {
	}
		
	.Image-item {
	    max-width: 75%;
    	height: auto;
	}

	.Image-offers {
		position: absolute;
    	right: 0;
		padding-top: 12px;	
    	padding-right: 12px;
    	padding-left: 12px;
    	height: 90%;
    	background-color: #edebeb;
	}

	.Image-offers-save-more {
		position: relative;
		display:block;		
	}
	
	.Product-item-page-image-offers-save-more {
		margin-left: 20px;
	}

	.Image-offers-be-a-merchant {
		position: relative;
		display:block;		
	}
	
	.Image-offers-buy-back {
		position: relative;
		display:block;		
		z-index: 2;
	}

	.Image-offers-buy-back:hover {
 		opacity: 0.6;
    	filter: alpha(opacity=60); /* For IE8 and earlier */
   	}

	.Image-offers-request {
		position: relative;
		display:block;		
		z-index: 2;		
	}

	.Image-offers-request:hover {
 		opacity: 0.6;
    	filter: alpha(opacity=60); /* For IE8 and earlier */
   	}

	.Image-offers-MOSC {
		position: relative;
		display:block;		
		z-index: 2;		
	}

	.Image-offers-MOSC:hover {
 		opacity: 0.6;
    	filter: alpha(opacity=60); /* For IE8 and earlier */
   	}

	.Product-item {
		border-radius: 4px;	
		color: #222222;		
	}

	.Product-item:hover {
		text-decoration: underline;
		color: #222222;
	}

	.Product-item-titleOnly {
		color: #222222;
		font-weight: bold;
	}

	.Product-item-details {
		color: #4b4b4b;	
		font-weight: normal;
	}

	.Product-item-price {
		color: #b88a1b;
	}

	.Product-item-previous-price {
		color: #e72e16;
	}

			
	.Product-image {
	    max-width: 75%;
    	height: auto;
	}
		
	.Cart-product-image {
	    max-width: 160%;
    	height: auto;
	}

	.Checkout-product-image {
	    max-width: 200%;
    	height: auto;
	}

	.Popup-product-image {
	    max-width: 120%;
    	height: auto;
    	margin-left: 6px;
	}

	.Product-name {
		color: #222222;
		font-size: 30px;
		font-weight: bold;	
	}

	.Cart-product-name {
		color: #222222;
		font-size: 18px;
		font-weight: bold;	
		margin-top: 4px;			
		margin-left: 10px;    			
	}

	.Checkout-product-name {
		color: #222222;
		font-size: 14px;
		font-weight: bold;	
		margin-left: 2px;    			
	}

	.Cart-product-price {
		color: #b88a1b;
		font-size: 20px;
		margin-top: 4px;		
	}

	.Cart-order-price {
		color: #b88a1b;
	}

	.Cart-product-price-each {
		color: #4b4b4b;
		font-size: 20px;
	}

	label.Cart-product-price {
		color: #4b4b4b;
	}

	label.Cart-product-item-subtotal {
		color: #4b4b4b;
	}

	.Cart-product-subtotal {
		color: #b88a1b;
		font-size: 20px;
		margin-top: 4px;		
		margin-right: 30px;
		text-align: right;
	}

	.Checkout-product-subtotal {
		color: #b88a1b;
		font-size: 14px;
		margin-top: 4px;		
		text-align: right;
	}

	.Checkout-order-list {
	}

	.Checkout-shopping-cart-text {
		font-size: 18px;
		margin-bottom: 10px;
		color: #1d1d1d;		
	}

	.Thankyou-text {
		font-size: 18px;
		padding: 20px 100px 20px 100px;
		color: #1d1d1d;
	}

	.Thankyou-order-detail-date-and-number {
		font-size: 16px;
		padding: 20px 20px 5px 20px;
		color: #1d1d1d;
	}

	.Thankyou-order-container {
		padding: 20px 40px 20px 20px;
		border: 1px solid #ab9c7d;		
		border-radius: 4px;
		margin: 20px;
		color: #1d1d1d;
	}

	.Thankyou-order-details {
		font-size: 14px;
		padding-left: 20px;
		padding-right: 20px;
		color: #1d1d1d;
    }

	.Thankyou-order-details-text {
		font-size: 14px;
		text-align: left;
		display:block;
		padding-left: 18px;
    }

	.Cart-order-list {
	}

	.Cart-order-total {
		border: 1px solid;		
		border-radius: 2px;	
		padding: 10px 22px 10px 7px;
		text-align: right;
		color: #77b043;
		font-weight: bold;
	}

	.Cart-order-total-row {
		color: #4b4b4b;
	}

	.Cart-order-discount-row {
		color: #4b4b4b;
	}

	.Cart-order-discount {
		color: #b88a1b;
	}

	.Cart-order-total-with-checkout-row {
		border-top: 1px solid;				
		color: #4b4b4b;
		margin-left: 0px;
	}


	.Cart-product-author {
		color: #4b4b4b;
		font-size: 18px;
		margin-left: 6px;
	}

	.Checkout-product-author {
		color: #4b4b4b;
		font-size: 14px;
		margin-left: 6px;
	}

	.Product-author {
		color: #4b4b4b;
		font-size: 18px;
		margin-left: 6px;
	}

	.Cart-product-price {
		color: #b88a1b;
		font-size: 20px;
		margin-top: 4px;		
		margin-left: 6px;
	}

	.Product-price {
		color: #b88a1b;
		font-size: 24px;
		margin-top: 24px;		
		margin-left: 6px;
	}
	
	.Contact {
		width:60%;
		font-size: 18px;
		color: #4b4b4b;
		margin:40px;
		padding:0px;
	}
	
	.Contact-support-email-address {
		color: #77b043;
		font-weight: bold;	
	}

	.Privacy-content {
		margin-left: 40px;
		margin-right: 40px;
		font-size: 16px;
		color: black;		
	}

	.Customer-order-summary {
		font-size: 18px;
		color: #4b4b4b;
		margin:0;
		padding:0;
	}
	
	.Order-summary {
		font-size: 18px;
		color: #4b4b4b;
		margin:0px;
		padding:0px;
	}

	.Order-summary-price {
		text-align: left;
    	display: inline-block;
	}

	.Order-summary-alternate {
		font-size: 18px;
		color: #4b4b4b;		
		background-color: #efe6ca;
		margin:0px;
		padding:0px;
	}

	.Order-summary-order-total {
		color: #b88a1b;	
	}
	
	.Fulfilled-Status-OK {
		background-color: #77b043;
		color: #4b4b4b;
	}

	.Fulfilled-Status-Not-OK {
		background-color: #e04949;
		color: #4b4b4b;
	}

	.Customer-details {
		font-size: 16px;
		color: #4b4b4b;
		margin: 0;
		padding: 0;
	}


	.Order-details {
		font-size: 18px;
		color: #4b4b4b;
		margin-left: 20px;
	}

	.Order-details-product {
		background-color: #efe6ca;
	}
	
	.Order-details-shipping-address {
		text-align: left;
	}
	
	.Order-details-purchased-datetime-stamp {
		text-align: right;
	}
	
	.Order-details-align-right {
		text-align: right;
	}

	.Order-details-amount {
		color: #b88a1b;
	}

	.Order-details-align-right-order-total {
		text-align: right;
		background-color: #efe6ca;
		color: #b88a1b;
	}
	
	.Order-details-order-number-link {
		font-size: 18px;  
		color: #77b043;
	}

	.Order-details-order-number-link:hover {
		font-size: 18px;  
		color: #77b043;
	}
	
	.Popup-product-details {
		font-size: 15px;
	}

	.Popup-product-currency-symbol {
		color: #b88a1b;
		font-size: 18px;
		margin-left: 6px;
	}

	.Popup-product-price {
		color: #b88a1b;
		font-size: 24px;
		margin-right: 2px;
	}

	.Popup-product-free-delivery {
		color: #b88a1b;
		font-size: 18px;
		margin-top: -30px;
		margin-right: 2px;
	}

	.Product-overview-header {
		color: #8bbf4f;
		margin-top: 12px;
		font-size: 18px;
	}

	.Product-overview-content {
		font-size: 16px;
		color: #5c534b;
	}

	.Cart-product-quantity {
		color: #4b4b4b;
		font-size: 16px;
		margin-top: 4px;
	}

	.Checkout-product-quantity {
		color: #4b4b4b;
		font-size: 14px;
		margin-top: 4px;
	}

	.Product-quantity {
		color: #4b4b4b;
		font-size: 16px;
		margin-top: 24px;
	}

	.Quantity-label {
		padding-right: 8px;
	}

	.Checkout-quantity-label {
		padding-right: 8px;
		color: #463000;
	}

	.Product-format {
		color: #312f2d;
		font-size: 16px;
		margin-top: 6px;
		margin-left: 32px;
		text-align: left;
	}
	
	.Product-condition {
		color: #312f2d;
		font-size: 16px;
		margin-top: 6px;
		margin-left: 32px;
		text-align: left;
	}
	
	.Product-language {
		color: #312f2d;
		font-size: 16px;
		margin-top: 6px;
		margin-left: 32px;
		text-align: left;
	}

	.Product-pages {
		color: #312f2d;
		font-size: 16px;
		margin-top: 6px;
		margin-left: 32px;
		text-align: left;
	}

	.Product-purchase-button {
		color: #4b4b4b;
		font-size: 16px;
		margin-top: 12px;
	}

	.Button-purchase {
		padding: 8px 42px 8px 42px;
		background-color: #ffe400;
		color: #222222;
		font-weight: bold;
		border: 0px solid;		
		border-radius: 4px;
		margin-left: 16px;
	}

	.Button-purchase:hover {
		background-color: #d4be00;
	}

	.Button-merchant {
		padding: 2px 2px 2px 2px;
		background-color: #efe6ca;
		color: #313131;
		font-weight: bold;
		border: 0px solid;		
		border-radius: 4px;
		margin-bottom: 4px;
	}

	.Button-merchant:hover {
 		opacity: 0.6;
    	filter: alpha(opacity=60); /* For IE8 and earlier */
	}


	.Button-continue-to-checkout {
		padding: 8px 24px 8px 24px;
		background-color: #ffe400;
		color: #222222;
		font-weight: bold;
		border: 0px solid;		
		border-radius: 4px;
		margin-left: 16px;
		font-size: 14px;
	}

	.Button-continue-to-checkout:hover {
		background-color: #d4be00;
	}

	.Button-view-cart {
		padding: 8px 42px 8px 42px;
		background-color: #84c44b;
		color: #222222;
		font-weight: bold;
		border: 0px solid;		
		border-radius: 4px;
	}

	.Button-view-cart:hover {
		background-color: #77b043;
	}
		
	.col-sm-3 {
		text-align:center
	}

	.col-sm-2 {
		text-align:center
	}
	
	.container {
		margin-left: 100px;
		margin-bottom: 0px;
	}	

	.Customer-details-container {
		margin-left: 50px;
		margin-bottom: 0px;
		margin-right: 10px;
	}	

	.container-search {
		margin-left: 50px;
		margin-bottom: 330px;
	}	

	.container-frontPage {
		margin-left: 30px;
		margin-bottom: 20px;
		width: 100%;
	}	

	.container-merchant {
		margin-left: 10px;
		margin-bottom: 156px;
	}	

	.container-product-item {
		margin-left: 10px;
		margin-bottom: 156px;
	}	
	
	
	.Cart-container {
		margin-right: 24px;
		margin-left: 24px;
		margin-bottom: 12px;
	}	
	
	.Topbar-container {
		width: 100%;
		overflow: hidden;
		float: right;
	}
	
	.Login-container {
		float: left;
		margin-top: 16px;	
		margin-left: 36px;		
	}
	
	.Button-cart {
		background: #0000000;
		border: 0px solid;		
		padding: 0px;
		margin-top: 4px;
		margin-left: 6px;
	}	

	.Text-cart {
		pointer-events: none;
		position: absolute;
		color: white;
		padding-left: 15px;		
	    padding-top: 14px;
		font-size: 14px;
	}	

	.Text-cart-2digits {
		pointer-events: none;
		position: absolute;
		color: white;
		padding-left: 10px;		
	    padding-top: 14px;
		font-size: 14px;
	}	

	.Text-cart-3digits {
		pointer-events: none;
		position: absolute;
		color: white;
		padding-left: 8px;		
	    padding-top: 14px;
		font-size: 14px;
	}	
	
	.Customer-dropdown {
		margin-top: 16px;
	}
	
	.dropdown {
	    position: relative;
    	display: inline-block;
	}
	
	/* Dropdown Content (Hidden by Default) */
	.dropdown-menu {
	    display: none;
	    position: absolute;
	    background-color: #f9f9f9;
	    min-width: 160px;
	    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	    z-index: 1;
	}
	
	/* Show the dropdown menu on hover */
	.dropdown:hover .dropdown-menu {
	    display: block;
	    margin-right:-80px;
	}
			
	.dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
         background-color:#f1f1f1;
         font-weight: bold;
 	}
 	
	.nav {
	}
	
	.header {
		margin: 12px 12px 0px 12px;	
		color: #3a1d00;		
	}

	.header-banner {
		padding: 6px 6px 0px 6px;	
		color: white;		
	}

	.header-banner:hover {
		opacity: .8;
    	filter: alpha(opacity=80); /* For IE8 and earlier */		
	}

	.header-banner-li {
		display: inline;
		margin-left: 40px;
	}

	a.header-banner-link {
		color: #f2f2f2;
	}
	
	a.header-banner-link:hover {
		color: #f2f2f2;
	}
	
	.header-banner-span {
		color: #3a1d00;		
		font-size: 16px;
		font-weight: bold;	
	}

	.Thankyou-header {
		margin: 0px 10px 0px 10px;	
	    color: #77b043
	}
	
	.Search-result {
		margin-left: 100px;
		margin-bottom: 32px;	
		font-size: 18px;
		color: #1a0d00;
	}
	
	.Search-noResult {
		margin-left: 100px;
		margin-bottom: 32px;	
		font-size: 18px;
		color: #1a0d00;
	}

	.Cart-noResult {
		margin-top: 56px;
		margin-left: 560px;
		margin-bottom: 56px;	
		font-size: 18px;
		color: #1a0d00;
	}

	.Order-Summary-noResult {
		margin-top: 56px;
		margin-left: 300px;
		margin-bottom: 56px;	
		font-size: 18px;
		color: #1a0d00;
	}

	.Order-Details-noResult {
		margin-top: 50px;
		margin-left: 200px;
		font-size: 18px;
		color: #1a0d00;
	}
	
	.Order-Details-admin-fulfilled {
		text-align: right;
	}

	.usbongLogo {
		margin-top: 3px;
	}

	.Checkout-customer-information {
		max-width: 80%;		
		float: none;
    	display: block;
    	margin: 0 auto;
    	margin-bottom: 20px;
    	font-size: 24px;    	
    	padding: 16px;
    	border: 1px solid #4b3b2c;
    	border-radius: 4px;
    	color: #1d1d1d;    	
	}

	.Customer-information {
		max-width: 50%;		
		float: none;
    	display: block;
    	margin: 0 auto;
    	margin-bottom: 20px;
    	font-size: 24px;    	
    	padding: 16px;
    	border: 1px solid #4b3b2c;
    	border-radius: 4px;
	}

	.Customer-information-text-in-checkout {
		display: inline-block; 
		padding-right: 12px;	

	}
	
	.Account-settings {	
	}
	
	.Account-settings-subject-header {
		text-align: left;
		margin-left: 40px;
    	font-size: 18px;
    	color: #1a0d00;    	
    	border: .2px solid #4b3b2c;    	
    	background-color: #efe6ca;  
    	padding: 5px;  	    	
    	font-weight: bold;
	}

	.Account-settings-subject-content {
		text-align: left;
		margin-left: 40px;
		font-size: 18px;  
		color: #1a0d00;		  			
    	padding: 5px;  	    	
    	border: .2px dotted #4b3b2c;    	
	}
		
	.Account-settings-subject-content-link {
		text-align: left;
		margin-left: 40px;
		font-size: 18px;  
		color: #1a0d00;		  			
    	padding: 5px;  	    	
	}

	.Account-settings-subject-content-link:hover {
		color: #1a0d00;		  			
	}

	.Merchant-category {	
	}

	.Merchant-category-b {	
	}
		
	.Merchant-category-image {	
		margin-left: 10px;
		margin-bottom: 12px;
	}

	.Merchant-category-image:hover {
		/*opacity: 0.9;
    	filter: alpha(opacity=90);*/ /* For IE8 and earlier */
    	
	}
	
	.Merchant-category-content {
		text-align: center;
		margin-left: 6px;
    	font-size: 15px;
    	color: #291f1a;    	
    	border: .2px dotted #4b3b2c;    	
    	background-color: white;  
    	padding: 2px;  	    	
    	font-weight: bold;
	}

	.Merchant-category-content:hover {
		background-color: #efe6ca;
	}
		
	.Merchant-category-content-link {
		text-align: center;
		margin-left: 6px;
		font-size: 15px;  
		color: #291f1a;		  			
    	padding: 2px;  	    	    	
	}

	.Merchant-category-content-link:hover {
		color: #1a0d00;		  
		text-decoration: underline;
    	text-decoration-color: #77b043;
	}

	.Merchant-products {
		margin-left: 40px;	
	}
		
		
	.login-and-create {
		max-width: 30%;		
		float: none;
    	display: block;
    	margin: 0 auto;
    	margin-bottom: 20px;
    	margin-top: 16px;
    	font-size: 24px;    	
    	padding: 16px;
    	border: 1px solid #4b3b2c;
    	border-radius: 4px;
	}
	
	.login-text {
		border-right: 1px solid;	
		display: inline-block; 
		padding-right: 12px;	
		color: #1d1d1d;		
	}
	
	.register-text {
    	font-size: 16px;    		
		display: inline-block; 
		padding-left: 12px;		
		padding-bottom: 12px;	
	}

	.login-text-in-create {
    	font-size: 16px;    		
		display: inline-block; 
		padding-left: 12px;		
		padding-bottom: 12px;	
	}
	
	.register-text-in-create {
		border-right: 1px solid;	
		display: inline-block; 
		padding-right: 12px;	
		color: #1d1d1d;		
	}

	.Login-input {
	    font-size: 16px;    			
	    padding: 6px;
	    width: 100%;
	    margin-bottom: 12px;		    
	}

	.Customer-information-text-in-checkout {
		display: inline-block; 
		padding-right: 12px;	
		margin-bottom: 16px;		
	}
	
	.Button-login {
	    font-size: 20px;    			
	    display: inline-block; 	    
		background-color: #ffe400;
		padding: 8px 30px 8px 30px;
		background-color: #ffe400;
		color: #222222;
		border: 0px solid;		
		border-radius: 4px;
	}
	
	.Button-login:hover {
		background-color: #d4be00;
	}

	.forgotPassword-div {
	    font-size: 14px;    			
	    padding: 10px;		
	    display: inline-block; 	    
	}	

	.forgotPassword-text {
	    font-size: 14px;    			
	    display: inline-block; 	    
	    color: #6b6b6b;
	}	

	.forgotPassword-text:hover {
	    font-size: 14px;    			
	    display: inline-block; 	    
	    color: #6b6b6b;
	}	
	
	.Register-input {
	    font-size: 16px;    			
	    padding: 6px;
	    width: 100%;
	    margin-bottom: 12px;		    
	}
	
	.Register-error {		
		font-size: 16px;
		color: #c14646;		
		background-color: #f6aaaa;
		border-top: 1px solid #c98989;	
		border-right: 1px solid #c98989;	
		border-left: 1px solid #c98989;		

		border-bottom: 1px solid #f6aaaa;					
		margin-bottom: -1px;
	}		

	.Update-error {		
		font-size: 16px;
		color: #c14646;		
		background-color: #f6aaaa;
		border-top: 1px solid #c98989;	
		border-right: 1px solid #c98989;	
		border-left: 1px solid #c98989;		

		border-bottom: 1px solid #f6aaaa;					
		margin-bottom: -1px;
	}		

	.Update-success {		
		font-size: 16px;
		color: #496d28;		
		background-color: #77b043;
		border-top: 1px solid #90d94f;	
		border-right: 1px solid #90d94f;	
		border-left: 1px solid #90d94f;		

		border-bottom: 1px solid #f6aaaa;					
		margin-bottom: -1px;
	}		

	input:disabled {
	    background: #dddddd;
	}

	input[type="radio"] {
	  transform:scale(1.5, 1.5);
	}

	input[type="checkbox"] {
	  transform:scale(1.5, 1.5);
	}

	.Checkbox-label-shippingToMOSC {
	    font-size: 18px;    			
	    padding: 6px 6px 6px 8px;
		color: #3a3a3a;
	}

	.Checkout-div {
		margin: 0px;
		padding: 0px;
		position: relative;
	}

	.Checkout-input {
	    font-size: 16px;    			
	    padding: 16px 6px 6px 8px;
		margin-bottom: 12px;
	    resize: none;
		width: 100%;
		height: 50px;
		color: #3a3a3a;
	}

	.Checkout-input-mode-of-payment {
	    font-size: 18px;    			
	    padding: 6px;
	    width: 100%;
	    margin: 0;		    
	}
	
	.Checkout-input:focus ~ .floating-label,
	.Checkout-input:not(:focus):valid ~ .floating-label{
	  bottom: 50px;
	  font-size: 12px;
	  opacity: 1;
	}	

	.Update-input {
	    font-size: 16px;    			
	    padding: 16px 6px 6px 8px;
		margin-bottom: 12px;
	    resize: none;
		width: 100%;
		height: 50px;
		color: #3a3a3a;
	}

	.Update-input:focus ~ .floating-label,
	.Update-input:not(:focus):valid ~ .floating-label{
	  bottom: 50px;
	  font-size: 12px;
	  opacity: 1;
	}	

	.request {
		max-width: 40%;		
		float: none;
    	display: block;
    	margin: 0 auto;
    	margin-bottom: 20px;
    	font-size: 24px;    	
    	padding: 16px;
    	border: 1px solid #4b3b2c;
    	border-radius: 4px;
	}

	.request-text {
		display: inline-block; 
		padding-right: 12px;	
		color: #1d1d1d;
		margin-bottom: 12px;				
	}
	
	.Request-input,
	.Request-comments-input {
	    font-size: 16px;    			
	    padding: 16px 6px 6px 8px;
		margin-bottom: 12px;
	    resize: none;
		width: 100%;
		height: 50px;
		color: #3a3a3a;	    
	}

	.Request-input:focus ~ .floating-label,
	.Request-input:not(:focus):valid ~ .floating-label{
	  bottom: 50px;
	  font-size: 12px;
	  opacity: 1;
	}	

	.Request-textarea {
		vertical-align: top;	
	    font-size: 16px;    			
	    padding: 16px 6px 6px 8px;
		margin-bottom: 12px;
	    resize: none;
		width: 100%;
		height: 50px;
		color: #3a3a3a;	    
	}	
	
	.Request-textarea:focus ~ .floating-label,
	.Request-textarea:not(:focus):valid ~ .floating-label{
	  bottom: 50px;
	  font-size: 12px;
	  opacity: 1;
	}	
	
	.Request-input-mode-of-payment {
	    font-size: 16px;    			
	    padding: 6px;
	    width: 100%;
	    margin: 0;		    
	}
		
	.Request-quantity-label {
	    font-size: 16px;    			
	}

	.Request-total-cost-label {
	    font-weight: normal;    			
	    color: #b88a1b;	    
	}

	.Sell-total-cost-label {
	    font-weight: normal;    			
	    color: #b88a1b;	    
	}

	.Sell-total-cost-input {
	    color: #b88a1b;	    
	}
	
	input#totalCost::-webkit-input-placeholder {color: #b88a1b;}
	input#totalCost::-moz-placeholder          {color: #b88a1b;}
	input#totalCost:-moz-placeholder           {color: #b88a1b;}
	input#totalCost:-ms-input-placeholder      {color: #b88a1b;}

	.Sell-comments-div {
		margin-top: 10px;
	}

	.Request-quantity-textbox { 
		background-color: #fCfCfC;
	    color: #68502b;
	    padding: 12px;
	    font-size: 16px;
	    border: 1px solid #68502b;
	    width: 10%;
	    border-radius: 3px;	    	    
		margin-bottom: 12px;
	}
	
	.Request-success {		
		max-width: 40%;		
		float: none;
    	display: block;
    	margin: 0 auto;
	
		font-size: 20px;
		color: #496d28;		
		background-color: #77b043;
		border-top: 1px solid #90d94f;	
		border-right: 1px solid #90d94f;	
		border-left: 1px solid #90d94f;		

		border-bottom: 1px solid #90d94f;					
		margin-bottom: -1px;
	}			
	
	.Request-link {
		font-size: 18px;  
		color: #77b043;
	}

	.Request-link:hover {
		font-size: 18px;  
		color: #77b043;
	}
	
	.Request-input-product-type {
	    font-size: 16px;    			
	    padding: 6px;
	    width: 100%;
	    margin: 0;		    
	}
	
	.FrontPage-header-link {
		color: #3a1d00;
	}

	.FrontPage-header-link:hover {
		color: #77b043;
	}	

	.Front-page-left-arrow-button {
		float: right;
		background-color: #77b043;
		color: #222222;
		font-weight: bold;
		border: 0px solid;		
		border-radius: 4px;
		
		font-family:Arial;
		font-size: 20px;		
   	}

	.Front-page-left-arrow-button:hover {
		float: right;
		background-color: #588232;
		color: #222222;
		font-weight: bold;
		border: 0px solid;		
		border-radius: 4px;
		
		font-family:Arial;
		font-size: 20px;		
   	}

   	   	
	.Front-page-right-arrow-button {
		float: left;
		background-color: #77b043;
		color: #222222;
		font-weight: bold;
		border: 0px solid;		
		border-radius: 4px;
		
		font-family:Arial;
		font-size: 20px;		
   	}

	.Front-page-right-arrow-button:hover {
		float: left;
		background-color: #588232;
		color: #222222;
		font-weight: bold;
		border: 0px solid;		
		border-radius: 4px;
		
		font-family:Arial;
		font-size: 20px;		
   	}

	.Front-page-cat-name {
		font-weight: bold;
	}

	.no-gutter > [class*='col-'] {
	    padding-right:0;
	    padding-left:0;
	}

	.Sell-cost {
		color: #b88a1b;	    		
	}
	
	.floating-label {
	  bottom: 40px;
	  position: absolute;
	  pointer-events: none;
	  font-size: 20px;
	  left: 10px;
	  transition: 0.2s ease all;
	  height: 10px;
	}

	.nopadding {
	   padding: 0 !important;
	   margin: 0 !important;
	}

	.Quantity-textbox { 
		background-color: #fCfCfC;
	    color: #68502b;
	    padding: 12px;
	    font-size: 16px;
	    border: 1px solid #68502b;
	    width: 20%;
	    border-radius: 3px;	    	    
	}

	.Quantity-out-of-stock { 
	    color: #68502b;
	}

	
	.no-spin::-webkit-inner-spin-button, .no-spin::-webkit-outer-spin-button {
	    -webkit-appearance: none !important;
	    margin: 0px !important;
	    -moz-appearance:textfield !important;
	}
	
	/* 
	 * ------------------------------------------------------------------
	 * DROPDOWN
	 * Reference: https://www.w3schools.com/howto/howto_js_dropdown.asp;
	 * last accessed: 20170622	 
	 * ------------------------------------------------------------------
	 */

	/* Dropdown Button */
	.dropbtn {
	    background-color: #68502b;
	    color: white;
	    padding: 16px;
	    font-size: 16px;
	    border: none;
	    cursor: pointer;
	}
	
	/* Dropdown button on hover & focus */
	.dropbtn:hover, .dropbtn:focus {
	    background-color: #9f7b42;
	}
	
	/* The container <div> - needed to position the dropdown content */
	.dropdown {
	    position: relative;
	    display: inline-block;
	}
	
	/* Dropdown Content (Hidden by Default) */
	.dropdown-content {
	    display: none;
	    position: absolute;
	    background-color: #f9f9f9;
	    min-width: 40px;
	    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	    z-index: 1;
	}
	
	/* Links inside the dropdown */
	.dropdown-content a {
	    color: black;
	    padding: 12px 16px;
	    text-decoration: none;
	    display: block;
	}
	
	/* Change color of dropdown links on hover */
	.dropdown-content a:hover {background-color: #f1f1f1}
	
	/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
	.show {display:block;}
	
	/* added by Mike, 20170626 */		
	/* Popup container */
	.popup {
	    position: relative;
	    display: inline-block;
	}
	
	/* The actual popup (appears on top) */
	.popup-content {
	    display: none;
    	position: fixed;
    	top: 50px;
    	right: 10px;	    
    	width: 300px;
    	background-color: #f9f9f9;
	    padding: 16px;
	    min-width: 40px;
	    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	    z-index: 1;
	    border-radius: 3px;	    
	}

</style>
</head>
<!-- 
<body>
</body>
</html>
 -->