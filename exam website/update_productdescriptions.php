<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product Description</title>
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

    // Check if ProductID is set
    if(isset($_GET['ProductID'])) {
        $ProductID = $_GET['ProductID'];
        
        // Retrieve product details from the database
        $sql = "SELECT * FROM ProductDescriptions WHERE ProductID = $ProductID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Display the update form
            ?>
            <h2>Update Product Description</h2>
            <form method="post" action="update_product_description.php">
                <input type="hidden" name="ProductID" value="<?php echo $row['ProductID']; ?>">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="productName" value="<?php echo $row['ProductName']; ?>" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required><?php echo $row['Description']; ?></textarea>

                <label for="features">Features:</label>
                <textarea id="features" name="features" rows="4" required><?php echo $row['Features']; ?></textarea>

                <label for="targetAudience">Target Audience:</label>
                <input type="text" id="targetAudience" name="targetAudience" value="<?php echo $row['TargetAudience']; ?>" required>

                <label for="seoKeywords">SEO Keywords:</label>
                <textarea id="seoKeywords" name="seoKeywords" rows="4" required><?php echo $row['SEOKeywords']; ?></textarea>

                <label for="notes">Notes:</label>
                <textarea id="notes" name="notes" rows="4"><?php echo $row['Notes']; ?></textarea>

                <button type="submit">Update</button>
            </form>
            <?php
        } else {
            echo "No product found with ProductID: $ProductID";
        }
    } else {
        echo "ProductID is not set.";
    }

    $conn->close();
    ?>
</body>
</html>
