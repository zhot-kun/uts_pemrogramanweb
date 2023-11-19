<?php

require './../config/db.php';

if (isset($_POST['submit'])) {
    global $db_connect;

    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];

    $randomFilename = time() . '-' . md5(rand()) . '-' . $image;

    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . $randomFilename;

    $upload = move_uploaded_file($tempImage, $uploadPath);

    if ($upload) {
        mysqli_query($db_connect, "INSERT INTO products (name,price,image)
                    VALUES ('$name','$price','/upload/$randomFilename')");
        echo "berhasil upload";
    } else {
        echo "gagal upload";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Produk</h1>
    <a href="view_product.php">Lihat data produk</a>
    <form action="create.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="input nama produk">
        <input type="number" name="price" placeholder="input harga produk">
        <input type="file" name="image" >
        <input type="submit" value="simpan" name="submit">
    </form>
</body>
</html>