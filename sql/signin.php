<?php
// Connect to MySQL
$conn = new mysqli('localhost', 'root', '', 'user_auth');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect data from the form
$mobile_or_email = $_POST['mobile'];
$password = $_POST['password'];

// Fetch the user by email or mobile number
$sql = "SELECT * FROM users WHERE email='$mobile_or_email' OR mobile='$mobile_or_email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Verify the password
    if (password_verify($password, $user['password'])) {
        echo "Sign-in successful!";
    } else {
        echo "Incorrect password!";
    }
} else {
    echo "User not found!";
}

$conn->close();
?>