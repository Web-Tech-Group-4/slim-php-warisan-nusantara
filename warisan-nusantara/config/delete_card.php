<?php

$host = '';
$username = "root";
$password = '';
$dbname = "nusantara";

//create connection
$conn = new mysqli($host, $username, $password, $dbname);

//check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
// Retrieve the ID value from the AJAX request
$id = $_POST['id'];

// Prepare and execute the delete query
$sql = "DELETE FROM koleksi WHERE nama = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $id);
$stmt->execute();

// Check if the deletion was successful
if ($stmt->affected_rows > 0) {
  echo 'Record deleted successfully';
} else {
  echo 'Error deleting record';
}

// Close the database connection
$stmt->close();
$conn->close();

?>