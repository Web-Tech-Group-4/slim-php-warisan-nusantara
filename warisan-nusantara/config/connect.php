<?php

$host = '';
$username = "root";
$password = '';

//create connection
$conn = new mysqli($host, $username, $password);

//check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

?>