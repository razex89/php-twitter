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
$servername = "localhost";
$username = "root";
$password = "";

$twitter_username = $_POST["username"];
$twitter_password = $_POST["password"];

$conn = new mysqli($servername, $username, $password);
$data = $conn->query(sprintf("select * from twitter.users where username='%s' and password='%s' LIMIT 1", $twitter_username, $twitter_password));

if ($data->num_rows == 1) {
    $_SESSION["username"] = $twitter_username;
    echo "success!";
}
else {
    echo "user or password incorrect";
}
?>
</body>
</html>

