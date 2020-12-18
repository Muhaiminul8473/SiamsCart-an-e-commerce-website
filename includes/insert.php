<?php
include("db.php");
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
    
    <title>Hello siam</title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
    
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="showproducts.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="cart1.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
</head>

<body>

    <div class="confirm" style="margin-top: 20px;">

        <div class="confirmform col-md-10"
            style="margin-left: 100px; border: 2px solid rgb(207, 207, 255); box-shadow: 10px 10px 10px rgb(179, 179, 255);">
            <div style="margin-left: 320px; font-size: 30px; margin-bottom: 20px;" >Insert products :</div>
            <form action="adminpanel.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1" style="width: 150px;">Main category</label>
                    <select name="main_cat" id="" style="width: 200px;">
                        <option>Select a Main category</option>

                        <?php

                        $get_main_cat = "select *from main_categories";
                        $run_main_cat = mysqli_query($con,$get_main_cat);
                        while ($row = mysqli_fetch_array($run_main_cat)) {
                            $main_id = $row['main_cat_id'];
                            $main_cat_title = $row['main_cat_title'];
                            echo "<option value= '$main_id'> $main_cat_title</option>";
                        }

                        ?>

                    </select>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" style="width: 150px;">Product category</label>
                    <select name="product_cat" id="" style="width: 200px;">
                        <option>Select a product category</option>
                        <?php

                            $get_p_cat = "select *from product_categories";
                            $run_p_cat = mysqli_query($con,$get_p_cat);
                            while ($row = mysqli_fetch_array($run_p_cat)) {
                                $id = $row['p_cat_id'];
                                $cat_title = $row['p_cat_title'];
                                echo "<option value= '$id'> $cat_title</option>";
                            }

                        ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" style="width: 150px;">Gender</label>
                    <select name="cat" id="" style="width: 200px;">
                        <option>Select a category</option>
                        <?php

                            $get_cat = "select *from categories";
                            $run_cat = mysqli_query($con,$get_cat);
                            while ($row = mysqli_fetch_array($run_cat)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                echo "<option value= '$cat_id'> $cat_title</option>";
                            }

                        ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product name</label>
                    <input name="product_title" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product image</label>
                    <input name="product_img" type="file" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input name="product_price" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="product_desc" id="" cols="19" rows="6"></textarea>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keyword</label>
                    <input name="product_keyword" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">

                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Did you read our privacy policy?</label>
                </div>
                <button type="submit" name="insert" class="btn btn-primary col-md-12">Insert</button>
            </form>
        </div>

    </div>



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