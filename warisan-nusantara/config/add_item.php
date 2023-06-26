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

// Get form data
$itemName = $_POST['item-name'];
$itemCategory = $_POST['item-category'];
$itemDate = $_POST['item-date'];
$itemDescription = $_POST['item-description'];

// Handle image upload
$imageName = $_FILES['item-image']['name'];
$imageTmpName = $_FILES['item-image']['tmp_name'];
$imageType = $_FILES['item-image']['type'];

// Specify the directory to save uploaded images
$uploadDirectory = 'images/';

// Generate a unique filename for the uploaded image
$imageFileName = uniqid() . '_' . $imageName;

// Move the uploaded image to the specified directory
$uploadPath = $uploadDirectory . $imageFileName;
move_uploaded_file($imageTmpName, $uploadPath);

// Insert item details into the database
$sql = "INSERT INTO koleksi (nama, kategori, descript, date, gambar) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $itemName, $itemCategory, $itemDescription, $itemDate, $uploadPath);
if ($stmt->execute()) {
    $response = array('success' => true, 'message' => 'Item added successfully');
} else {
    $response = array('success' => false, 'message' => 'Error adding item');
}
$stmt->close();

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);

mysqli_close($conn);
?>
