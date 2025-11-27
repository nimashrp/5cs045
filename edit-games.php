<?php
include("db.php");

// Get ID from URL
$id = $_GET['id'];

// Load this game's data
$sql = "SELECT * FROM games WHERE game_id = {$id}";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
?>

<h1>Edit Game</h1>

<form action="update-game.php" method="post">

  <!-- Hidden field so we know which game to update -->
  <input type="hidden" name="id" value="<?=$row['game_id']?>">

  <label>Game Name:</label><br>
  <input type="text" name="game_name" value="<?=$row['game_name']?>"><br><br>

  <label>Description:</label><br>
  <textarea name="game_description"><?=$row['game_description']?></textarea><br><br>

  <label>Release Date:</label><br>
  <input type="date" name="released_date" value="<?=$row['released_date']?>"><br><br>

  <label>Rating:</label><br>
  <input type="number" name="rating" value="<?=$row['rating']?>"><br><br>

  <button type="submit">Update Game</button>

</form>

<a href="list-game.php"><< Back to list</a>
