<?php
	session_start();
	require_once('shop_sc_fns.php');
	$taskid=$_GET['taskid'];
	if($_POST['username'] && $_POST['password'])
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		if(login($username,$password))
		{
			$_SESSION['admin_user']=$username;
			do_html_header('مدیریت',get_categories());
			switch($taskid)
			{
				case 1:
					insert_product_form();
					display_product_for_admin();
					break;
				case 2:
					display_order_for_admin();
					break;
				case 3:
					display_password_form();
					break;
			}
	        do_html_footer();
			exit;
		}
		else
		{
			do_html_header('ورود به بخش مدیریت',get_categories());
			echo '<p style="font-size:17;color:red">نام کاربری یا کلمه عبور اشتباه است .</p>';
			display_login_form();
			do_html_footer();
			exit;
		}
	}
	else if(check_admin_user())
	{
		do_html_header('مدیریت','');
		switch($taskid)
		{
			case 1:
				insert_product_form();
				display_product_for_admin();
				break;
			case 2:
				display_order_for_admin();
				break;
			case 3:
				display_password_form();
				break;
		}
	    do_html_footer();
		exit;
	}
	if(!check_admin_user())
	{
		do_html_header('ورود به بخش مدیریت',get_categories());
		display_login_form();
		do_html_footer();
	}
?>