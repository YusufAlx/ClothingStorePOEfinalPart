<?php
session_start();
include 'DBConn.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM tblUser WHERE Email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    if ($row['Status'] != 'approved') {
        die("Account pending approval.");
    }

    if ($row['Password'] == $password) {
        $_SESSION['user'] = $row;
        $_SESSION['UserID'] = $row['UserID'];
        $_SESSION['Name'] = $row['Name'];
        $_SESSION['Email'] = $row['Email'];
        header("Location: index.php");
        exit();
    } else {
        echo "Incorrect password";
    }

} else {
    echo "User not found";
}
?>