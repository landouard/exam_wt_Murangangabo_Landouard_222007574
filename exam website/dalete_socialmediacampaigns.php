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

// Check if CampaignID is set
if(isset($_GET['CampaignID'])) {
    $CampaignID = $_GET['CampaignID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM SocialMediaCampaigns WHERE CampaignID = ?");
    $stmt->bind_param("i", $CampaignID);
    if ($stmt->execute()) {
        echo "Social media campaign record deleted successfully.";
    } else {
        echo "Error deleting social media campaign record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "CampaignID is not set.";
}

$conn->close();
?>
