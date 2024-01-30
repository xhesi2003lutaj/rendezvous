<?php
// get_usernames.php

include '../../../../scripts/db_connect.php';

$sql = "SELECT DISTINCT user_id FROM club_participants";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $usernames = array();
    while ($row = $result->fetch_assoc()) {
        $usernames[] = $row['user_id'];
    }

    echo json_encode($usernames);
} else {
    echo json_encode([]);
}

$conn->close();
?>
