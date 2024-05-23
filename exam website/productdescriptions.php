<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Description Form</title>
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

<h2>Product Description Form</h2>
<form id="descriptionForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="productName">Product Name:</label>
    <input type="text" id="productName" name="productName" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4" required></textarea>

    <label for="features">Features:</label>
    <textarea id="features" name="features" rows="4" required></textarea>

    <label for="targetAudience">Target Audience:</label>
    <input type="text" id="targetAudience" name="targetAudience" required>

    <label for="seoKeywords">SEO Keywords:</label>
    <textarea id="seoKeywords" name="seoKeywords" rows="4" required></textarea>

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
    $stmt = $conn->prepare("INSERT INTO ProductDescriptions (ProductName, Description, Features, TargetAudience, SEOKeywords, Notes) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $productName, $description, $features, $targetAudience, $seoKeywords, $notes);

    // Set parameters and execute
    $productName = $_POST['productName'];
    $description = $_POST['description'];
    $features = $_POST['features'];
    $targetAudience = $_POST['targetAudience'];
    $seoKeywords = $_POST['seoKeywords'];
    $notes = $_POST['notes'];

    if ($stmt->execute()) {
        echo "<script>alert('New product description has been added successfully!');</script>";
    } else {
        echo "<script>alert('There was an error submitting the product description.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<script>
    document.getElementById('descriptionForm').addEventListener('submit', function(event) {
        // Validate the form
        const productName = document.getElementById('productName').value;
        const description = document.getElementById('description').value;
        const features = document.getElementById('features').value;
        const targetAudience = document.getElementById('targetAudience').value;
        const seoKeywords = document.getElementById('seoKeywords').value;

        if (!productName || !description || !features || !targetAudience || !seoKeywords) {
            alert('Please fill in all required fields.');
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
</script>

</body>
</html>
