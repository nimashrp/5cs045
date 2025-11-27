<?php
include("db.php");

// Read values from form
$id = $_POST['id'];
$game_name = $_POST['game_name'];
$game_description = $_POST['game_description'];
$released_date = $_POST['released_date'];
$rating = $_POST['rating'];

// Build SQL UPDATE statement
$sql = "UPDATE games 
        SET game_name = '{$game_name}',
            game_description = '{$game_description}',
            released_date = '{$released_date}',
            rating = '{$rating}'
        WHERE game_id = {$id}";

// Run SQL and show errors if any
if (!$mysqli->query($sql)) {
    echo("<h4>SQL error description: " . $mysqli->error . "</h4>");
    exit;
}

// Redirect back to list
header("location: list-game.php");
?>
