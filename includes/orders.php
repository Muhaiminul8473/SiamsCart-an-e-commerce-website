
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
    
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="showproducts.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="cart1.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
</head>

<body>

    <div class="table-responsive" style="margin-top: 30px;">
        <table class="table" >
            <h3 style="margin-left: 400px;">Orders by customers</h3>
            <thead>
                <tr>
                    <th colspan="2">Product</th>
                    <th>Ordered by</th>
                    <th>Quantity</th>
                    <th>Invoice no</th>
                    <th>Order date</th>
                    <th>Unit price</th>

                    <th colspan="1">Sub-total</th>

                </tr>
            </thead>
            <tbody class="orders">

            <?php

            
                show_orders();

            ?>

            </tbody>
        </table>
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