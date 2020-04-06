<?php

// Start session
session_start();

require_once('./php/database.php');
require_once('./php/product.php');

// Create instance of Database class
$database = new Database($dbName = "mrinDB", $tableName = "products");

// When 'Add to cart' button is clicked
if (isset($_POST['add'])) {
    /// print_r($_POST['product_id']);
    if (isset($_SESSION['cart'])) {
        // Returns the values from product_id column
        $cart = array_column($_SESSION['cart'], "product_id");

        // If selected product already exists in the array
        if (in_array($_POST['product_id'], $cart)) {
            echo "<script>alert('Product already added')</script>";
            echo "<script>window.location = 'index.php'</script>"; // window.location - current document URL being displayed in that window
        } else {
            $productCount = count($_SESSION['cart']); // count() - counts all elements in array
            $products = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$productCount] = $products;
            print_r($_SESSION['cart']);
        }
    } else {
        $products = array(
            'product_id' => $_POST['product_id']
        );

        // New session variable
        $_SESSION['cart'][0] = $products;
        print_r($_SESSION['cart']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <!-- Font-awesome CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- CSS file -->
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>

    <div class="container">
        <div class="product row">
            <?php
            $product = $database->getDataFromDatabase();
            while ($row = $product->fetch_assoc()) {
                displayProduct($row['image_url'], $row['title'], $row['information'], $row['original_price'], $row['discount_price'], $row['id']);
            }
            ?>
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