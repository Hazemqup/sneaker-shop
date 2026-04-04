<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <title>contact</title>
    </head>
    <body>
        <?php include_once 'navigation.php'; ?>
        <h1>Contact Us</h1>
        <form>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">

            <label for="email">Email:</label>
            <input type="email" id="email" email="email">

            <label>Message:</label>
            <textarea></textarea>

            <button type="submit">Send</button>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
