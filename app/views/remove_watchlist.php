<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove from Watchlist</title>
</head>
<body>
<h2>Remove Crypto from Watchlist</h2>
<?php if (!isset($_SESSION['user_id'])): ?>
    <p>You need to <a href="login.php">log in</a> to manage your watchlist.</p>
<?php else: ?>
    <form method="POST" action="../../public/remove_watchlist.php">
        <label for="crypto_id">Crypto ID:</label>
        <input type="text" name="crypto_id" id="crypto_id" required>
        <button type="submit">Remove</button>
    </form>
<?php endif; ?>
</body>
</html>
