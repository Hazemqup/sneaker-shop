<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once "pdo.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT name FROM users WHERE user_id = :user";
$stmt = $pdo->prepare($sql);
$stmt->execute([':user' => $_SESSION['user']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$username = $user ? $user['name'] : 'Member';
?>
<!DOCTYPE html>
<html lang="en-GB">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <title>Members Area</title>
    </head>
    <body>
        <?php include_once 'navigation.php'; ?>
        <h1>Welcome <?php echo htmlentities($username); ?></h1>
        <p><a href="logout.php">Log Out</a></p>
        <p><a href="add_sneaker.php">Add New Sneaker</a></p>
    </body>
</html>