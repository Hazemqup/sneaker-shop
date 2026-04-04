<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "pdo.php";

$results = [];
$query = "";

if (isset($_GET['q'])) {
    $query = trim($_GET['q']);

    if ($query !== "") {
        $sql = "SELECT * FROM sneakers
                WHERE name LIKE :search
                   OR brand LIKE :search
                   OR description LIKE :search";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':search' => '%' . $query . '%'
        ]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Search Sneakers</title>
</head>
<body>

    <?php include_once 'navigation.php'; ?>

<h1>Search Sneakers</h1>

<form method="get">
    <p>
        <label for="q">Search term:</label>
        <input type="text" id="q" name="q" value="<?php echo htmlentities($query); ?>">
    </p>
    <p><input type="submit" value="Search"></p>
</form>

<?php
if ($query !== "") {
    if (count($results) === 0) {
        echo "<p>No sneakers found.</p>";
    } else {
        foreach ($results as $s) {
            echo "<div style='margin-bottom:20px;'>";
            echo "<h2>" . htmlentities($s['name']) . "</h2>";
            echo "<p><strong>Brand:</strong> " . htmlentities($s['brand']) . "</p>";
            echo "<p><strong>Price:</strong> £" . htmlentities($s['price']) . "</p>";
            echo "<p><strong>Description:</strong> " . htmlentities($s['description']) . "</p>";
            echo "</div>";
        }
    }
}
?>

</body>
</html>