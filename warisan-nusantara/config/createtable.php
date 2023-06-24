<?php

include 'connect.php';

//choose database
$conn->select_db("nusantara");

//create table
$sql = "CREATE TABLE IF NOT EXISTS koleksi (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(30) NOT NULL,
    kategori VARCHAR(30) NOT NULL,
    descript VARCHAR(1000) NOT NULL,
    date VARCHAR(1000) NOT NULL,
    gambar LONGBLOB
)";

if($conn->query($sql) === TRUE){
   
} else {
    echo "Error creating table: " . $conn->error;
}

?>