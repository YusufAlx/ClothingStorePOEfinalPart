<?php session_start(); ?>

<style>
    body {
        margin: 0;
        padding: 0;
    }

    h2 {
        margin-top: 20px; /* prevents pushing navbar */
    }

    .navbar {
        position: sticky;
        top: 0;
        z-index: 1000;
        background: #fe0303;
        padding: 15px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 10px rgba(1, 0, 0, 0);
    }

    .navbar a {
        color: white;
        margin-left: 15px;
        text-decoration: none;
    }
</style>

<div class="navbar">
    <div> ClothingStore</div>

    <div>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="adminLogin.php">Admin</a>
        <a href="cart.php">Cart</a>
        <a href="sellerDashboard.php">Sell Item</a>
        <a href="messages.php">Messages</a>

        <?php if(isset($_SESSION['user'])): ?>
            <span> | Welcome <?php echo $_SESSION['user']['Name']; ?></span>
        <?php endif; ?>
    </div>
</div>