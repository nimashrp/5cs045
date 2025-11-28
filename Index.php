<?php

include("db.php");
include("navbar.php");

// Fetch latest games
$sql = "SELECT * FROM games ORDER BY released_date DESC";
$result = $mysqli->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Game Portal - Home</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

  <div class="text-center mb-5">
    <h1>Welcome to Game Portal</h1>
    <p class="lead">Discover, add, and manage your favorite games!</p>
  </div>

  <!-- AJAX Search -->
<div class="mb-5">


 

  <ul id="results" class="list-group mt-2"></ul>
</div>


  <!-- Latest Games -->
  <h3>Latest Added Games</h3>
  <div class="row mt-3">
    <?php if($result && $result->num_rows > 0): ?>
        <?php while($game = $result->fetch_assoc()): ?>
          <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body">
                <h5 class="card-title"><?=htmlspecialchars($game['game_name'])?></h5>
                <p class="card-text"><?=substr(htmlspecialchars($game['game_description']), 0, 100)?>...</p>
              </div>
              <div class="card-footer d-flex justify-content-between align-items-center">
                <small>Rating: <?=$game['rating']?></small>
                <a href="game-details.php?id=<?=$game['game_id']?>" class="btn btn-sm btn-primary">Details</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p class="text-muted">No games added yet. <a href="add-game-form.php">Add your first game!</a></p>
    <?php endif; ?>
  </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- AJAX Search Script -->
<script>
<scri src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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


</script>


</body>
</html>