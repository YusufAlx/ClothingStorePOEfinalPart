<?php
$email = $_POST['email'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>

<?php include 'navbar.php'; ?>

<h2>Login</h2>

<form method="POST" action="processLogin.php">
    Email:
    <input type="email" name="email" required value="<?php echo htmlspecialchars($email); ?>"><br><br>

    Password:
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

<p><a href="register.php">Register</a></p>

</body>
</html>