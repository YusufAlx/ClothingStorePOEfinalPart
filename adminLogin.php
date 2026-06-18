<?php include 'navbar.php'; ?>

<h2>Admin Login</h2>

<form method="POST" action="processAdminLogin.php">
    Email: <input type="email" name="email"><br><br>
    Password: <input type="password" name="password"><br><br>

    <button type="submit">Login</button>
</form>