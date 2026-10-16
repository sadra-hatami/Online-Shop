<?php
	session_start();
	require_once('shop_sc_fns.php');
	if(check_admin_user())
	{
		do_html_header('مدیریت','');
		if(filled_out($_POST))
		{
			$farsiname=$_POST['farsiname'];
			$description=$_POST['description'];
			$englishname=$_POST['englishname'];
			$catid=$_POST['catid'];
			$price=$_POST['price'];
			$dat=$_POST['dat'];
			
			
			if($_FILES['userfile']['error']>0)
			{
				echo 'خطای فایل عکس : ';
				switch($_FILES['userfile']['error'])
				{
					case 1: echo 'اندازه فایل بزرگتر از حد مجاز است.';break;
					case 2: echo 'اندازه فایل بزرگتر از حد مجاز است.';break;
					case 3: echo 'تنها بخشی از فایل به سرور منتقل شده است .'; break;
					case 4: echo 'هیچ فایلی به سرور منتقل نشده است .'; break;
				}
				insert_product_form();
				display_product_for_admin();
				do_html_footer();
				exit;
			}
			if($_FILES['userfile']['type']!='image/gif')
			{
				if($_FILES['userfile']['type']!='image/png')
					if($_FILES['userfile']['type']!='image/jpeg')
					{
					echo 'خطا در نوع فایل عکس : این فایل یک عکس نیست .';
					insert_product_form();
					display_product_for_admin();
					do_html_footer();
					exit;
					}
			}
			$upfile='image/'.$_FILES['userfile']['name'];
			if(is_uploaded_file($_FILES['userfile']['tmp_name']))
			{
				if(!move_uploaded_file($_FILES['userfile']['tmp_name'],$upfile))
				{
					echo 'خطا فایل عکس : فایل نمی توان به فولدر مورد نظر منتقل شود .';
					insert_product_form();
					display_product_for_admin();
					do_html_footer();
					exit;
				}
			}
			else
			{
				echo 'خطا فایل عکس : ';
				insert_product_form();
				display_product_for_admin();
				do_html_footer();
				exit;
			}
			if(insert_product($farsiname,$description,$englishname,$catid,$price,$dat,$upfile))
				echo 'محصول با موفقیت ثبت شد .<br/>';
			else
				echo 'محصول نمی تواند ذخیره شود .<br/>';
		}
		else
			echo 'اطلاعات وارد شده ناقص است .<br/>';
	}
	else
	{
	    do_html_header('مدیریت','');
		echo 'برای مشاهده ی این صفحه شما اعتبار سنجی نشده اید .<br/>';
	}
	insert_product_form();
	display_product_for_admin();
	do_html_footer();
?>