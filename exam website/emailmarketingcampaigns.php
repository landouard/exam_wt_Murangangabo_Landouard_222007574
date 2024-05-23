<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Marketing Campaign Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: #f4f4f4;
        }

        form {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h2>Email Marketing Campaign Form</h2>
<form id="campaignForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="emailType">Email Type:</label>
    <input type="text" id="emailType" name="emailType" required>

    <label for="subjectLine">Subject Line:</label>
    <input type="text" id="subjectLine" name="subjectLine" required>

    <label for="keyMessage">Key Message:</label>
    <textarea id="keyMessage" name="keyMessage" rows="4" required></textarea>

    <label for="targetAudience">Target Audience:</label>
    <input type="text" id="targetAudience" name="targetAudience" required>

    <label for="sendDate">Send Date:</label>
    <input type="date" id="sendDate" name="sendDate" required>

    <label for="notes">Notes:</label>
    <textarea id="notes" name="notes" rows="4"></textarea>

    <button type="submit">Submit</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "your_database_name";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO EmailMarketingCampaigns (EmailType, SubjectLine, KeyMessage, TargetAudience, SendDate, Notes) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $emailType, $subjectLine, $keyMessage, $targetAudience, $sendDate, $notes);

    // Set parameters and execute
    $emailType = $_POST['emailType'];
    $subjectLine = $_POST['subjectLine'];
    $keyMessage = $_POST['keyMessage'];
    $targetAudience = $_POST['targetAudience'];
    $sendDate = $_POST['sendDate'];
    $notes = $_POST['notes'];

    if ($stmt->execute()) {
        echo "<script>alert('New campaign has been added successfully!');</script>";
    } else {
        echo "<script>alert('There was an error submitting the campaign.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<script>
    document.getElementById('campaignForm').addEventListener('submit', function(event) {
        // Validate the form
        const emailType = document.getElementById('emailType').value;
        const subjectLine = document.getElementById('subjectLine').value;
        const keyMessage = document.getElementById('keyMessage').value;
        const targetAudience = document.getElementById('targetAudience').value;
        const sendDate = document.getElementById('sendDate').value;

        if (!emailType || !subjectLine || !keyMessage || !targetAudience || !sendDate) {
            alert('Please fill in all required fields.');
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
</script>

</body>
</html>
