<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


require_once "pdo.php";

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {

    // Hash the password
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) 
            VALUES (:name, :email, :password)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $hashed_password
    ));

    echo "User added successfully!";
}
?>

<!DOCTYPE html>
<html lang="en-GB">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <title>Create User</title>
    </head>
    <body>
        <?php include_once 'navigation.php'; ?>

        <h1>Create User</h1>

        <form method="post">
            <p>Name:
                <input type="text" name="name" required>
            </p>
            <p>Email:
                <input type="email" name="email" required>
            </p>
            <p>Password:
                <input type="password" name="password" required>
            </p>
            <p><input type="submit" value="Create User"></p>
        </form>

    </body>
</html>