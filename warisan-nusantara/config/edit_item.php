<?php
$host = '';
$username = "root";
$password = '';
$dbname = "nusantara";

//create connection
$conn = new mysqli($host, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$itemName = $_POST['item-name'];
$itemCategory = $_POST['item-category'];
$itemDate = $_POST['item-date'];
$itemDescription = $_POST['item-description'];
$itemId = $_POST['item-id'];

// Handle image upload
$imageName = $_FILES['item-image']['name'];
$imageTmpName = $_FILES['item-image']['tmp_name'];
$imageType = $_FILES['item-image']['type'];

// Specify the directory to save uploaded images
$uploadDirectory = 'images/';

// Generate a unique filename for the uploaded image
$imageFileName = uniqid() . '_' . $imageName;

// Move the uploaded image to the specified directory
$uploadPath = $imageFileName;
$directoryUpload = $uploadDirectory . $imageFileName;

echo $itemId;

// Check if item id is empty
if (!empty($itemId)) {
    // Construct the update query based on the non-empty inputs
    $sql = "UPDATE koleksi SET ";
    $params = array();

    if (!empty($itemName)) {
        $sql .= "nama = ?, ";
        $params[] = $itemName;
    }
    if (!empty($itemCategory)) {
        $sql .= "kategori = ?, ";
        $params[] = $itemCategory;
    }
    if (!empty($itemDescription)) {
        $sql .= "descript = ?, ";
        $params[] = $itemDescription;
    }
    if (!empty($itemDate)) {
        $sql .= "date = ?, ";
        $params[] = $itemDate;
    }
    if (!empty($imageName)) {
        $sql .= "gambar = ?, ";
        $params[] = $uploadPath;
        
        //delete previous picture
        $sql2 = "SELECT gambar FROM koleksi WHERE id = '" . $itemId . "'";
        $result = $conn->query($sql2);
        $row = $result->fetch_assoc();
        $oldImage = $row['gambar'];
        unlink($uploadDirectory . $oldImage);
    }

    // Remove the trailing comma and space from the query
    $sql = rtrim($sql, ', ');

    // Add the condition to update only the row with matching item ID
    $sql .= " WHERE id = '" . $itemId . "'";

    // Execute the update query with the provided parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(str_repeat('s', count($params)), ...$params);
    if ($stmt->execute()) {
        $response = array('success' => true, 'message' => 'Item updated successfully');
    } else {
        $response = array('success' => false, 'message' => 'Error updating item');
    }

    move_uploaded_file($imageTmpName, $directoryUpload);
    $stmt->close();
} else {
    $response = array('success' => false, 'message' => 'No item ID provided');
}


// Return the JSON response
// header('Content-Type: application/json');
echo json_encode($response);

mysqli_close($conn);
