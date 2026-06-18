<?php
include 'DBConn.php';
include 'navbar.php';

if(!isset($_SESSION['user']))
{
    die("Please login first.");
}
$userID = $_SESSION['user']['UserID'];

$sql = "
SELECT *
FROM CART c
JOIN tbiClothes t
ON c.ItemID=t.ClothesID
WHERE c.UserID='$userID'
";

$result = $conn->query($sql);

echo "<h2>Shopping Cart</h2>";

while($row=$result->fetch_assoc())
{
    echo "
    <p>
        {$row['Name']}
        (Quantity: {$row['Quantity']})
        R{$row['Price']}

        <a href='increaseCart.php?id={$row['CartID']}'>+</a>

        <a href='decreaseCart.php?id={$row['CartID']}'>-</a>

        <a href='removeCart.php?id={$row['CartID']}'>Remove</a>
    </p>
    ";
}

echo "<a href='checkout.php'>
<button>Checkout</button>
</a>";
?>