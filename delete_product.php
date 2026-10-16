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
		if(isset($_GET['productid']))
		{
			$productid=$_GET['productid'];
			if(delete_product($productid))
				echo '<p style="font-size:17;color:red">محصول مورد نظر با موفقیت پاک شد ..</p>';
			else
				echo '<p style="font-size:17;color:red">این محصول نمی تواند پاک شود ..</p>';
		}
		else
			echo '<p style="font-size:17;color:red">شما برای پاک کردن محصول نیاز به آی دی آن دارید</p>';
		insert_product_form();
		display_product_for_admin();
		do_html_footer();
	}

?>