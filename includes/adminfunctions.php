<?php
$db = mysqli_connect("localhost","root","","siamscart");

function getUserIP(){

    switch (true) {
        case (!empty($_SERVER['HTTP_X_REAL_IP'])): return $_SERVER['HTTP_X_REAL_IP'];
            
        case (!empty($_SERVER['HTTP_X_CLIENT_IP'])): return $_SERVER['HTTP_X_CLIENT_IP'];

        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])): return $_SERVER['HTTP_X_FORWARDED_FOR'];
        
        default: return $_SERVER['REMOTE_ADDR'];
    }

}

function show_orders()
{
    global $db;
    $get_order=  "select * from customer_order";
    $run_order= mysqli_query($db,$get_order);

    while ($row_product=mysqli_fetch_array($run_order)) {
        $pro_id = $row_product['product_id'];
        $order_id = $row_product['order_id'];
        $customer_id = $row_product['customer_id'];
        $amount = $row_product['amount'];
        $invoice = $row_product['invoice_no'];
        $qty = $row_product['qty'];
        $date = $row_product['order_date'];

        $get_pro = "select *from products where product_id='$pro_id'";
        $run_pro =  mysqli_query($db,$get_pro);

        while ($row_pro=mysqli_fetch_array($run_pro)) {
            $product_title = $row_pro['product_title'];
            $product_img = $row_pro['product_img'];
            $product_price = $row_pro['product_price'];
        }

        $get_cust = "select *from customers where customer_id='$customer_id'";
        $run_cust =  mysqli_query($db,$get_cust);

        while ($row_cust=mysqli_fetch_array($run_cust)) {
            $cust_name = $row_cust['customer_name'];
            $cust_img = $row_cust['customer_image'];
        }

        echo "<tr>
        <td><img src='products/$product_img'></td>
        <td>$product_title</td>
        <td>$cust_name</td>
        <td>$qty</td>
        <td>$invoice</td>
        <td>$date</td>
        <td>BDT : $product_price</td>
        <td>BDT : $amount</td>
        </tr>";


    }


}

function show_products()
{
    global $db;
    $get_product=  "select *from products";
    $run_products= mysqli_query($db,$get_product);


    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];
        $pro_keyword = $row_product['product_keyword'];

        


        echo "<tr>
        <td><img src='products/$pro_img'></td>
        <td>$pro_title</td>
        <td>$pro_desc</td>
        <td>$pro_price</td>
        <td>$pro_keyword</td>
        </tr>";


    }


}

function show_customers()
{
    global $db;
    $get_cust=  "select *from customers";
    $run_cust= mysqli_query($db,$get_cust);


    while ($row_product=mysqli_fetch_array($run_cust)) {
        $cust_id = $row_product['customer_id'];
        $cust_img = $row_product['customer_image'];
        $cust_name = $row_product['customer_name'];
        $cust_email = $row_product['customer_email'];
        $cust_country = $row_product['customer_country'];
        $cust_city = $row_product['customer_city'];
        $cust_contact = $row_product['customer_contact'];
        $cust_address = $row_product['customer_address'];

        


        echo "<tr>
        <td>$cust_name</td>
        <td><img src='customer_images/$cust_img'></td>
        <td>$cust_email</td>
        <td>$cust_contact</td>
        <td>$cust_country</td>
        <td>$cust_city</td>
        <td>$cust_address</td>
        </tr>";


    }


}

function insert_products(){

    global $db;
    if(isset($_POST['insert'])){

        $product_title = $_POST['product_title'];
        $product_image = $_FILES['product_img']['name'];
        $temp_name = $_FILES['product_img']['tmp_name'];

        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];

        $product_keyword = $_POST['product_keyword'];
        $main_cat = $_POST['main_cat'];
        $product_cat = $_POST['product_cat'];

        $cat = $_POST['cat'];

        move_uploaded_file($temp_name, "products/$product_image");

        $insert_product = "insert into products (main_cat_id,p_cat_id,cat_id,product_title,product_img,product_price,product_desc,product_keyword,Date)
        values('$main_cat','$product_cat','$cat','$product_title','$product_image','$product_price','$product_desc','$product_keyword',NOW())";

        $run_product = mysqli_query($db,$insert_product);

        if($run_product){

            
            echo "<script>alert('Your products have been inserted successfully')</script>";
            echo "<script>window.open('adminpanel.php','_self')</script>";

        }


    }

}


?>