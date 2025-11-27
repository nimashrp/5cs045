<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">

    <!-- Brand / Home -->
    <a class="navbar-brand" href="list-game.php">My Games</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">

        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'list-game.php'){echo 'active';} ?>" 
             href="list-game.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'add-game-form.php'){echo 'active';} ?>" 
             href="add-game-form.php">Add Game</a>
        </li>

      </ul>

      <!-- Search Form -->
      <form class="d-flex" action="search-game.php" method="post">
        <input class="form-control me-2" type="search" name="keywords" placeholder="Search games...">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
