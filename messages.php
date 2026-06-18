<?php
include 'DBConn.php';
include 'navbar.php';

if(!isset($_SESSION['UserID']))
{
    die("Please login first.");
}

$currentUser = $_SESSION['UserID'];

$sql = "SELECT *
        FROM MESSAGES
        WHERE SenderID='$currentUser'
        OR ReceiverID='$currentUser'
        ORDER BY DateSent DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Messages</title>
</head>
<body>

<h2>Messages</h2>

<a href="sendMessage.php">
    Send New Message
</a>

<hr>

<?php

while($row = $result->fetch_assoc())
{
    echo "
    <div style='border:1px solid #ccc;
                padding:10px;
                margin-bottom:10px;'>

        <strong>From:</strong>
        {$row['SenderID']}<br>

        <strong>To:</strong>
        {$row['ReceiverID']}<br>

        <strong>Date:</strong>
        {$row['DateSent']}<br><br>

        {$row['MessageText']}
    </div>
    ";
}

?>

</body>
</html>