<?php
	session_start();
	require_once('shop_sc_fns.php'); 
	unset($_SESSION['admin_user']);
	do_html_header('ورود به بخش مدیریت',get_categories());
	display_login_form();
	do_html_footer();
?>
