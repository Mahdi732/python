<?php // Model (WatchlistModel.php)
class WatchlistModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function removeCrypto($userId, $cryptoId) {
        $sql = "DELETE FROM watchlist WHERE user_id = :user_id AND crypto_id = :crypto_id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['user_id' => $userId, 'crypto_id' => $cryptoId]);
    }
}

// Controller (WatchlistController.php)
class WatchlistController {
    private $watchlistModel;

    public function __construct($watchlistModel) {
        $this->watchlistModel = $watchlistModel;
    }

    public function removeFromWatchlist() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crypto_id'])) {
            session_start();
            if (!isset($_SESSION['user_id'])) {
                echo json_encode(['error' => 'User not authenticated']);
                return;
            }

            $userId = $_SESSION['user_id'];
            $cryptoId = $_POST['crypto_id'];
            
            if ($this->watchlistModel->removeCrypto($userId, $cryptoId)) {
                echo json_encode(['success' => 'Crypto removed from watchlist']);
            } else {
                echo json_encode(['error' => 'Failed to remove crypto']);
            }
        }
    }
}

// View (remove_watchlist.php)
?>
<!DOCTYPE html>
<html>
<head>
    <title>Remove from Watchlist</title>
</head>
<body>
    <form method="POST" action="remove_watchlist.php">
        <label for="crypto_id">Crypto ID:</label>
        <input type="text" name="crypto_id" id="crypto_id" required>
        <button type="submit">Remove from Watchlist</button>
    </form>
</body>
</html>
<?php
// Handle request
require 'config/database.php'; // Database connection
require 'models/WatchlistModel.php';
require 'controllers/WatchlistController.php';

$watchlistModel = new WatchlistModel($db);
$watchlistController = new WatchlistController($watchlistModel);
$watchlistController->removeFromWatchlist();
