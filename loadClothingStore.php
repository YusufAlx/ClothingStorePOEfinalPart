<?php
include 'DBConn.php';

// drop tables
$conn->query("DROP TABLE IF EXISTS thlAorder");
$conn->query("DROP TABLE IF EXISTS tbiClothes");
$conn->query("DROP TABLE IF EXISTS tblUser");
$conn->query("DROP TABLE IF EXISTS tblAdmin");

// recreate tables
$sql = file_get_contents("myClothingStore.sql");

if ($conn->multi_query($sql)) {
    echo "Database loaded successfully!";
} else {
    echo "Error: " . $conn->error;
}
?>