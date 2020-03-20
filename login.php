<?php session_start(); ?>

<html lang="en">
<head>
    <title>login page</title>
</head>
<body>
<?php
    if (isset($_SESSION['username'])) {
        echo "already connected!";
        die();
    }
?>
<form action="do_login.php" method="post">
    <div class="container">
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Login</button>
    </div>
</body>
</html>
