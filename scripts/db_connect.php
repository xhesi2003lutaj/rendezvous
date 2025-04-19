<?php
// db_connection.php
$servername = "localhost";
$db_username = "xlutaj";
$db_password = "0W83lT";
$dbname = "Group-19";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
