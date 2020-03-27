<?php session_start(); ?>
<?php
if (!isset($_SESSION["username"])) {
    header('Location: login.php');
}
?>

<html lang="en">
<body>


<?php
include 'config.php';

if (!isset($_SESSION["username"])) {
    echo "could not insert message, please log in first, go to http://localhost/php-learn/login.php";
    die();
}

?>

Welcome <?php echo $_SESSION["username"]; ?><br>
Your message is: <?php echo $_POST["message"]; ?>
<br>

<?php
$name = $_SESSION["username"];
$message = $_POST["message"];

// Create connection
$conn = new mysqli($servername, $username, $password);

$stmt = $conn->prepare("INSERT INTO twitter.messages (username, message) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $message);

if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
} else {
    echo "NOPE";
}

?>


</body>