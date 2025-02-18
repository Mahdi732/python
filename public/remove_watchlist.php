<?php
require_once '../libraries/Database.php';
require_once '../app/controllers/WatchlistController.php';

$database = new Database();
$watchlistController = new WatchlistController($database);
$watchlistController->removeFromWatchlist();
?>
