<?php
include 'db_connect.php';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table_name = $_POST["table_name"]; // Add a dropdown or input in your form to select the table name

    // Define a mapping of tables to columns
    $table_columns = [
        "users" => ["username", "password"],
        "clubs" => ["club_size", "club_name", "club_desc"],
        "club_participants" => ["join_date", "user_id", "club_id"],
        "club_leaders" => ["user_id", "club_id"],
        "club_moderators" => ["user_id", "club_id"],
        "club_members" => ["user_id", "club_id"],
        "events" => ["event_size", "event_name", "event_desc", "event_privacy", "event_time"],
        "club_events" => ["event_id", "club_id"],
        "personal_events" => ["user_id", "event_id"],
        "event_participants" => ["user_id", "event_id"],
        "event_hosts" => ["user_id", "event_id"],
        "event_attendees" => ["user_id", "club_id"],
    ];

    // Validate the table name to prevent potential security issues
    if (!array_key_exists($table_name, $table_columns)) {
        die("Invalid table name");
    }

    // Get column names for the selected table
    $columns = $table_columns[$table_name];

    // Prepare placeholders for the query
    $placeholders = implode(", ", array_fill(0, count($columns), "?"));

    // Build the SQL query dynamically
    $sql = "INSERT INTO $table_name (" . implode(", ", $columns) . ") VALUES ($placeholders)";

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($sql);

    // Check if the prepare() succeeded
    if (!$stmt) {
        die("Error: " . $conn->error);
    }

    /// Bind parameters dynamically
    $bindParams = array("");
    foreach ($columns as $col) {
        $bindParams[0] .= "s";
        $bindParams[] = &$_POST[$col];
    }
    call_user_func_array(array($stmt, 'bind_param'), $bindParams);


    // Execute the statement
    if ($stmt->execute()) {
        echo "Data added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
