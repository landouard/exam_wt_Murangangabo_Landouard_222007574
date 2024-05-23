<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad Copywriting Project Form</title>
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

<h2>Ad Copywriting Project Form</h2>
<form id="projectForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="platform">Platform:</label>
    <input type="text" id="platform" name="platform" required>

    <label for="adType">Ad Type:</label>
    <input type="text" id="adType" name="adType" required>

    <label for="headline">Headline:</label>
    <input type="text" id="headline" name="headline" required>

    <label for="bodyCopy">Body Copy:</label>
    <textarea id="bodyCopy" name="bodyCopy" rows="4" required></textarea>

    <label for="cta">Call to Action (CTA):</label>
    <input type="text" id="cta" name="cta" required>

    <label for="targetAudience">Target Audience:</label>
    <input type="text" id="targetAudience" name="targetAudience" required>

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
    $stmt = $conn->prepare("INSERT INTO AdCopywritingProjects (Platform, AdType, Headline, BodyCopy, CTA, TargetAudience, Notes) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $platform, $adType, $headline, $bodyCopy, $cta, $targetAudience, $notes);

    // Set parameters and execute
    $platform = $_POST['platform'];
    $adType = $_POST['adType'];
    $headline = $_POST['headline'];
    $bodyCopy = $_POST['bodyCopy'];
    $cta = $_POST['cta'];
    $targetAudience = $_POST['targetAudience'];
    $notes = $_POST['notes'];

    if ($stmt->execute()) {
        echo "<script>alert('New ad copywriting project has been added successfully!');</script>";
    } else {
        echo "<script>alert('There was an error submitting the ad copywriting project.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<script>
    document.getElementById('projectForm').addEventListener('submit', function(event) {
        // Validate the form
        const platform = document.getElementById('platform').value;
        const adType = document.getElementById('adType').value;
        const headline = document.getElementById('headline').value;
        const bodyCopy = document.getElementById('bodyCopy').value;
        const cta = document.getElementById('cta').value;
        const targetAudience = document.getElementById('targetAudience').value;

        if (!platform || !adType || !headline || !bodyCopy || !cta || !targetAudience) {
            alert('Please fill in all required fields.');
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
</script>

</body>
</html>
