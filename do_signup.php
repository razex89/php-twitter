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
include 'config.php';

$twitter_username = $_POST["username"];
$twitter_password = $_POST["password"];

$conn = new mysqli($servername, $username, $password);
$stmt = $conn->prepare("select password from twitter.users where username=? LIMIT 1");
$stmt->bind_param("s", $twitter_username);

$stmt->execute();

if ($stmt->get_result()->num_rows == 1) {
    echo "user already exists";
    die;
}

$conn = new mysqli($servername, $username, $password);
$stmt = $conn->prepare("INSERT INTO twitter.users (username, password) VALUES (?, ?)");
$password_hash = password_hash($twitter_password, PASSWORD_DEFAULT);
$stmt->bind_param("ss", $twitter_username, $password_hash);

if ($stmt->execute() === TRUE) {
    echo "password created successfully.";
} else {
    echo "NOPE";
}


?>
</body>
</html>

