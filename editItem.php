<?php
include 'DBConn.php';

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbiClothes
            WHERE ClothesID='$id'";

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
}

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "UPDATE tbiClothes
            SET
            Name='$name',
            Brand='$brand',
            Price='$price',
            Description='$description'
            WHERE ClothesID='$id'";

    if($conn->query($sql))
    {
        header("Location: adminDashboard.php");
        exit();
    }
    else
    {
        echo "Update failed.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>

<h2>Edit Clothing Item</h2>

<form method="POST">

    <input type="hidden"
           name="id"
           value="<?php echo $row['ClothesID']; ?>">

    <label>Item Name</label><br>
    <input type="text"
           name="name"
           value="<?php echo $row['Name']; ?>"
           required><br><br>

    <label>Brand</label><br>
    <input type="text"
           name="brand"
           value="<?php echo $row['Brand']; ?>"
           required><br><br>

    <label>Price</label><br>
    <input type="number"
           step="0.01"
           name="price"
           value="<?php echo $row['Price']; ?>"
           required><br><br>

    <label>Description</label><br>
    <textarea name="description"
              rows="5"
              cols="40"><?php echo $row['Description']; ?></textarea><br><br>

    <input type="submit"
           name="update"
           value="Update Item">

</form>

</body>
</html>