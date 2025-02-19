<?php
class WatchlistModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function removeCrypto($userId, $cryptoId) {
        $this->db->query("DELETE FROM watchlist WHERE user_id = :user_id AND crypto_id = :crypto_id");
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':crypto_id', $cryptoId);
        return $this->db->execute();
    }
}
?>
