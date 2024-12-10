<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Navbar</title>
    <style>
        /* CSS for the navigation bar */
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(232, 246, 252);
        }
        .navbar {
            background-color: rgb(232, 246, 252);
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: rgb(153, 150, 150);
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .navbar .right {
            float: right;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>

    <!-- Bagian Dinamis Menggunakan PHP -->
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
        <a href="profile.php" class="right">Profile</a>
        <a href="logout.php" class="right">Logout</a>
    <?php else: ?>
        <a href="login.php" class="right">Login</a>
        <a href="register.php" class="right">Register</a>
    <?php endif; ?>
</div>

<!-- Content halaman di sini -->
<div>
    <h1>Welcome to Our Website!</h1>
    <p>This is the home page content.</p>
</div>

</body>
</html>