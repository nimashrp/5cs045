<?php
// Always start the session at the top
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Game Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">

        <li class="nav-item">
          <a class="nav-link" href="Index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="list-game.php">List Games</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="add-game-form.php">Add Game</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="search-game.php">Search Games</a>
        </li>

        <!-- AJAX Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="ajaxDropdown" role="button" data-bs-toggle="dropdown">
            AJAX Features
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="bootstrap-ajax-dropdown.html">Dropdown Example</a></li>
            <li><a class="dropdown-item" href="bootstrap-ajax-modal.html">Modal Example</a></li>
          </ul>
        </li>

        <!-- LOGIN / LOGOUT SECTION -->
        <?php if (isset($_SESSION['user_id'])): ?>

            <li class="nav-item">
              <span class="nav-link text-info">
                Hello, <?= htmlspecialchars($_SESSION['username']) ?>
              </span>
            </li>

            <li class="nav-item">
              <a class="nav-link btn btn-danger btn-sm text-white" href="logout.php">Logout</a>
            </li>

        <?php else: ?>

            <li class="nav-item">
              <a class="nav-link btn btn-outline-light btn-sm me-2" href="login.php">Login</a>
            </li>

            <li class="nav-item">
              <a class="nav-link btn btn-primary btn-sm text-white" href="signup.php">Signup</a>
            </li>

        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>


