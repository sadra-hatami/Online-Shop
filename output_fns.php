<?php
function do_html_header($title='',$cat_array,$catid='')
{
//Print an html header
?>
<html>
        <head>
                <title><?php echo $title ?></title>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
                <link rel="stylesheet" type="text/css" href="style.css"/>
        </head>

        <body dir="rtl">
			<center>
			<table border = "0" cellspacing = "0" cellpadding="0">
				<tr style="background-color:black">
					<?php
						if(isset($_SESSION['admin_user']))
						{
							echo '<td style="width:60px"><a href="logout.php"><img src="img/logout.png" alt="خروج"/></a></td>';
						}
						else
						{
							echo '<td style="width:60px"><a href="/shop"><img src="img/faa0.gif" alt="صفحه اصلی"/></a></td>';
							echo '<td><a href="cart.php"><img src="img/faa1.gif" alt="سبد خرید"/></a></td>';
						}
					?>
				</tr>
				<tr>
					<td colspan="2" style="height:150px;vertical-align:bottom;background-image:url(img/840.gif)">
					<?php
					if(isset($_SESSION['admin_user']))
					{
						echo '<div id="navigation">';
						echo '<ul>';
						switch($_GET['taskid'])
						{
						case 1:
							echo '<li id="current"><a class="menu" href="login.php?taskid=1"><span> مدیریت کالا ها </span></a></li>';
							echo '<li><a class="menu" href="login.php?taskid=2"><span> مدیریت فروش </span></a></li>';
							echo '<li><a class="menu" href="login.php?taskid=3"><span> تغییر رمز عبور </span></a></li>';
							break;
						case 2:
							echo '<li><a class="menu" href="login.php?taskid=1"><span> مدیریت کالا ها </span></a></li>';
							echo '<li id="current"><a class="menu" href="login.php?taskid=2"><span> مدیریت فروش </span></a></li>';
							echo '<li><a class="menu" href="login.php?taskid=3"><span> تغییر رمز عبور </span></a></li>';
							break;
						case 3:
							echo '<li><a class="menu" href="login.php?taskid=1"><span> مدیریت کالا ها </span></a></li>';
							echo '<li><a class="menu" href="login.php?taskid=2"><span> مدیریت فروش </span></a></li>';
							echo '<li id="current"><a class="menu" href="login.php?taskid=3"><span> تغییر رمز عبور </span></a></li>';
							break;
						default:
							echo '<li><a class="menu" href="login.php?taskid=1"><span> مدیریت کالا ها </span></a></li>';
							echo '<li><a class="menu" href="login.php?taskid=2"><span> مدیریت فروش </span></a></li>';
							echo '<li><a class="menu" href="login.php?taskid=3"><span> تغییر رمز عبور </span></a></li>';
							break;
						}
						echo '</ul>';
						echo '</div>';
					}
					else
					{
						if(!is_array($cat_array))
						{
							echo '</td>';
							echo '</tr>';
							echo '</table>';
							return;
						}
						echo '<div id="navigation">';
						echo '<ul>';
						foreach($cat_array as $row)
						{
							$url='browse.php?catid='.($row['catid']).'&start=0';
							if($_GET['catid']==$row['catid'] || $row['catid']==$catid)
							{
							echo '<li id="current"><a class="menu" href="'.$url.'"><span> '.$row['catname'].' </span></a></li>';
							continue;
							}
							echo '<li><a class="menu" href="'.$url.'"><span> '.$row['catname'].' </span></a></li>';	
						}
						echo '</ul>';
						echo '</div>';
					}
					?>
					</td>
				</tr>
			</table>  
<?php
}
function do_html_footer()
{
  // print an HTML footer
?>
  </center>
  </body>
  </html>
<?php
}
function display_products($product_array,$start)
{
if(!is_array($product_array))
	return;
?>
<table border = "0" cellspacing = "2" cellpadding="2" style="border:dotted 2px;">
	<?php
		foreach($product_array as $row)
		{
			$url='product.php?productid='.($row['productid']).'&start='.$start;
			$urlcart='cart.php?new='.($row['productid']);
			echo '<tr style="vertical-align:middel">';
			echo '<td style="width:100;height:120"><img src="'.$row['imageurl'].'"/></td>';
			echo '<td style="text-align:right; vertical-align:top">';
			echo '<a href="'.$url.'">'.$row['farsiname'].'</a><br/>';
			echo '<a href="'.$url.'">'.$row['englishname'].'</a><br/>';
			echo '<span style="color:red">'.$row['price'].'</span> تومان <br/><br/>';
			echo '<a href="'.$urlcart.'"><img src="img/addtocart.gif"/> </a>';
			echo '</tr>';
		}
		echo '<tr style="text-align:center">';
		echo '<td colspan=2>';
		if(get_count_product($row['catid'])>($start+2))
			echo '<a href="'.$_SERVER['PHP_SELF'].'?catid='.$row['catid'].'&start='.($start+2).'"> << بعدی |</a>';
		else echo ' << بعدی |';
		if($start>0)
			echo '<a href="'.$_SERVER['PHP_SELF'].'?catid='.$row['catid'].'&start='.($start-2).'"> قبلی >> </a> ';
		else echo ' قبلی >> ';
		echo '</td>';
		echo '</tr>';
	?>
</table>
<?php
}
function display_product_details($product)
{
	if(!is_array($product))
		return;
?>
<table border = "0" cellspacing = "2" cellpadding="2" style="border:dotted 2px;">
	<?php
		echo '<tr style="vertical-align:middel">';
		$urlcart='cart.php?new='.($product['productid']);
		echo '<td style="width:100;height:120"><img src="'.$product['imageurl'].'"/></td>';
		echo '<td style="text-align:right; vertical-align:top">';
		echo $product['farsiname'].'<br/>';
		echo $product['englishname'].'<br/>';
		echo $product['description'].'</br>';
		echo '<span style="color:red">'.$product['price'].'</span> تومان <br/><br/>';
		echo '<a href="'.$urlcart.'"><img src="img/addtocart.gif"/> </a>';
		echo '</tr>';
		
		if($_GET['start'])
			$target='browse.php?catid='.$product['catid'].'&start='.$_GET['start'];
		else 
			$target='browse.php?catid='.$product['catid'].'&start=0';
	?>
	<tr style="text-align:center">
		<td colspan="2"><a href="<?php echo $target ?>"><img src="img/back.gif" alt="بازگشت"/></a></td>
	</tr>
</table>


<?php
}
function display_cart($cart,$change=true)
{
$row=1;
   echo '<table border = "0" cellspacing = "2" cellpadding="2" style="border:dotted 2px;">
        <form name="cartform1" action = "cart.php" method = "post">
        <tr bgcolor="#cccccc"><th>ردیف</th>
        <th>شرح</th><th>تعداد</th>
        <th>قیمت واحد</th><th>جمع</th></tr>';

  //display each item as a table row
  foreach ($cart as $productid => $qty)
  {
    $product = get_product_details($productid);
    echo '<tr style="text-align:center">'; 
	echo '<td>'.$row++.'</td>';
    echo '<td><a href = "product.php?productid='.$productid.'">'.$product['farsiname'].'</a></td>';
	if ($change==true)
	{
		echo "<td><select name = \"$productid\" onchange=\"document.cartform1.submit()\">";
		for($i=0;$i<=10;$i++)
		{
			if($i==0)
			{
				echo "<option value=\"$i\" selected=\"selected\">حذف</option>";
				continue;
			}
			if($i==$qty)
				echo "<option value=\"$i\" selected=\"selected\">$i</option>";
			else 
				echo "<option value=\"$i\">$i</option>";
		}
		echo '</td>';
	}
	else
		echo '<td>'.$qty.'</td>';
    echo '<td>'.$product['price'].'</td>';
	echo '<td>'.$product['price']*$qty.'</td>';
  }
  echo '<tr>';
  echo '<td style="text-align:left" colspan="4"><span style="color:red"><b> جمع کل : </b></span></td>';
  echo '<td style="background-color:#cccccc"><b>'.$_SESSION['total_price'].' تومان </b></td>';
  echo '</tr>';
  if($change==true)
  {
	echo '<tr>';
	echo '<td align="center">';
	echo '<a href="checkout.php"><img src="img/checkout.gif" alt="پایان خرید"/></a>';
	echo '</td>';
	echo '<td>';
    echo '<input type = "hidden" name = "save" value = "true">';  
    echo '</td>';
    echo '</tr>';
  }
  echo '</form></table>';
}

	function display_checkout_form()
	{
		echo '<table border="0" cellspacing="0" cellpadding="3" style="border:dotted 2px;">';
		echo '<form action="insert_order.php" method="post">';
		echo '<tr><td colspan="2"><h3> مشخصات خریدار</h3></td></tr>';
		echo '<tr><td width="20%"> نام و نام خانوادگی : </td><td><input type="text" name="name" size="20" maxlength="50"/></td></tr>';
		echo '<tr><td> تلفن : </td><td><input type="text" name="tel" size="20" maxlength="50"/></td></tr>';
		echo '<tr><td style="vertical-align:top;"> آدرس :</td><td><textarea name="address" cols="40" rows="3"></textarea></td></tr>';
		echo '<tr><td> کد پستی : </td><td><input type="text" name="zipcode" size="20" maxlength="50"/></td></tr>';
		echo '<tr><td colspan="2"><input type="image" src="img/send.gif" alt="ارسال اطلاعات"/> <a href="cart.php"> <img src="img/back.gif" alt="بازگشت"/></a></td></tr>';
		echo '</form>';
		echo '</table>';
	}
	
	function display_login_form()
	{
		echo '
		<form method=\'post\' action="login.php?taskid=1">
        <table border="0" bgcolor=\'#cccccc\' style="width:35%;height:150px;border:dotted 2px">
        <tr>
        <td>نام کاربری :</td>
        <td><input type=\'text\' name=\'username\' value=\'\'></td></tr>
        <tr>
        <td>کلمه عبور :</td>
        <td><input type=\'password\' name=\'password\' value=\'\'></td></tr>
        <tr>
        <td colspan=2 align=\'center\'>
        <input type=\'submit\' value="ورود به بخش مدیریت"></td></tr>
        <tr>
        </table></form>';
	}
	
	function display_latest()
	{
		$product_array=get_products(-1,0,4);
		if(!is_array($product_array))
			return;
		echo '<table table border="0" cellspacing="0" cellpadding="3" style="border:dotted 2px;background-color:white">';
		echo '<tr><td colspan="4"><img src="img/latest.gif"/></td></tr>';
		echo '<tr style="text-align:center">';
		foreach($product_array as $row)
		{
			$url='product.php?productid='.($row['productid']);
			echo '<td>';
			echo '<img src="'.$row['imageurl'].'" alt="'.$row['englishname'].'" width="100" height="110"/><br/><a href="'.$url.'">'.$row['farsiname'].'</a></td>';
		}
		echo '</tr>'; 
	}
	
	function display_product_for_admin()
	{
		if(isset($_GET['start']))
			$start=$_GET['start'];
		else
			$start=0;
		$product_array=get_products(-1,$start,10);
		$i=1;
		if(!is_array($product_array))
			return;
		echo '<table border = "0" cellspacing = "0" cellpadding="5" style="border:dotted 2px;">';
		echo '<tr style="background-color:#000;color:#ffffff"><th>عملیات</th><th>ردیف</th><th>نام فارسی</th><th>نام انگلیسی</th><th>توضیحات</th><th>طبقه</th><th>قیمت</th><th>عکس</th></tr>';
		foreach($product_array as $row)
		{
			if(($i%2)==0)
				echo '<tr style="text-align:center;background-color:#dddddd">';
			else
				echo '<tr style="text-align:center;background-color:#eeeeee">';
			echo '<td><a href="delete_product.php?taskid=1&productid='.$row['productid'].'"><img src="img/trash.png" height="30" width="30"/></a></td>';
			echo '<td>'.$i++.'</td>';
			echo '<td>'.$row['farsiname'].'</td>';
			echo '<td>'.$row['englishname'].'</td>';
			echo '<td>'.$row['description'].'</td>';
			echo '<td>'.get_category_name($row['catid']).'</td>';
			echo '<td>'.$row['price'].' تومان </td>';
			echo '<td><img src="'.$row['imageurl'].'"/></td>';
			echo '</tr>';
		}
		echo '<tr style="text-align:center">';
		echo '<td colspan="8">';
		if(get_count_product(-1)>($start+10))
			echo '<a href="'.$_SERVER['PHP_SELF'].'?taskid=1&start='.($start+10).'"> << بعدی |</a>';
		else echo ' << بعدی |';
		if($start>0)
			echo '<a href="'.$_SERVER['PHP_SELF'].'?taskid=1&start='.($start-10).'"> قبلی >> </a> ';
		else echo ' قبلی >> ';
		echo '</td>';
		echo '</tr>';
		echo '</table>';
	}

	function insert_product_form()
	{
		$dat=@date('Y-m-d H:i:s');
		echo '<table border = "0" cellspacing = "0" cellpadding="5" style="border:dotted 2px;">';
		echo '<form enctype="multipart/form-data" action="insert_product.php?taskid=1" method="post">';
		echo '<tr><td colspan="2"><h4 style="color:red">درج محصول جدید</h4></td></tr>';
		echo '<tr><td>نام فارسی : </td><td><input type="text" name="farsiname"/></td></tr>';
		echo '<tr><td>نام انگلیسی : </td><td><input type="text" name="englishname"/></td></tr>';
		echo '<tr><td style="vertical-align:top">توضیحات :</td><td><textarea cols="50" rows="5" name="description"></textarea></td></tr>';
		echo '<tr><td>طبقه : </td><td><select name="catid">';
		$catarray=get_categories();
		foreach($catarray as $row)
		{
			echo '<option value="'.$row['catid'].'">'.$row['catname'].'</option>';
		}
		echo '<tr><td> قیمت : </td><td><input type="text" name="price"/></td></tr>';
		echo '<tr><td> تاریخ : </td><td><input type="text" name="dat" value="'.$dat.'"/></td></tr>';
		echo '<tr><td> عکس : </td><td><input type="file" name="userfile"/></td></tr>';
		echo '<input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>';
		echo '<tr><td colspan="2" style="text-align:center"><input type="submit" value="ذخیره اطلاعات"/></td></tr>';
		echo '</form>';
		echo '</table>';
		
	}
	
	function display_order_for_admin()
	{
		if(isset($_GET['start']))
			$start=$_GET['start'];
		else
			$start=0;
		$order_array=get_orders($start,10);
		if(!is_array($order_array))
		{
			echo 'جدول سفارشات خالی می باشد .';
			exit;
		}
		$i=1;
		echo '<table border = "0" cellspacing = "0" cellpadding="5" style="border:dotted 2px;">';
		echo '<tr style="background-color:#000;color:#ffffff"><th>عملیات</th><th>ردیف</th><th>نام محصول</th><th>تعداد</th><th>مجموع قیمت</th><th>نام مشتری</th><th>تلفن</th><th>آدرس</th><th>کد پستی</th></tr>';
		foreach($order_array as $row)
		{
			$nameproduct=get_product_details($row['productid']);
			if(($i%2)==0)
				echo '<tr style="text-align:center;background-color:#dddddd">';
			else
				echo '<tr style="text-align:center;background-color:#eeeeee">';
			echo '<td><a href="delete_order.php?taskid=2&orderid='.$row['orderid'].'"><img src="img/trash.png" height="30" width="30"/></a></td>';
			echo '<td>'.$i++.'</td>';
			echo '<td>'.$nameproduct['farsiname'].'<br/>'.$nameproduct['englishname'].'</td>';
			echo '<td>'.$row['items'].'</td>';
			echo '<td>'.$row['total_price'].' تومان </td>';
			echo '<td>'.$row['name'].'</td>';
			echo '<td>'.$row['tel'].'</td>';
			echo '<td>'.$row['address'].'</td>';
			echo '<td>'.$row['zipcode'].'</td>';
			echo '</tr>';
		}
		echo '<tr style="text-align:center">';
		echo '<td colspan="9">';
		if(get_count_order()>($start+10))
			echo '<a href="'.$_SERVER['PHP_SELF'].'?taskid=1&start='.($start+10).'"> << بعدی |</a>';
		else echo ' << بعدی |';
		if($start>0)
			echo '<a href="'.$_SERVER['PHP_SELF'].'?taskid=1&start='.($start-10).'"> قبلی >> </a> ';
		else echo ' قبلی >> ';
		echo '</td>';
		echo '</tr>';
		echo '</table>';
	}
	
	function display_password_form()
	{
		echo '<table border = "0" cellspacing = "0" cellpadding="5" style="border:dotted 2px;">';
		echo '<form action="change_password.php" method="post">';
		echo '<tr><td width="200">پسورد : </td><td><input type="text" name="old_passwd" maxlenght="10"/></td></tr>';
		echo '<tr><td>پسورد جدید : </td><td><input type="password" name="new_passwd" maxlenght="10"/></td></tr>';
		echo '<tr><td>پسورد جدید را دوباره تکرار کنید : </td><td><input type="password" name="new_passwd2" maxlenght="10"/></td></tr>';
		echo '<tr><td colspan="2" align="center"><input type="submit" value="ذخیره" maxlenght="10"/></td></tr>';
		echo '</form>';
		echo '</table>';
	}
?>

