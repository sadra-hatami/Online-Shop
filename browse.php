<?php
	session_start();
	include_once ('shop_sc_fns.php');
	
	$catid=$_GET['catid'];
	$name=get_category_name($catid);
	
    do_html_header($name,get_categories());
	$products_array=get_products($catid,$_GET['start']);
	display_products($products_array,$_GET['start']);
	
    do_html_footer();
?>