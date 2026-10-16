<?php
	session_start();
	require_once('shop_sc_fns.php');
	do_html_header('مشخصات خریدار',get_categories());
	if($_SESSION['cart'] && count($_SESSION['cart']))
	{
		display_cart($_SESSION['cart'],false);
		display_checkout_form();
	}
	else
	echo '<p style="font-size:24;color:red">سبد خرید شما خالی است</p>';
	do_html_footer();
?>