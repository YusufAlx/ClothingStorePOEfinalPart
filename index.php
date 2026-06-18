<?php
include 'DBConn.php';

// SHOW ERRORS (important for debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// check query
$result = $conn->query("SELECT * FROM tbiClothes");

if (!$result) {
    die("SQL Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Clothing Store</title>

<style>
body { margin:0; font-family: Arial; background:#f5f5f5; }

.container { padding:20px; }

.grid {
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));
    gap:20px;
}

.card {
    background:white;
    padding:10px;
    border-radius:10px;
    text-align:center;
}

.card img {
    width:100%;
    height:200px;
    object-fit:cover;
}
</style>
</head>

<body>

<?php include 'navbar.php'; ?>

<div class="container">

<h2>Products</h2>

<?php
if ($result->num_rows == 0) {
    echo "<p>No products found. Add items in admin dashboard.</p>";
} else {

    echo "<div class='grid'>";

    while ($row = $result->fetch_assoc()) {

        $image = !empty($row['Image']) ? $row['Image'] : "images/default.jpg";

        echo "
        <div class='card'>
            <img src='$image'>

            <h3>{$row['Name']}</h3>

            <p>{$row['Category']}</p>

            <p>R{$row['Price']}</p>

            <a href='addToCart.php?id={$row['ClothesID']}'>
                <button>Add To Cart</button>
            </a>

</div>
";
    }

    echo "</div>";
}
?>

</div>

</body>
</html>