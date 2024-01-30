<?php
include 'db_connect.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['table_name'])) {
    $table_name = $_GET['table_name'];

    if ($table_name != 'club_participants') {
        $id = $_GET['id'];
        $table_name_singular = substr_replace($table_name, "", -1);
    
        $sql = 'SELECT * FROM '. $table_name . ' WHERE ' . $table_name_singular .'_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    } else {
        $user_id = $_GET['user_id'];
        $club_id = $_GET['club_id'];

        $sql = "SELECT * FROM $table_name WHERE user_id=? AND club_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $club_id);
        $stmt->execute();
    } 
    
    $result = $stmt->get_result(); // Fetch the result

    $row = $result->fetch_assoc(); // Fetch the data into $row variable

    echo "<h1> Details: </h1>";
    if ($row) {
        foreach ($row as $key => $value) {
            echo $key . ": " . $value . "<br>"; // ucfirst() capitalizes the first letter of the column name
        }
    } else {
        echo "No record found";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
