<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once "pdo.php";

$error = "";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $sql = "SELECT user_id, name, email, password FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $_POST['email']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($_POST['password'], $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['user'] = $user['user_id'];
        $_SESSION['name'] = $user['name'];
        header("Location: member.php");
        exit();
    } else {
        $error = "Incorrect email or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en-GB">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <title>Login</title>
    </head>
    <body>
        <?php include_once 'navigation.php'; ?>
        <h1>Login</h1>

        <?php
        if ($error !== "") {
            echo "<p style='color:red;'>" . htmlentities($error) . "</p>";
        }
        ?>

        <form method="post">
            <p>Email: <input type="email" name="email" required></p>
            <p>Password: <input type="password" name="password" required></p>
            <p><input type="submit" value="Login"></p>
        </form>
    </body>
</html>