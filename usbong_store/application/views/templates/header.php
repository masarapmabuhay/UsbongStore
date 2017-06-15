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
		  <li class="active"><a href = "<?php echo site_url('b/books')?>">BOOKS</a></li>
		  <li><a href = "<?php echo site_url('b/combos')?>">COMBOS</a></li>
		  <li><a href = "<?php echo site_url('b/beverages')?>">BEVERAGES</a></li>
		  <li><a href = "<?php echo site_url('b/comics')?>">COMICS</a></a></li>
		  <li><a href = "<?php echo site_url('b/manga')?>">MANGA</a></a></li>
		  <li><a href = "<?php echo site_url('b/toys-and-collectibles')?>">TOYS & COLLECTIBLES</a></a></li>
		  </ul>
	  </div>
	</nav>	
</body>
</html>
