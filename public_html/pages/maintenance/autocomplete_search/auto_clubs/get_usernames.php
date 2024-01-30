<?php
// get_usernames.php

include '../../../../scripts/db_connect.php';

$sql = "SELECT DISTINCT club_name from clubs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $usernames = array();
    while ($row = $result->fetch_assoc()) {
        $usernames[] = $row['club_name'];
    }

    echo json_encode($usernames);
} else {
    echo json_encode([]);
}

$conn->close();
?>
