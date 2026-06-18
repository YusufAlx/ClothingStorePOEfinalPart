<?php
session_start();
include 'DBConn.php';

if(isset($_POST['send']))
{
    $sender = $_SESSION['user']['UserID'];
    $receiver = $_POST['receiver'];
    $message = $_POST['message'];

    $sql = "INSERT INTO MESSAGES
            (SenderID, ReceiverID, MessageText)
            VALUES
            ('$sender',
             '$receiver',
             '$message')";

    if($conn->query($sql))
    {
        header("Location: messages.php");
        exit();
    }
    else
    {
        echo "Message failed to send.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Send Message</title>
</head>
<body>

<h2>Send Message</h2>

<form method="POST">

    <label>Receiver User ID</label><br>
    <input type="number"
           name="receiver"
           required><br><br>

    <label>Message</label><br>

    <textarea
        name="message"
        rows="6"
        cols="50"
        required></textarea><br><br>

    <input type="submit"
           name="send"
           value="Send Message">

</form>

</body>
</html>