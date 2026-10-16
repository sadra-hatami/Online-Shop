<?php
function get_categories()
{
   // query database for a list of categories
   $conn = db_connect();
   $query = 'select catid, catname
             from categories'; 
   $result = @$conn->query($query);  
   if (!$result)
     return false;
   $num_cats = @$result->num_rows;
   if ($num_cats ==0)
      return false;  
   $result = db_result_to_array($result);
   return $result; 
}

function get_category_name($catid)
{
   // query database for the name for a category id
   $conn = db_connect();
   $query = "select catname
             from categories 
             where catid = $catid"; 
   $result = @$conn->query($query);
   if (!$result)
     return false;
   $num_cats = @$result->num_rows;
   if ($num_cats ==0)
      return false;  
   $row = $result->fetch_object();
   return $row->catname; 
}


function get_products($catid,$start,$lenght=2)
{
   if (!$catid || $catid=='')
     return false;
   
   $conn = db_connect();
   if($catid!=-1)
	$query = "select * from product where catid='$catid' order by dat desc limit $start,$lenght";
   else
	$query = "select * from product order by dat desc limit $start,$lenght";
   $result = @$conn->query($query);
   if (!$result)
     return false;
   $num_books = @$result->num_rows;
   if ($num_books ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}

function get_product_details($pid)
{
  if (!$pid || $pid=='')
     return false;

   $conn = db_connect();
   $query = "select * from product where productid='$pid'";
   $result = @$conn->query($query);
   if (!$result)
     return false;
   $result = @$result->fetch_assoc();
   return $result;
}

function get_count_product($catid)
{
	$conn=db_connect();
	if($catid!=-1)
		$query="select count(*) as count from product where catid='$catid'";
	else
		$query="select count(*) as count from product";
	$result = $conn->query($query);
	$row=mysqli_fetch_array($result);
    return $row['count'];
}

function calculate_price($cart)
{
  // sum total price for all items in shopping cart
  $price = 0.0;
  if(is_array($cart))
  {
    $conn = db_connect();
    foreach($cart as $productid => $qty)
    {  
      $query = "select price from product where productid='$productid'";
      $result = $conn->query($query);
      if ($result)
      {
        $item = $result->fetch_object();
        $item_price = $item->price;
        $price +=$item_price*$qty;
      }
    }
  }
  return $price;
}

function calculate_items($cart)
{
  $items = 0;
  if(is_array($cart))
  {
    foreach($cart as $isbn => $qty)
    {  
      $items += $qty;
    }
  }
  return $items;
}

function insert_order($name,$tel,$address,$zipcode,$cart)
{
	$conn = db_connect();
    foreach($cart as $productid => $qty)
	{
		$product = get_product_details($productid);
		$query="INSERT INTO `shop_sc`.`order` (`orderid`, `productid`, `items`, `total_price`, `name`, `tel`, `address`, `zipcode`) VALUES (null,$productid,$qty,".($product['price']*$qty).",'$name','$tel','$address','$zipcode')";
		$result=$conn->query($query);
		if(!$result)
			return false;
	}
	return true;
}

function delete_product($productid)
{
	$product=get_product_details($productid);
	$conn = db_connect();
    $query = "delete from product where productid=$productid";
    $result = @$conn->query($query);
    if (!$result)
		return false;
    else
	{
		if(file_exists($product['imageurl']))
			unlink($product['imageurl']);
		return true;
	}
}

function insert_product($farsiname,$description,$englishname,$catid,$price,$dat,$upfile)
{
   $conn = db_connect();
   $query = "insert into product values
            (NULL,'$farsiname','$englishname','$description','$catid','$price','$dat','$upfile')";
  
   $result = $conn->query($query);
   if (!$result)
     return false;
   else
     return true;
}

function get_orders($start,$lenght)
{
   $conn = db_connect();
   $query = "select * from shop_sc.order limit $start,$lenght";
   $result = @$conn->query($query);
   if (!$result)
     return false;
   $num_orders = @$result->num_rows;
   if ($num_orders ==0)
      return false;
   $result = db_result_to_array($result);
   return $result;
}

function get_count_order()
{
	$conn=db_connect();
	$query="select count(*) as count from shop_sc.order";
	$result = $conn->query($query);
	$row=mysqli_fetch_array($result);
    return $row['count'];
}

function delete_order($orderid)
{
	$conn = db_connect();
    $query = "delete from shop_sc.order where orderid=$orderid";
    $result = @$conn->query($query);
    if (!$result)
		return false;
    else
		return true;
}
?>
