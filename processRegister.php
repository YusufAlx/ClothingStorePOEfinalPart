<?php
include 'DBConn.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "INSERT INTO tblUser (Name, Email, Password, Status)
        VALUES ('$name', '$email', '$password', 'pending')";

if ($conn->query($sql)) {
    echo "Registered. Wait for admin approval.";
} else {
    echo "Error: " . $conn->error;
}
?>