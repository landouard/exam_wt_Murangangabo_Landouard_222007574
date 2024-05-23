<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Email Marketing Campaign</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
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
        
        // Retrieve campaign details from the database
        $sql = "SELECT * FROM EmailMarketingCampaigns WHERE CampaignID = $CampaignID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Display the update form
            ?>
            <h2>Update Email Marketing Campaign</h2>
            <form method="post" action="update_email_marketing_campaign.php">
                <input type="hidden" name="CampaignID" value="<?php echo $row['CampaignID']; ?>">
                <label for="emailType">Email Type:</label>
                <input type="text" id="emailType" name="emailType" value="<?php echo $row['EmailType']; ?>" required>

                <label for="subjectLine">Subject Line:</label>
                <input type="text" id="subjectLine" name="subjectLine" value="<?php echo $row['SubjectLine']; ?>" required>

                <label for="keyMessage">Key Message:</label>
                <textarea id="keyMessage" name="keyMessage" rows="4" required><?php echo $row['KeyMessage']; ?></textarea>

                <label for="targetAudience">Target Audience:</label>
                <input type="text" id="targetAudience" name="targetAudience" value="<?php echo $row['TargetAudience']; ?>" required>

                <label for="sendDate">Send Date:</label>
                <input type="date" id="sendDate" name="sendDate" value="<?php echo $row['SendDate']; ?>" required>

                <label for="notes">Notes:</label>
                <textarea id="notes" name="notes" rows="4"><?php echo $row['Notes']; ?></textarea>

                <button type="submit">Update</button>
            </form>
            <?php
        } else {
            echo "No campaign found with CampaignID: $CampaignID";
        }
    } else {
        echo "CampaignID is not set.";
    }

    $conn->close();
    ?>
</body>
</html>
