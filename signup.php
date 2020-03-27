<?php session_start(); ?>
<?php
if (isset($_SESSION['username'])) {
    echo "already connected!";
    die();
}
?>

<html lang="en">
<head>
    <title>signup</title>
</head>
<body>
<form action="do_signup.php" method="post">
    <label for="username">user:</label><br>
    <input type="text" id="username" name="username"><br>
    <label for="password">password:</label><br>
    <input type="password" id="password" name="password"><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>
<?php
?>

