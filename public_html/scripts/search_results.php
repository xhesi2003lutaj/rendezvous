<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['table_name'])) {
    $get_keys = array_keys($_GET);
    $get_values = array_values($_GET);
    $table_name = $get_values[0];
    $attribute_name = $get_keys[1];
    $attribute_value = $get_values[1];

    $sql = "SELECT * FROM $table_name WHERE $attribute_name = ?";
    $stmt = $conn->prepare($sql);

    $param_type = "s";
    if (is_numeric($attribute_value)) {
        // if the attribute is numeric, bind it as an integer
        $param_type = "i";
    }

    // Bind the parameter
    $stmt->bind_param($param_type, $attribute_value);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch data from the result set
    if ($result->num_rows > 0) {
        echo "<h1> Results: </h1>";
        if ($table_name != 'club_participants') {
            while ($row = $result->fetch_assoc()) {
                $table_name_singular = substr_replace($table_name, "", -1);
                $id = $row[$table_name_singular . '_id'];
                $href = "result_details.php?table_name=$table_name&id=$id";
                echo "<a class=\"result\" href=\"$href\">$row[$attribute_name]</a><br>";
            }
        }
        else {
            while ($row = $result->fetch_assoc()) {
                $user_id = $row['user_id'];
                $club_id = $row['club_id'];
                $href = "result_details.php?table_name=$table_name&user_id=$user_id&club_id=$club_id";
                echo "<a class=\"result\" href=\"$href\">$row[$attribute_name]</a><br>";
            }
        }
    } else {
        echo "No results found for the given search criteria.";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
