<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("db.php");

// Make sure db.php creates:  $mysqli = new mysqli(...);

// Handle AJAX request
if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {

    $keywords = $_POST['keywords'] ?? '';
    $keywords = mysqli_real_escape_string($mysqli, $keywords);

    // Query games table
    $sql = "SELECT * FROM games
            WHERE game_name LIKE '%$keywords%'
            ORDER BY released_date DESC";

    $results = mysqli_query($mysqli, $sql);

    if (!$results) {
        echo "<p>SQL Error: " . mysqli_error($mysqli) . "</p>";
        exit;
    }

    if (mysqli_num_rows($results) > 0) {
        echo "<table border='1' cellpadding='8' width='100%'>";
        echo "<tr><th>Game Name</th><th>Rating</th></tr>";

        while ($row = mysqli_fetch_assoc($results)) {
            echo "<tr>";
            echo "<td><a href='game-details.php?id=" . $row['game_id'] . "'>"
                 . htmlspecialchars($row['game_name']) . "</a></td>";
            echo "<td>" . htmlspecialchars($row['rating']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No results found.</p>";
    }

    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>AJAX Game Search</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        table { border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 10px; }
        #results { margin-top: 20px; }
        input { padding: 10px; width: 300px; }
    </style>
</head>

<body>

<h1>AJAX Game Search</h1>

<input type="text" id="keywords" placeholder="Search games...">

<div id="results">Loading...</div>

<script>
$(document).ready(function(){

    // Load all games initially
    loadGames("");

    // Function to load results using AJAX
    function loadGames(query) {
        $.post("search-game.php", { keywords: query, ajax: 1 }, function(data){
            $("#results").html(data);
        });
    }

    // Search as the user types
    $("#keywords").keyup(function(){
        let query = $(this).val().trim();
        loadGames(query);
    });

});
</script>

</body>
</html>
