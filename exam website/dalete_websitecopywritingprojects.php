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

// Check if ProjectID is set
if(isset($_GET['ProjectID'])) {
    $ProjectID = $_GET['ProjectID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM WebsiteCopywritingProjects WHERE ProjectID = ?");
    $stmt->bind_param("i", $ProjectID);
    if ($stmt->execute()) {
        echo "Website copywriting project record deleted successfully.";
    } else {
        echo "Error deleting website copywriting project record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ProjectID is not set.";
}

$conn->close();
?>
