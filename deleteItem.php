<?php
include 'DBConn.php';

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "DELETE FROM tbiClothes
            WHERE ClothesID='$id'";

    if($conn->query($sql))
    {
        header("Location: adminDashboard.php");
        exit();
    }
    else
    {
        echo "Error deleting item.";
    }
}
else
{
    echo "No item selected.";
}
?>