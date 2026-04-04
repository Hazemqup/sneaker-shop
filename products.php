<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "pdo.php";

// Get all sneakers
$sql = "SELECT * FROM sneakers";
$stmt = $pdo->query($sql);
$sneakers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en-GB">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <title>Products</title>
    </head>
    <body>
        <?php include_once 'navigation.php'; ?>

        <h1>Sneakers</h1>

        <?php
        if (count($sneakers) === 0) {
            echo "<p>No sneakers found.</p>";
        } else {
            foreach ($sneakers as $s) {
                echo "<div class='product'>";
                echo "<h2>" . htmlentities($s['name']) . "</h2>";
                echo "<p><strong>Brand:</strong> " . htmlentities($s['brand']) . "</p>";
                echo "<p><strong>Price:</strong> £" . htmlentities($s['price']) . "</p>";
                echo "<p><strong>Description:</strong> " . htmlentities($s['description']) . "</p>";
                echo "<img src='images/" . htmlentities($s['image']) . "' width='150'>";
                echo "</div>";
            }
        }
        ?>

        <p><a href="index.php">Back to Home</a></p>

    </body>
</html>