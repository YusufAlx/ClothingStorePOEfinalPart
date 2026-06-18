<?php
include 'DBConn.php';

$name=$_POST['name'];
$brand=$_POST['brand'];
$description=$_POST['description'];
$price=$_POST['price'];

$imageName=time()."_".$_FILES['image']['name'];

move_uploaded_file(
$_FILES['image']['tmp_name'],
"images/".$imageName
);

$conn->query("
INSERT INTO tbiClothes
(Name,Brand,Description,Price,Image,Status)
VALUES
(
'$name',
'$brand',
'$description',
'$price',
'images/$imageName',
'Pending'
)
");

echo "Submitted for approval";
?>