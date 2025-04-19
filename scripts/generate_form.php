<?php

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['table_name']) && isset($_GET['type_attributes'])) {
    $table_name = $_GET['table_name'];
    $type_attribute = $_GET['type_attributes'];
    $parts = explode('~', $type_attribute);
    $type = $parts[0];
    $attribute = $parts[1];

    echo '<h1>Search Form</h1>';
    echo '<form method="get" action="search_results.php">';
    echo '  <input type="hidden" name="table_name" " value="' . $table_name . '">';
    echo '  <label for="' . $attribute . '">' . $attribute . ':</label><br>';
    if ($type != 'select') {
        echo '  <input type="'. $type .'" id="' . $attribute . '" name="' . $attribute . '" required><br><br>';
    }
    else {
        echo '  <select id="' . $attribute . '" name="' . $attribute . '" required>';
        echo '      <option value="private">Private</option>';
        echo '      <option value="public">Public</option>';
        echo '  </select><br><br>';
    }
    echo '  <button type="submit">Search</button>';
    echo '</form>';
} else {
    echo "Invalid parameters.";
}
?>
