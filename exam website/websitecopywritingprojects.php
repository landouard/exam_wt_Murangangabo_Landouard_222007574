<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Copywriting Project Form</title>
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

<h2>Website Copywriting Project Form</h2>
<form id="projectForm" method="post" action="">
    <label for="section">Section:</label>
    <input type="text" id="section" name="section" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" required></textarea>

    <label for="targetAudience">Target Audience:</label>
    <input type="text" id="targetAudience" name="targetAudience" required>

    <label for="toneStyle">Tone/Style:</label>
    <input type="text" id="toneStyle" name="toneStyle" required>

    <label for="deadline">Deadline:</label>
    <input type="date" id="deadline" name="deadline" required>

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
    $stmt = $conn->prepare("INSERT INTO WebsiteCopywritingProjects (Section, Description, TargetAudience, ToneStyle, Deadline, Notes) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $section, $description, $targetAudience, $toneStyle, $deadline, $notes);

    // Set parameters and execute
    $section = $_POST['section'];
    $description = $_POST['description'];
    $targetAudience = $_POST['targetAudience'];
    $toneStyle = $_POST['toneStyle'];
    $deadline = $_POST['deadline'];
    $notes = $_POST['notes'];

    if ($stmt->execute()) {
        echo "<script>alert('New project has been added successfully!');</script>";
    } else {
        echo "<script>alert('There was an error submitting the project.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<script>
    document.getElementById('projectForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Collect form data
        const section = document.getElementById('section').value;
        const description = document.getElementById('description').value;
        const targetAudience = document.getElementById('targetAudience').value;
        const toneStyle = document.getElementById('toneStyle').value;
        const deadline = document.getElementById('deadline').value;
        const notes = document.getElementById('notes').value;

        // Validate the data (simple example)
        if (!section || !description || !targetAudience || !toneStyle || !deadline) {
            alert('Please fill in all required fields.');
            return;
        }

        // Submit the form data
        this.submit();
    });
</script>

</body>
</html>
