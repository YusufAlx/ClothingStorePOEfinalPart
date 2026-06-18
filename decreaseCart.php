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
    UPDATE cart
    SET Quantity = Quantity - 1
    WHERE CartID='$cartID'
    AND Quantity > 1
    ";

    if($conn->query($sql))
    {
        header("Location: cart.php");
        exit();
    }
    else
    {
        echo "Error updating quantity: " . $conn->error;
    }
}
else
{
    echo "No cart item selected.";
}
?>