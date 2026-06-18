<?php
session_start();
include 'DBConn.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM tblAdmin WHERE Email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc();

    if ($admin['Password'] == $password) {
        $_SESSION['admin'] = $admin;
        header("Location: adminDashboard.php");
    } else {
        echo "Incorrect password";
    }
}
?>