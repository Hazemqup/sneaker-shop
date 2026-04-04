<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once "pdo.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if (isset($_POST['name']) && isset($_POST['brand']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['image'])) {
    $sql = "INSERT INTO sneakers (name, brand, price, description, image)
            VALUES (:name, :brand, :price, :description, :image)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $_POST['name'],
        ':brand' => $_POST['brand'],
        ':price' => $_POST['price'],
        ':description' => $_POST['description'],
        ':image' => $_POST['image']
    ]);

    $message = "Sneaker added successfully!";
}
?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Add Sneaker</title>
</head>
<body>
    <?php include_once 'navigation.php'; ?>
    <h1>Add Sneaker</h1>

    <?php
    if ($message !== "") {
        echo "<p>" . htmlentities($message) . "</p>";
    }
    ?>

    <form method="post">
        <p>Name: <input type="text" name="name" required></p>
        <p>Brand: <input type="text" name="brand" required></p>
        <p>Price: <input type="number" step="0.01" name="price" required></p>
        <p>Description: <input type="text" name="description" required></p>
        <p>Image filename: <input type="text" name="image" required></p>
        <p><input type="submit" value="Add Sneaker"></p>
    </form>

    <p><a href="member.php">Back to Member Area</a></p>
</body>
</html>