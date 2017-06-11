<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Usbong Store Header</title>
	<style type="text/css">

	::selection { background-color: #f07746; color: #fff; }
	::-moz-selection { background-color: #f07746; color: #fff; }

	body {
		background-color: #fff;
		margin: 0px auto;
		max-width: 1024px;
		font: 16px/24px normal "Helvetica Neue",Helvetica,Arial,sans-serif;
		color: #808080;
	}
	
	p {
		 margin: 0 0 10px;
		 padding:0;
	}

	p.footer {
		text-align: right;
		font-size: 12px;
		border-top: 1px solid #d0d0d0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
		background:#8ba8af;
		color:#fff;
	}
	
	.Search {
	}

	.Search-input {
		width: 60%;
		float:left;
		font-size: 22px;
		padding: 4px;
	}
	
	.Button-container {
	}
	
	.Button {
		font-size: 22px;
		padding: 4px;
	}
}
	
	</style>
</head>
<body>
<!--	<img src="<?php echo base_url('assets/images/usbongStoreBrandLogo.png'); ?>">	-->
	<div class="Search">
		<input type="text" class="Search-input" placeholder="I'm looking for...">
		<div class="Button-container"><button type="button" class="Button">Search</button></div>
    </div>
</body>
</html>
