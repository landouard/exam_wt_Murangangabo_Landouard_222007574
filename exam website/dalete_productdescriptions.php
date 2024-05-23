<?php
// Database connection details
$host = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ProductID is set
if(isset($_GET['ProductID'])) {
    $ProductID = $_GET['ProductID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM ProductDescriptions WHERE ProductID = ?");
    $stmt->bind_param("i", $ProductID);
    if ($stmt->execute()) {
        echo "Product description record deleted successfully.";
    } else {
        echo "Error deleting product description record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ProductID is not set.";
}

$conn->close();
?>
