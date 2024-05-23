<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Website Copywriting Project</title>
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

    // Check if ProjectID is set
    if(isset($_GET['ProjectID'])) {
        $ProjectID = $_GET['ProjectID'];
        
        // Retrieve project details from the database
        $sql = "SELECT * FROM WebsiteCopywritingProjects WHERE ProjectID = $ProjectID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Display the update form
            ?>
            <h2>Update Website Copywriting Project</h2>
            <form method="post" action="update_website_copywriting_project.php">
                <input type="hidden" name="ProjectID" value="<?php echo $row['ProjectID']; ?>">
                <label for="section">Section:</label>
                <input type="text" id="section" name="section" value="<?php echo $row['Section']; ?>" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required><?php echo $row['Description']; ?></textarea>

                <label for="targetAudience">Target Audience:</label>
                <input type="text" id="targetAudience" name="targetAudience" value="<?php echo $row['TargetAudience']; ?>" required>

                <label for="toneStyle">Tone/Style:</label>
                <input type="text" id="toneStyle" name="toneStyle" value="<?php echo $row['ToneStyle']; ?>" required>

                <label for="deadline">Deadline:</label>
                <input type="date" id="deadline" name="deadline" value="<?php echo $row['Deadline']; ?>" required>

                <label for="notes">Notes:</label>
                <textarea id="notes" name="notes" rows="4"><?php echo $row['Notes']; ?></textarea>

                <button type="submit">Update</button>
            </form>
            <?php
        } else {
            echo "No project found with ProjectID: $ProjectID";
        }
    } else {
        echo "ProjectID is not set.";
    }

    $conn->close();
    ?>
</body>
</html>
