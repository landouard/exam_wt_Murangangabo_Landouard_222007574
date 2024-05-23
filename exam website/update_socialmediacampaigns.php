<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Social Media Campaign</title>
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
        $sql = "SELECT * FROM SocialMediaCampaigns WHERE CampaignID = $CampaignID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Display the update form
            ?>
            <h2>Update Social Media Campaign</h2>
            <form method="post" action="update_social_media_campaign.php">
                <input type="hidden" name="CampaignID" value="<?php echo $row['CampaignID']; ?>">
                <label for="platform">Platform:</label>
                <input type="text" id="platform" name="platform" value="<?php echo $row['Platform']; ?>" required>

                <label for="postType">Post Type:</label>
                <input type="text" id="postType" name="postType" value="<?php echo $row['PostType']; ?>" required>

                <label for="contentFocus">Content Focus:</label>
                <textarea id="contentFocus" name="contentFocus" rows="4" required><?php echo $row['ContentFocus']; ?></textarea>

                <label for="targetAudience">Target Audience:</label>
                <input type="text" id="targetAudience" name="targetAudience" value="<?php echo $row['TargetAudience']; ?>" required>

                <label for="schedule">Schedule:</label>
                <input type="text" id="schedule" name="schedule" value="<?php echo $row['Schedule']; ?>" required>

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
