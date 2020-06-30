<?php
// Start session
session_start();

require_once('./php/database.php');
require_once('./php/product.php');

// Create instance of Database class
$database = new Database($dbName = "mrinDB", $tableName = "products");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <!-- Font-awesome CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- CSS file -->
    <link rel="stylesheet" href="./eCommerceWebsite/css/styles.css">
</head>

<body>
    <?php require_once('./php/header.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h5>My Cart</h5>
                    <hr>

                    <?php
                    $total = 0;
                    if (isset($_SESSION['cart'])) {
                        // Get Id from session variable
                        $productId = array_column($_SESSION['cart'], "product_id");

                        $productData = $database->getdataFromDatabase();
                        while ($row = mysqli_fetch_assoc($productData)) {
                            // Display all products added to the cart
                            foreach ($productId as $id) {
                                if ($row['id'] == $id) {
                                    displayCartItem($row['image_url'], $row['title'], $row['information'], $row['discount_price']);
                                    $total += (int) $row['discount_price'];
                                }
                            }
                        }
                    } else {
                        echo "<h6>Basket is empty</h6>";
                    }
                    ?>

                </div>
            </div>
            <div class="col-md-5">
                <div>
                    <h5>Price Details</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $productCount = count($_SESSION['cart']);
                                echo "<h6>Price: $productCount items</h6>";
                            } else {
                                echo "<h6>Price: 0 items</h6>";
                            }
                            ?>
                            <h6>Delivery: </h6>
                            <hr>
                            <h6>Total amount: </h6>
                        </div>
                        <div class="col-md-6">
                            <h6>£<?php echo $total ?></h6>
                            <h6 class="text-success">Free</h6>
                            <hr>
                            <h6>£<?php echo $total ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>