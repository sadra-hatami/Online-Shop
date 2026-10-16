<?php
  session_start();
  include ('shop_sc_fns.php');
  @ $new = $_GET['new'];
  
  session_start();
  if($new)
  {
    //new item selected
    if(!isset($_SESSION['cart']))
    {
      $_SESSION['cart'] = array();
      $_SESSION['items'] = 0;
      $_SESSION['total_price'] ='0.00';
    }

    if(isset($_SESSION['cart'][$new]))
      $_SESSION['cart'][$new]++;
    else 
      $_SESSION['cart'][$new] = 1;

    $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
    $_SESSION['items'] = calculate_items($_SESSION['cart']);
  }

  if(isset($_POST['save']))
  {   
    foreach ($_SESSION['cart'] as $productid => $qty)
    {
      if($_POST[$productid]=='0')
        unset($_SESSION['cart'][$productid]);
      else 
        $_SESSION['cart'][$productid] = $_POST[$productid];
    }
    $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
    $_SESSION['items'] = calculate_items($_SESSION['cart']);
  }

  do_html_header('سبد خرید',get_categories());

  if($_SESSION['cart']&&array_count_values($_SESSION['cart']))
    display_cart($_SESSION['cart']);
  else
  {
    echo '<p style="font-size:24;color:red">سبد خرید شما خالی است</p>';
  }
  $target = 'index.php';

  if($new)
  {
    $details =  get_product_details($new);
    if($details['catid'])    
      $target = 'browse.php?catid='.$details['catid']; 
  }
  do_html_footer();
?>
