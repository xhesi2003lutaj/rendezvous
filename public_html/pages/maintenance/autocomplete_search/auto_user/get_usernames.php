<?php
// get_usernames.php

include '../../../../scripts/db_connect.php';
// include 'db_connection.php';

$sql = "SELECT DISTINCT username FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $usernames = array();
    while ($row = $result->fetch_assoc()) {
        $usernames[] = $row['username'];
    }

    echo json_encode($usernames);
} else {
    echo json_encode([]);
}

$conn->close();
?>
