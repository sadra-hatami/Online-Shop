<?php
	session_start();
	require_once('shop_sc_fns.php'); 
	if(!check_admin_user())
	{
		do_html_header('ورود به بخش مدیریت',get_categories());
		display_login_form();
		do_html_footer();
	}
	else
	{
		do_html_header('مدیریت','');
		if(isset($_GET['orderid']))
		{
			$orderid=$_GET['orderid'];
			if(delete_order($orderid))
				echo '<p style="font-size:17;color:red">سفارش مورد نظر با موفقیت پاک شد ..</p>';
			else
				echo '<p style="font-size:17;color:red">این سفارش نمی تواند پاک شود ..</p>';
		}
		else
			echo '<p style="font-size:17;color:red">شما برای پاک کردن سفارش نیاز به آی دی آن دارید</p>';
		display_order_for_admin();
		do_html_footer();
	}

?>