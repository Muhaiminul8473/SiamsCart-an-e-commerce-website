<?php
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
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
</head>

<body>

    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <button type="button" class="btn btn-outline-primary" id="login" name="login">Login</button>

                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-outline-success" id="signup" name="signup">Sign Up</button>
                    </li>
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
                <button type="button" class=" col-md-6 btn btn-info"><img src="shopping-cart.png" alt=""> Cart</button>
            </div>



        </div>

        <div id="separator"></div>

    </div>

    <div class="confirm" style="margin-top: 20px;">
        
        <div class="confirmform col-md-7" style="margin-left: 250px; border: 2px solid rgb(207, 207, 255); box-shadow: 10px 10px 10px rgb(179, 179, 255);">
            <div style="margin-left: 250px; font-size: 30px;">Confirm order :</div>
            <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone number</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Recieving point</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product price</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Did you read our privacy policy?</label>
                </div>
                <button type="submit" class="btn btn-primary col-md-12">Confirm</button>
              </form>
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