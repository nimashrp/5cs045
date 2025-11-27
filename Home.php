<?php
include 'navbar.php';
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Games Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5 text-center">

  <h1 class="mb-4">Welcome to My Games Collection!</h1>
  <p class="lead mb-4">You can view all your games, add new ones, or search for your favorites.</p>

  <div class="d-flex justify-content-center gap-3">
    <a href="list-game.php" class="btn btn-primary btn-lg">View All Games</a>
    <a href="add-game-form.php" class="btn btn-success btn-lg">Add New Game</a>
  </div>

</div>

<!-- Bootstrap JS (for navbar toggler) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
