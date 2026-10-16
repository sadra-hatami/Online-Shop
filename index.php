<?php
	session_start();
	include_once ('shop_sc_fns.php');
	do_html_header('www.prozhe.com مرجع دانلود رایگان پروژه های دانشجویی',get_categories());
	display_latest();
	do_html_footer();
?>
