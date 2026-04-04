<nav>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="about.php">About</a> |
    <a href="contact.php">Contact</a> |
    <a href="faq.php">FAQ</a> |

    <?php if (isset($_SESSION['user'])): ?>
        <a href="member.php">Member Home</a> |
        <a href="add_sneaker.php">Add Sneaker</a> |
        <a href="logout.php">Logout</a> |
    <?php else: ?>
        <a href="login.php">Login</a> |
    <?php endif; ?>

    <a href="search.php">Search</a>
</nav>
<hr>