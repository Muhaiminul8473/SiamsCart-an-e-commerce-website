<?php
session_start();
include("includes/db.php");
include("includes/functions.php");
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
                    <div onclick="location.href='wearables.php'" style="color: blue;">Wearable</div>
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

    <div class="content col-md-10">

        <div class="sidebar col-md-3">
            <div class="sidebar-name">
                product categories
            </div>
            <div class="sidebar-body">
                <?php
                   get_sidebar_forwearables();
                ?>
            </div>
            <div class="sidebar-name">
                Categories
            </div>
            <div class="sidebar-body">
                <?php
                    get_sidebar_gender_forwearables();
                ?>

            </div>
        </div>

        <div class="prod col-md-11" style="display: flex; flex-direction: column;">
            <div class="show-products">
                <div class="container-fluid">
                    <div class="row">
                    <?php

                        if(isset($_GET['pro_cat_id'])){
                            get_product_forwearables();

                        }

                        else if(isset($_GET['cat_id'])){
                            get_product_forwearables_bygender();

                        }


                        else
                        {
                            getmaincatforwearables();
                        }


                     ?>
                    </div>

                </div>
            </div>

            
        </div>

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