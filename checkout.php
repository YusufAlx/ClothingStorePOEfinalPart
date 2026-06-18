<?php
include 'navbar.php';
include 'DBConn.php';

$userID = $_SESSION['user']['UserID'];

$conn->query("
INSERT INTO thlAorder(UserID,OrderDate)
VALUES('$userID',NOW())
");

$conn->query("
DELETE FROM CART
WHERE UserID='$userID'
");

echo "Order placed successfully";
?>