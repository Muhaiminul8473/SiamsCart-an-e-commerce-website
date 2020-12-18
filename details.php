<?php
session_start();
include("includes/db.php");
include("includes/functions.php");
?>
<?php
    if(isset($_GET['pro_id'])){
        $pro_id = $_GET['pro_id'];


        $get_product = "select * from products where product_id = '$pro_id'";
        $run_product = mysqli_query($con, $get_product);
        $row_product = mysqli_fetch_array($run_product);

        $p_img = $row_product['product_img'];
        $p_title = $row_product['product_title'];
        $p_price = $row_product['product_price'];
        $p_desc = $row_product['product_desc'];
        $p_cat_id = $row_product['p_cat_id'];

        $get_p_cat = "select * from product_categories where p_cat_id = '$p_cat_id'";
        $run_p_cat = mysqli_query($con, $get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);

        $p_cat_title = $row_p_cat['p_cat_title'];

        

    }


?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello siam</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="showproducts.css">
    <link rel="stylesheet" href="details1.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
</head>

<body>


    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul id="n" class="navbar-nav mr-auto">
                <?php
                        if(!isset($_SESSION['customer_email'])){

                            echo "<li class='nav-item active'>
                            <a href='login.php'><button type='button' class='btn btn-outline-primary' id='login' name='login'>Login</button></a></li>";
    
                            echo "<li class='nav-item'>
                            <a href='customer_registration.php'><button type='button' class='btn btn-outline-success' id='signup' name='signup'>Sign Up</button></a></li>";

                        }

                        else
                        {
                            echo "<div class='profile'><img src='profile-user.png' alt=''></div>";
                            echo $_SESSION['customer_email'];
                            echo " <a href='login.php'  id='logout'><img src='logout (1).png' alt=''></a>";

                        }

                    ?>
                    <div id="trust">Trusted online shopping site in Bangladesh</div>

                </ul>

                <div id="contact-no"><img src="contact.png" alt="">+8801644769093</div>

                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <div class="menubar">

            <div class="menuleft col-md-3">
                <a href="index.php"><img src="logo-new.jpg" alt="" id="logo"></a>
                <a class="navbar-brand" href="index.php" id="siamscart" name="siamscart">SiamsCart</a>
            </div>

            <div class="menumiddle col-md-6">
                <div class="banner">
                    <marquee behavior="scroll" direction="left">Buy products online at best prices</marquee>
                </div>
                <div class="items">
                    <div onclick="location.href='books.php'">Books</div>
                    <div onclick="location.href='electronics.php'">Electronics</div>
                    <div onclick="location.href='wearables.php'">Wearable</div>
                    <div onclick="location.href='stationaries.php'">Stationary</div>
                    <div onclick="location.href='gifts.php'">Gifts</div>
                    <div onclick="location.href='food.php'">Food</div>
                </div>

            </div>

            <div class="menuright col-md-3">
                <a href="cart.php"> <button type="button" class=" col-md-6 btn btn-info"><img src="shopping-cart.png" alt=""><?php item(); ?> items</button></a>
            </div>

        </div>

        <div id="separator"></div>



    </div>
  

    <?php
    addCart();
    ?>

    <div class="detailed-product col-md-10">
        
            <div class="view-product col-md-6">
                <img src="products/<?php echo $p_img?>" alt="">
            </div>
            
            <form action="details.php?add_cart=<?php echo $pro_id?>" method="post" class="col-md-6">
                <div class="order-control col-md-12">
                    <h2><?php echo $p_title?></h2>
    
                    <div id="separator"></div>
    
                    <div class="form-group">
                        <label class="col-md-4">Product Quantity</label>
                        <div class="col-md-6">
                            <select name="product_qty" id="product_qty" class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
    
                            </select>
                        </div>
                    </div>
                    <div class="price" style="text-align: center;">
                        <div id="prc" style="font-size: x-large;">Unit price: BDT<?php echo $p_price?></div>
                    </div>
                    <div style="text-align: center; margin: 10px;">
                        <button type="submit" class="btn btn-danger">Add to cart</button>
                    </div>
                </div>
            </form>

    </div>
    



    <div id="separator"></div>

    <div class="product-specification">
        <h4>Product Specification</h4>
        <table border=0 height="150" width="90%">
            <tr>
                <td class="heading">Product name</td>
                <td class="desc"><?php echo $p_title?></td>
            </tr>
            <tr>
                <td class="heading">Description</td>
                <td class="desc"><?php echo $p_desc?></td>
            </tr>
            <tr>
                <td class="heading">Category</td>
                <td class="desc"><?php echo $p_cat_title?></td>
            </tr>

        </table>
    </div>



    <?php
        include("includes/footer.php");
    ?>
    
    





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>

</body>

</html>