<?php
	session_start();
	require_once('shop_sc_fns.php');
	do_html_header('ثبت مشخصات',get_categories());
	$name=$_POST['name'];
	$tel=$_POST['tel'];
	$address=$_POST['address'];
	$zipcode=$_POST['zipcode'];
	if($_SESSION['cart'] && $name && $tel && $address && $zipcode)
	{
		if(insert_order($name,$tel,$address,$zipcode,$_SESSION['cart'])!=false)
		{
			unset($_SESSION['cart']);
			echo '<p style="font-size:24;color:red">اطلاعات با موفقیت ثبت شد . <br/> سبد خرید خالی شد .</p>';
			echo '<a href="index.php"> <img src="img/back.gif" alt="بازگشت"/></a>';
		}
		else
		{
			echo '<p style="font-size:24;color:red">اطلاعات نمی توانند ذخیره شوند دوباره امتحان کنید .</p>';
			echo '<a href="checkout.php"> <img src="img/back.gif" alt="بازگشت"/></a>';
		}
	}
	else
	{
		echo '<p style="font-size:24;color:red">اطلاعات وارد شده ناقص است. <br/>لطفا دکمه بازگشت را زده و اطلاعات را تصحیح کنید .</p><br/><a href="checkout.php"> <img src="img/back.gif" alt="بازگشت"/></a>';
	}
?>