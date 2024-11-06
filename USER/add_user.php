<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the user data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
    if ($conn->query($sql) === TRUE) {
        header("Location: form.html"); // Redirect after successful submission
        exit();
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        alert("No name entered. Please try again.");
    }
}

$conn->close();
?>



