<?php
// Connect to MySQL
$conn = new mysqli('localhost', 'root', '', 'user_auth');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect data from the form
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

// Insert data into the database
$sql = "INSERT INTO users (first_name, last_name, dob, gender, mobile, email, password) 
        VALUES ('$first_name', '$last_name', '$dob', '$gender', '$mobile', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Signup successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>