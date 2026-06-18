<?php
include 'DBConn.php';

// 1. Drop table if exists
$dropSQL = "DROP TABLE IF EXISTS tblUser";
$conn->query($dropSQL);

// 2. Create table
$createSQL = "CREATE TABLE tblUser (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100),
    Surname VARCHAR(100),
    Email VARCHAR(100),
    Password VARCHAR(255)
)";

if ($conn->query($createSQL) === TRUE) {
    echo "Table created successfully<br>";
} else {
    die("Error creating table: " . $conn->error);
}

// 3. Load data from text file
$file = fopen("userData.txt", "r");

if ($file) {
    while (($line = fgets($file)) !== false) {
        $data = explode(" ", trim($line));

        $name = $data[0];
        $surname = $data[1];
        $email = $data[2];
        $password = $data[3];

        $insertSQL = "INSERT INTO tblUser (Name, Surname, Email, Password)
                      VALUES ('$name', '$surname', '$email', '$password')";

        $conn->query($insertSQL);
    }

    fclose($file);
    echo "Data loaded successfully!";
} else {
    echo "Error opening file.";
}

$conn->close();
?>