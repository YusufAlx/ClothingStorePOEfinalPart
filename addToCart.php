<?php
session_start();
include 'DBConn.php';

if(!isset($_SESSION['user']))
{
    die("Please login first.");
}

$userID = $_SESSION['user']['UserID'];

$itemID = $_GET['id'];

$sql = "
INSERT INTO cart
(UserID, ItemID, Quantity)
VALUES
('$userID','$itemID',1)
";

$conn->query($sql);

header("Location:index.php");
exit();
?>