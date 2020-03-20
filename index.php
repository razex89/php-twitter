<?php session_start(); ?>
<?php
if (!isset($_SESSION["username"])) {
    header('Location: login.php');
}
?>

    <html lang="en">
<head>
    <title>raz-twitter</title>
</head>
<body>
<div id="baseDiv">
    <div>
        <?php
        if (isset($_SESSION["username"])) {
        echo sprintf("<p>hello, <br> your username : <strong>%s</strong> </p><br><br>", $_SESSION["username"]);
        }
        ?>
    </div>
    <div>
        <form action="/php-learn/submit_message.php" method="post">
            <label for="message">text:</label><br>
            <input type="text" id="message" name="message">
            <input type="submit" value="Submit">
        </form>
    </div>
    <div>
        <h3>texts</h3>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";

        // Create connection
        $conn = new mysqli($servername, $username, $password);
        $data = $conn->query("select * from twitter.messages");

        if ($data->num_rows > 0) {
            // output data of each row
            while($row = $data->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["username"]. ", Message:" . $row["message"]. "<br>";
            }
        } else {
            echo "0 results";
        }

        ?>
    </div>
</div>
</body>
</html>

<?php

?>