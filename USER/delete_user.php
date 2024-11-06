<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user ID from the POST request
    $id = $_POST['id'];

    // Prepare the delete statement
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "User deleted successfully!";
    } else {
        echo "Error deleting user: " . $stmt->error;
    }

    $stmt->close();
}

// Redirect back to the view page
header("Location: view_users.php");
exit();

$conn->close();
?>
