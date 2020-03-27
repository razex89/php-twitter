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

$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $sql_data = $result->fetch_assoc();
    if (password_verify($twitter_password, $sql_data['password']))
    $_SESSION["username"] = $twitter_username;
    echo "success!";
}
else {
    echo "user or password incorrect";
}
?>
</body>
</html>

