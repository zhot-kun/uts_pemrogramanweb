<?php
require './../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['id'];
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];

    $updateQuery = "UPDATE products SET name = '$productName', price = '$productPrice' WHERE id = $productId";
    $result = mysqli_query($db_connect, $updateQuery);

    if ($result) {
        header("Location: view_product.php?id=$productId");
        exit();
    } else {
        echo "Update failed.";
    }
}
