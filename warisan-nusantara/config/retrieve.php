<?php

$host = '';
$username = "root";
$password = '';
$dbname = "nusantara";

//create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch collection data in koleksi table from nusantara db
$sql = "SELECT * FROM koleksi";
$result = $conn->query($sql);

$semuaCollection = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $koleksi = array(
      "gambar" => $row["gambar"],
      "nama" => $row["nama"],
      "kategori" => $row["kategori"],
      "date" => $row["date"],
      "desc" => $row["descript"]
    );
    $semuaCollection[] = $koleksi;
  }
}

// Close the database connection
$conn->close();

// Prepare the response data
$responseData = array(
  "semuaCollection" => $semuaCollection
);

// Send the JSON response
header("Content-type: application/json");
echo json_encode($responseData);
?>