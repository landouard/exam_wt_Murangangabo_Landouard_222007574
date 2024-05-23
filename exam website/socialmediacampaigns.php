<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Campaign Form</title>
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

        input, textarea, select {
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

<h2>Social Media Campaign Form</h2>
<form id="campaignForm">
    <label for="platform">Platform:</label>
    <input type="text" id="platform" name="platform" required>

    <label for="postType">Post Type:</label>
    <input type="text" id="postType" name="postType" required>

    <label for="contentFocus">Content Focus:</label>
    <textarea id="contentFocus" name="contentFocus" rows="4" required></textarea>

    <label for="targetAudience">Target Audience:</label>
    <input type="text" id="targetAudience" name="targetAudience" required>

    <label for="schedule">Schedule:</label>
    <input type="text" id="schedule" name="schedule" required>

    <label for="notes">Notes:</label>
    <textarea id="notes" name="notes" rows="4"></textarea>

    <button type="submit">Submit</button>
</form>

<script>
    document.getElementById('campaignForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Collect form data
        const platform = document.getElementById('platform').value;
        const postType = document.getElementById('postType').value;
        const contentFocus = document.getElementById('contentFocus').value;
        const targetAudience = document.getElementById('targetAudience').value;
        const schedule = document.getElementById('schedule').value;
        const notes = document.getElementById('notes').value;

        // Validate the data (simple example)
        if (!platform || !postType || !contentFocus || !targetAudience || !schedule) {
            alert('Please fill in all required fields.');
            return;
        }

        // Create a data object
        const formData = {
            platform,
            postType,
            contentFocus,
            targetAudience,
            schedule,
            notes
        };

        // Send the data to the server
        fetch('/submit_campaign', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Campaign submitted successfully!');
                document.getElementById('campaignForm').reset();
            } else {
                alert('There was an error submitting the campaign.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('There was an error submitting the campaign.');
        });
    });
</script>

</body>
</html>
