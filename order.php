<?php
session_start();
include("includes/db.php");
include("includes/functions.php");


?>
<?php

    $c_email = $_SESSION['customer_email'];

    $sql = "select customer_id from customers where customer_email= '$c_email'";
    $run_sql = mysqli_query($con,$sql);
    $select_cust = mysqli_fetch_array($run_sql);
    $customer_id = $select_cust['customer_id'];
    $ip_add = getUserIP();
    $invoice_no = mt_rand();
    $select_cart = "select *from cart where ip_add='$ip_add'";
    $run_cart = mysqli_query($con,$select_cart);


    while ($row_cart=mysqli_fetch_array($run_cart)) {

        $pro_id = $row_cart['product_id'];
        $qty = $row_cart['qty'];
        
        $get_product = "select *from products where product_id='$pro_id'";
        $run_pro = mysqli_query($con,$get_product);
        
        while ($row_pro=mysqli_fetch_array($run_pro)) {
            $sub_total = $row_pro['product_price']*$qty;
        
            $insert_customer_order = "insert into customer_order (customer_id,product_id,amount,invoice_no,qty,order_date)
            values('$customer_id','$pro_id','$sub_total','$invoice_no','$qty',NOW())";
        
            $run_cust_order = mysqli_query($con,$insert_customer_order);
            $delete_cart = "delete from cart where ip_add='$ip_add'";
            $run_delete = mysqli_query($con,$delete_cart);
        
            
        }
        }

        echo "<script>alert('Your order has been submitted')</script>";
        echo "<script>window.open('cart.php','_self')</script>";

    

?>
