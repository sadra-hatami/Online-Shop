<?php
	session_start();
	include_once ('shop_sc_fns.php');
	$pid=$_GET['productid'];
	$product=get_product_details($pid);
	do_html_header($product['farsiname'].'__'.$product['englishname'],get_categories(),$product['catid']);
	display_product_details($product);
	do_html_footer();
?>