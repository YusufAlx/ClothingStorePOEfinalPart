<?php
session_start();
include 'DBConn.php';

if(!isset($_SESSION['user']))
{
    die("Please login first.");
}

if(isset($_GET['id']))
{
    $cartID = $_GET['id'];

    $sql = "
    DELETE FROM cart
    WHERE CartID='$cartID'
    ";

    if($conn->query($sql))
    {
        header("Location: cart.php");
        exit();
    }
    else
    {
        echo "Error removing item: " . $conn->error;
    }
}
else
{
    echo "No cart item selected.";
}
?>