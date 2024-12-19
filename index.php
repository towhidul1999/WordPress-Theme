<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Your Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Submit Your Details</h1>
    
    <!-- Form HTML -->
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <button type="submit" name="submit">Submit</button>
    </form>

<?php

require_once 'connection.php';

if (isset($_POST['submit'])) {
    // Capture form data
    $name = $_POST['name'];
    $email = $_POST['email'];

    try {
        // Call the dbConnection function
        $connection = dbConnection();

        // Prepare and bind statement to avoid SQL injection
        $stmt = $connection->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<p>Data inserted successfully!</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        // Close the statement and connection
        $stmt->close();
        $connection->close();
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}
?>

</body>
</html>