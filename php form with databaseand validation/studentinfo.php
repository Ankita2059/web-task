<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "form"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $rollno = trim($_POST["rollno"]);
    $sex = trim($_POST["sex"]);

    // Basic validation
    if (empty($username) || empty($email) || empty($rollno) || empty($sex)) {
        die("All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO students (username, email, rollno, sex) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $rollno, $sex);

    // Execute the query
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
  ?>
