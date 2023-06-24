<?php

include 'connect.php';

$databaseName = 'nusantara';

// Check if the database already exists
$sql = "SHOW DATABASES LIKE '$databaseName'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
} else {
    // Create the database
    $sql = "CREATE DATABASE $databaseName";
    if ($conn->query($sql) === TRUE) {
        
    } else {
        echo "Error creating database: " . $conn->error;
    }
}

?>
