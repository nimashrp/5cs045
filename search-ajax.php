<?php
include("db.php");

header("Content-Type: application/json");

// If no search entered:
if (!isset($_GET['search']) || strlen($_GET['search']) < 2) {
    echo json_encode([]);
    exit;
}

$search = "%" . $_GET['search'] . "%";

$stmt = $mysqli->prepare("
    SELECT game_id, game_name, game_description 
    FROM games 
    WHERE game_name LIKE ? 
    OR game_description LIKE ?
    LIMIT 10
");

$stmt->bind_param("ss", $search, $search);
$stmt->execute();
$result = $stmt->get_result();

$games = [];

while ($row = $result->fetch_assoc()) {
    $games[] = $row;
}

echo json_encode($games);
