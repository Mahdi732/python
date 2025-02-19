<?php
require_once 'app/models/WatchlistModel.php';

class WatchlistController {
    private $watchlistModel;

    public function __construct($db) {
        $this->watchlistModel = new WatchlistModel($db);
    }

    public function removeFromWatchlist() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crypto_id'])) {
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
?>
