<?php

function dbConnection() {
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = ""; // No password
        $dbname = "wordpress_db";

        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Return the connection object
    return $conn;
}
?>
