<?php
include 'DBConn.php';

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "UPDATE tbiClothes
            SET Status='Approved'
            WHERE ClothesID='$id'";

    if($conn->query($sql))
    {
        header("Location: adminDashboard.php");
        exit();
    }
    else
    {
        echo "Error approving item.";
    }
}
else
{
    echo "No item selected.";
}
?>