<?php
	session_start();
	require_once('shop_sc_fns.php');
	if(check_admin_user())
	{
		do_html_header('مدیریت','');
		if(filled_out($_POST))
		{
			$old_passwd=$_POST['old_passwd'];
			$new_passwd=$_POST['new_passwd'];
			$new_passwd2=$_POST['new_passwd2'];
			if($new_passwd==$new_passwd2)
			{
				if(change_password($old_passwd,$new_passwd))
					echo 'پسورد با موفقیت ثبت شد . <br/>';
				else
					echo 'خطا در تغییر پسورد . <br/>';
			}
			else
			{
				echo 'پسورد های جدید همسان نیستند .<br/>';
			}
		}
		else
			echo 'اطلاعات وارد شده ناقص است .<br/>';
	}
	else
	{
	    do_html_header('مدیریت','');
		echo 'برای مشاهده ی این صفحه شما اعتبار سنجی نشده اید .<br/>';
	}
	display_password_form();
	do_html_footer();
?>