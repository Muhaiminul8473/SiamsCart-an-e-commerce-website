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


function get_pro()
{
    global $db;
    $get_product=  "select * from products order by 1 Asc LIMIT 0,8";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-3'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}

function get_books()
{
    global $db;
    $get_product=  "SELECT * FROM `products` WHERE main_cat_id=1 LIMIT 0,8";
    $run_products= mysqli_query($db,$get_product);
    $count=1;
    while ($row_product=mysqli_fetch_array($run_products)) {
        
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        if($count<=4){

            echo "<div class='col-3'><a href='details.php?pro_id=$pro_id'><img class='d-block w-100' src='books/$pro_img' alt='First slide'></a></div>";
            

        }
        
        
        
        $count= $count+1;

    }


}

function get_books2()
{
    global $db;
    $get_product=  "SELECT * FROM `products` WHERE main_cat_id=1 LIMIT 0,8";
    $run_products= mysqli_query($db,$get_product);
    $count=1;
    while ($row_product=mysqli_fetch_array($run_products)) {
        
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        if($count>4){

            echo "<div class='col-3'><a href='details.php?pro_id=$pro_id'><img class='d-block w-100' src='books/$pro_img' alt='First slide'></a></div>";

        }
        
        $count= $count+1;

    }


}

function get_phones()
{
    global $db;
    $get_product=  "SELECT * FROM `products` WHERE main_cat_id=2 and p_cat_id=7 LIMIT 0,8";
    $run_products= mysqli_query($db,$get_product);
    $count=1;
    while ($row_product=mysqli_fetch_array($run_products)) {
        
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        if($count<=4){

            echo "<div class='col-3'><a href='details.php?pro_id=$pro_id'><img class='d-block w-100' src='products/$pro_img' alt='First slide'></a></div>";
            

        }
        
        
        
        $count= $count+1;

    }

}

function get_phones2()
{

    global $db;
    $get_product=  "SELECT * FROM `products` WHERE main_cat_id=2 and p_cat_id=7 LIMIT 0,8";
    $run_products= mysqli_query($db,$get_product);
    $count=1;
    while ($row_product=mysqli_fetch_array($run_products)) {
        
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        if($count>4){

            echo "<div class='col-3'><a href='details.php?pro_id=$pro_id'><img class='d-block w-100' src='products/$pro_img' alt='First slide'></a></div>";

        }
        
        $count= $count+1;

    }
}
function addCart(){

    global $db;
    if(isset($_GET['add_cart'])){
        $ip_add = getUserIP();
        $p_id = $_GET['add_cart'];
        $product_qty = $_POST['product_qty'];


        $check_product = "select *from cart where ip_add='$ip_add' and product_id='$p_id'";
        $run_check = mysqli_query($db,$check_product);
        if(mysqli_num_rows($run_check)>0){
            echo "<script>alert('This product is already added in the cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        }
        else{
            $query = "insert into cart(product_id,ip_add,qty) values('$p_id','$ip_add','$product_qty')";
            $run_query = mysqli_query($db,$query);

            echo "<script> alert('The product has been inserted in your cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";

        }

    }

}

function getmaincatforbooks(){

    global $db;
    $get_product=  "select * from products where main_cat_id= 1";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}

function getmaincatforelectronics(){

    global $db;
    $get_product=  "select * from products where main_cat_id= 2";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}

function getmaincatforwearables(){

    global $db;
    $get_product=  "select * from products where main_cat_id= 3";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}

function getmaincatforstationaries(){

    global $db;
    $get_product=  "select * from products where main_cat_id= 4";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}

function getmaincatforgifts(){

    global $db;
    $get_product=  "select * from products where main_cat_id= 5";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}

function getmaincatforfood(){

    global $db;
    $get_product=  "select * from products where main_cat_id= 6";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}
//Sidebar works start
function get_sidebar_forbooks()
{
    global $db;
    $get_product=  "select * from product_categories LIMIT 0,6";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_cat_id = $row_product['p_cat_id'];
        $pro_cat_title = $row_product['p_cat_title'];

        echo "<a href='books.php?pro_cat_id=$pro_cat_id'>$pro_cat_title</a>";


    }


}

function get_sidebar_gender_forbooks()
{
    global $db;
    $get_product=  "select * from categories";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $cat_id = $row_product['cat_id'];
        $cat_title = $row_product['cat_title'];

        echo "<a href='books.php?cat_id=$cat_id'>$cat_title</a>";


    }


}

function get_sidebar_forelectronics()
{
    global $db;
    $get_product=  "select * from product_categories LIMIT 6,6";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_cat_id = $row_product['p_cat_id'];
        $pro_cat_title = $row_product['p_cat_title'];

        echo "<a href='electronics.php?pro_cat_id=$pro_cat_id'>$pro_cat_title</a>";


    }


}

function get_sidebar_gender_forelectronics()
{
    global $db;
    $get_product=  "select * from categories";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $cat_id = $row_product['cat_id'];
        $cat_title = $row_product['cat_title'];

        echo "<a href='electronics.php?cat_id=$cat_id'>$cat_title</a>";


    }


}

function get_sidebar_forwearables()
{
    global $db;
    $get_product=  "select * from product_categories LIMIT 12,6";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_cat_id = $row_product['p_cat_id'];
        $pro_cat_title = $row_product['p_cat_title'];

        echo "<a href='wearables.php?pro_cat_id=$pro_cat_id'>$pro_cat_title</a>";


    }


}

function get_sidebar_gender_forwearables()
{
    global $db;
    $get_product=  "select * from categories";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $cat_id = $row_product['cat_id'];
        $cat_title = $row_product['cat_title'];

        echo "<a href='wearables.php?cat_id=$cat_id'>$cat_title</a>";


    }


}

function get_sidebar_forstationaries()
{
    global $db;
    $get_product=  "select * from product_categories LIMIT 18,6";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_cat_id = $row_product['p_cat_id'];
        $pro_cat_title = $row_product['p_cat_title'];

        echo "<a href='stationaries.php?pro_cat_id=$pro_cat_id'>$pro_cat_title</a>";


    }


}

function get_sidebar_gender_forstationaries()
{
    global $db;
    $get_product=  "select * from categories";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $cat_id = $row_product['cat_id'];
        $cat_title = $row_product['cat_title'];

        echo "<a href='food.php?cat_id=$cat_id'>$cat_title</a>";


    }


}


function get_sidebar_forgifts()
{
    global $db;
    $get_product=  "select * from product_categories LIMIT 24,6";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_cat_id = $row_product['p_cat_id'];
        $pro_cat_title = $row_product['p_cat_title'];

        echo "<a href='gifts.php?pro_cat_id=$pro_cat_id'>$pro_cat_title</a>";


    }


}

function get_sidebar_gender_forgifts()
{
    global $db;
    $get_product=  "select * from categories";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $cat_id = $row_product['cat_id'];
        $cat_title = $row_product['cat_title'];

        echo "<a href='gifts.php?cat_id=$cat_id'>$cat_title</a>";


    }


}

function get_sidebar_forfood()
{
    global $db;
    $get_product=  "select * from product_categories LIMIT 30,6";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_cat_id = $row_product['p_cat_id'];
        $pro_cat_title = $row_product['p_cat_title'];

        echo "<a href='food.php?pro_cat_id=$pro_cat_id'>$pro_cat_title</a>";


    }


}

function get_sidebar_gender_forfood()
{
    global $db;
    $get_product=  "select * from categories";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $cat_id = $row_product['cat_id'];
        $cat_title = $row_product['cat_title'];

        echo "<a href='food.php?cat_id=$cat_id'>$cat_title</a>";


    }


}
//Side bar ends


//product category based utilization

function get_product_forbooks(){

    global $db;

    if(isset($_GET['pro_cat_id'])){

        $pro_cat_id = $_GET['pro_cat_id'];
        

    }

    $get_product=  "select * from products where p_cat_id= '$pro_cat_id'";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}

function get_product_forbooks_bygender(){

    global $db;

    if(isset($_GET['cat_id'])){

        $cat_id = $_GET['cat_id'];
        

    }

    $get_product=  "select * from products where cat_id= '$cat_id' and main_cat_id = 2";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}

function get_product_forelectronics(){

    global $db;

    if(isset($_GET['pro_cat_id'])){

        $pro_cat_id = $_GET['pro_cat_id'];
        

    }

    $get_product=  "select * from products where p_cat_id= '$pro_cat_id'";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}

function get_product_forelectronics_bygender(){

    global $db;

    if(isset($_GET['cat_id'])){

        $cat_id = $_GET['cat_id'];
        

    }

    $get_product=  "select * from products where cat_id= '$cat_id' and main_cat_id = 2";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}


function get_product_forwearables(){

    global $db;

    if(isset($_GET['pro_cat_id'])){

        $pro_cat_id = $_GET['pro_cat_id'];
        

    }

    $get_product=  "select * from products where p_cat_id= '$pro_cat_id'";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}

function get_product_forwearables_bygender(){

    global $db;

    if(isset($_GET['cat_id'])){

        $cat_id = $_GET['cat_id'];
        

    }

    $get_product=  "select * from products where cat_id= '$cat_id' and main_cat_id = 3";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}


function get_product_forstationaries(){

    global $db;

    if(isset($_GET['pro_cat_id'])){

        $pro_cat_id = $_GET['pro_cat_id'];
        

    }

    $get_product=  "select * from products where p_cat_id= '$pro_cat_id'";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}

function get_product_foratationaries_bygender(){

    global $db;

    if(isset($_GET['cat_id'])){

        $cat_id = $_GET['cat_id'];
        

    }

    $get_product=  "select * from products where cat_id= '$cat_id' and main_cat_id = 4";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}


function get_product_forgifts(){

    global $db;

    if(isset($_GET['pro_cat_id'])){

        $pro_cat_id = $_GET['pro_cat_id'];
        

    }

    $get_product=  "select * from products where p_cat_id= '$pro_cat_id'";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}

function get_product_forgifts_bygender(){

    global $db;

    if(isset($_GET['cat_id'])){

        $cat_id = $_GET['cat_id'];
        

    }

    $get_product=  "select * from products where cat_id= '$cat_id' and main_cat_id = 5";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}


function get_product_forfood(){

    global $db;

    if(isset($_GET['pro_cat_id'])){

        $pro_cat_id = $_GET['pro_cat_id'];
        

    }

    $get_product=  "select * from products where p_cat_id= '$pro_cat_id'";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}

function get_product_forfood_bygender(){

    global $db;

    if(isset($_GET['cat_id'])){

        $cat_id = $_GET['cat_id'];
        

    }

    $get_product=  "select * from products where cat_id= '$cat_id' and main_cat_id = 6";
    $run_products= mysqli_query($db,$get_product);

    while ($row_product=mysqli_fetch_array($run_products)) {
        $pro_id = $row_product['product_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_img = $row_product['product_img'];
        $pro_desc = $row_product['product_desc'];

        echo "<div class='col-md-4'>
        <div class='card w-100' style='width: 18rem;'>
            <a href='details.php?pro_id=$pro_id'>
                <img class='card-img-top' src='products/$pro_img' alt='Card image cap'>
            </a>
            <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <h6>Price : BDT $pro_price</h6>
                <a href='details.php?pro_id=$pro_id' class='btn btn-primary col-md-'>Add to cart</a>
                <a href='details.php?pro_id=$pro_id' class='btn btn-outline-secondary col-md-5'>Details</a>
            </div>
        </div>
    </div>";


    }


}




function item(){

    global $db;
    $ip_add = getUserIP();
    $get_items=  "select * from cart where ip_add = '$ip_add'";
    $run_items= mysqli_query($db,$get_items);

    $count = mysqli_num_rows($run_items);
    echo "$count";


}

function calculate_price(){

    global $db;
    $ip_add = getUserIP();
    $get_cart=  "select * from cart where ip_add = '$ip_add'";
    $run_cart= mysqli_query($db,$get_cart);

    while ($record=mysqli_fetch_array($run_cart)) {
       
        $pro_id = $record['p_id'];
        $quantity = $record['qty'];

        $get_price = "select * from products where product_id='$pro_id'";

        $run_price = mysqli_query($db, $get_price);

        while($row = mysqli_fetch_array($run_price)){

            $sub_total = $row['product_price']*$quantity;
            $total +=$sub_total;

        }

        


    }


}

function cust_registration(){
    global $db;

    if(isset($_POST['submit'])){

        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_password = $_POST['c_password'];
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_contact = $_POST['c_contact'];
        $c_address = $_POST['c_address'];
        $c_image = $_FILES['c_image']['name'];
        $c_tmp_image = $_FILES['c_image']['tmp_name'];
        $c_ip = getUserIP();

        move_uploaded_file($c_tmp_image, "customer_images/$c_image");

        $insert_cust = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip)
        values('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";

        $run_cust = mysqli_query($db,$insert_cust);

        $sel_cart = "select *from cart where ip_add='$c_ip'";
        $run_cart = mysqli_query($db,$sel_cart);
        $check_cart = mysqli_num_rows($run_cart);

        if($check_cart>0){

            $_SESSION['customer_email']=$c_email;
            echo "<script>alert('You have been registered successfully')</script>";
            echo "<script>window.open('cart.php','_self')</script>";

        }
        else
        {
            $_SESSION['customer_email']=$c_email;
            echo "<script>alert('You have been registered successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }

    }

}

function cust_login(){

    global $db;

    if(isset($_POST['login'])){

        $cust_email = $_POST['c_email'];
        $cust_pass = $_POST['c_pass'];

        $sel_cust = "Select *from customers where customer_email = '$cust_email' AND customer_pass='$cust_pass'";
        $run_cust = mysqli_query($db, $sel_cust);
        $check_customer = mysqli_num_rows($run_cust);

        if($check_customer==0){

            echo "<script> alert('Wrong email or password')</script>";
            echo "<script>window.open('login.php',_self')</script>";

        }
        else
        {
            $_SESSION['customer_email']=$cust_email;
            echo "<script> alert('You have been logged in')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }

    }

}


?>