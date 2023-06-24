<?php
include 'connect.php';
$conn->select_db("nusantara");

$filename = "../entity/collections.json";

$data = file_get_contents($filename);

$array = json_decode($data, true);

foreach ($array["semuaCollection"] as $row) {
    $sql = "INSERT INTO koleksi (nama, kategori, descript, date, gambar) VALUES ('".$row["nama"]."', '".$row["kategori"]."','".$row["desc"]."','".$row["date"]."' ,'".$row["gambar"]."')";
    mysqli_query($conn, $sql);
}

if (mysqli_affected_rows($conn) > 0) {
    echo "Data from collections.json inserted successfully";
} else {
    echo "Error inserting data from collections.json: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
