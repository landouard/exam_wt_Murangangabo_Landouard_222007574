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

// Check if campaignID is set
if(isset($_GET['campaignID'])) {
    $campaignID = $_GET['campaignID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM AdCopywritingCampaigns WHERE CampaignID = ?");
    $stmt->bind_param("i", $campaignID);
    if ($stmt->execute()) {
        echo "Campaign record deleted successfully.";
    } else {
        echo "Error deleting campaign record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "CampaignID is not set.";
}

$conn->close();
?>
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
    $stmt = $conn->prepare("DELETE FROM AdCopywritingProjects WHERE ProjectID = ?");
    $stmt->bind_param("i", $ProjectID);
    if ($stmt->execute()) {
        echo "Project record deleted successfully.";
    } else {
        echo "Error deleting project record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ProjectID is not set.";
}

$conn->close();
?>
