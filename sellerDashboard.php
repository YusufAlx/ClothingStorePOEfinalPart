<?php
include 'navbar.php';
?>

<h2>Sell Clothing</h2>

<form action="processSellItem.php"
method="POST"
enctype="multipart/form-data">

Name:
<input type="text" name="name"><br><br>

Brand:
<input type="text" name="brand"><br><br>

Description:
<textarea name="description"></textarea><br><br>

Price:
<input type="number" name="price"><br><br>

Image:
<input type="file" name="image"><br><br>

<button>Submit Item</button>

</form>