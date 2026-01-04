<?php
$isLoggedIn = isset($_SESSION['user']);
$isAdmin = ($_SESSION['user']['role'] ?? '') == 'admin';
?>
<header class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Commerciale</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php if ($isLoggedIn) : ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/projet/client">Client</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/projet/Vendeur">Vendeur</a>
          </li>
          <?php if ($isAdmin): ?>
            <li class="nav-item">
              <a class="nav-link" href="/projet/admin">Admin</a>
            </li>
          <?php endif; ?>
        <?php else: ?>
          <li class="nav-item btn-success">
            <a class="nav-link" href="/projet/screen/signin/signin.php">Se connnecter</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</header>
