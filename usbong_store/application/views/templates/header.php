<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<!--	<img src="<?php echo base_url('assets/images/usbongStoreBrandLogo.png'); ?>">	-->
	<div class="Search">
		<input type="text" class="Search-input" placeholder="I'm looking for...">
		<div class="Button-container"><button type="button" class="Button"><img src="<?php echo base_url('assets/images/magnifying_glass.png'); ?>"></button></div>
    </div>
	<nav class="navbar navbar">
	  <div class="container-fluid">
		<ul class="nav navbar-nav">
		  <li class="active"><?php echo anchor('pages/view/Home', 'BOOKS'); ?></li>
		  <li><a href="#">COMBOS</a></li>
		  <li><a href="#">BEVERAGES</a></li>
		  <li><a href="#">COMICS</a></li>
		  <li><a href="#">MANGA</a></li>
		  <li><a href="#">TOYS & COLLECTIBLES</a></li>
		  </ul>
	  </div>
	</nav>	
</body>
</html>
