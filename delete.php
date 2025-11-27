<?php
include("db.php");

// Read id from URL
$id = $_GET['id'];

// Build delete SQL
$sql = "DELETE FROM games WHERE game_id = {$id}";

// Run SQL and show error if something goes wrong
if (!$mysqli->query($sql)) {
    echo("<h4>SQL error description: " . $mysqli->error . "</h4>");
    exit;
}

// Redirect back to list
header("location: list-game.php");
?>
