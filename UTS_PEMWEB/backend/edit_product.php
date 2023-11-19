<?php
require './../config/db.php';

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Fetch the product details based on the provided ID
    $query = "SELECT * FROM products WHERE id = $productId";
    $result = mysqli_query($db_connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);

        // Use $product array to populate the edit form
    } else {
        // Handle the case where the product with the provided ID is not found
        echo "Product not found.";
    }
} else {
    // Handle the case where no ID is provided in the URL
    echo "Invalid request.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>

<body>
    <h1>Edit Product</h1>

    <form action="update_product.php" method="post">
        <input type="hidden" name="id" value="<?= $product['id']; ?>">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" value="<?= $product['name']; ?>" required><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="<?= $product['price']; ?>" required><br>

        <!-- Add other input fields for additional product details -->

        <input type="submit" value="Update Product">
    </form>
</body>

</html>