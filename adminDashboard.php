<?php
include 'DBConn.php';
include 'navbar.php';

// approve user
if (isset($_GET['approve'])) {
    $conn->query("UPDATE tblUser SET Status='approved' WHERE UserID=".$_GET['approve']);
}

// delete user
if (isset($_GET['delete'])) {
    $conn->query("DELETE FROM tblUser WHERE UserID=".$_GET['delete']);
}

// add item
if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $cat = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $imageName = time() . "_" . $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];
    $folder = "images/" . $imageName;

    move_uploaded_file($tempName, $folder);

    $conn->query("INSERT INTO tbiClothes (Name, Category, Price, Stock, Image)
                  VALUES ('$name','$cat','$price','$stock','$folder')");
}
?>

<h2>Admin Dashboard</h2>
<h3>Pending Clothing</h3>

<?php

$result = $conn->query("
SELECT *
FROM tbiClothes
WHERE Status='Pending'
");

while($row = $result->fetch_assoc())
{
    echo "
    <div style='border:1px solid #ccc;
                padding:10px;
                margin-bottom:10px;'>

        <strong>{$row['Name']}</strong><br>

        Category: {$row['Category']}<br>

        Price: R{$row['Price']}<br><br>

        <a href='approveItem.php?id={$row['ClothesID']}'>
            Approve
        </a>

        |

        <a href='editItem.php?id={$row['ClothesID']}'>
            Edit
        </a>

        |

        <a href='deleteItem.php?id={$row['ClothesID']}'>
            Delete
        </a>

    </div>
    ";
}
?>

<h3>Users</h3>
<table border="1">
<tr><th>ID</th><th>Name</th><th>Email</th><th>Status</th><th>Action</th></tr>

<?php
$res = $conn->query("SELECT * FROM tblUser");
while ($r = $res->fetch_assoc()) {
    echo "<tr>
    <td>{$r['UserID']}</td>
    <td>{$r['Name']}</td>
    <td>{$r['Email']}</td>
    <td>{$r['Status']}</td>
    <td>
        <a href='?approve={$r['UserID']}'>Approve</a> |
        <a href='?delete={$r['UserID']}'>Delete</a>
    </td>
    </tr>";
}
?>
</table>

<hr>

<h3>Add Item</h3>

<form method="POST" enctype="multipart/form-data">
    Name: <input type="text" name="name"><br><br>
    Category: <input type="text" name="category"><br><br>
    Price: <input type="number" name="price"><br><br>
    Stock: <input type="number" name="stock"><br><br>
    Image: <input type="file" name="image"><br><br>

    <button name="add">Add Item</button>
</form>