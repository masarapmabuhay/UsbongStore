<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!-- 
<html lang="en">
<head>
</head>
<body>
-->
<!-- ################################################################################# -->
<!-- Reference: https://stackoverflow.com/questions/13860671/how-to-create-image-slideshow-in-html;
     last accessed: 20180308
     question by: greenthunder
     edited by: Sven Bieder -->	
<script type="text/javascript">
    var image1 = new Image()
    image1.src = "<?php echo base_url('assets/images/usbongStoreLess240pesosPlusBanner.jpg')?>"    	
	var image2 = new Image()
    image2.src = "<?php echo base_url('assets/images/usbongOffersBuyBack_L.jpg')?>"
</script>
<p><img src="<?php echo base_url('assets/images/usbongStoreLess240pesosPlusBanner.jpg')?>" class="FrontPage-billboard" name="slide" /></p>
    <script type="text/javascript">
    var step=1;

    function slideit()
            {
//				alert("hello");
                
                document.images.slide.src = eval("image"+step+".src")
/*
                if(step<2)
                    step++
                else
                    step=1
*/                    
                setTimeout("slideit()",2500)
            }
            slideit()
    </script>
	
	
<!-- 
</body>
</html>
-->
