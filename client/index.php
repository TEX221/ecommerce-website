<?php
session_start();

if (!isset($_SESSION['user'])) {
  header('Location: /projet/screen/signin/signin.php');
  exit;
}
$user = &$_SESSION['user'];
$firstName = $user['firstName'] ?? '';
$lastName = $user['lastName'] ?? '';
$email = $user['email'] ?? '';
$role = $user['role'] ?? '';

$isAdmin = $role === "admin";

require __DIR__ . "/../utils/connexion_db.php";
require __DIR__ . "/../client/traitementClient.php";
$clients = &getClients($pdo);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Commerciale</title>
  <link rel="stylesheet" href="../bootstrap-5.3.8-dist/css/bootstrap.min.css" />
</head>

<body class="bg-light">
  <?php require __DIR__ . "/../components/header.php" ?>

  <main class="container d-flex justify-content-center mt-2  min-vh-100">
    <div class="card shadow-lg border-0 w-100" style="max-width: 800px;">
      <div class="card-body p-4">
        <ul class="nav nav-pills nav-fill mb-4 d-flex justify-content-center" role="tablist">
          <li class="nav-item" style="max-width: 250px;">
            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#liste-client">Liste des clients</button>
          </li>
          <li class="nav-item" style="max-width: 250px;">
            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#edit-profile">Modifier votre profile</button>
          </li>

          <?php if ($isAdmin): ?>
            <li class="nav-item" style="max-width: 250px;">
              <button class="nav-link" data-bs-toggle="pill" data-bs-target="#add-client">Ajouter Client</button>
            </li>
          <?php endif; ?>
        </ul>

        <div class="tab-content">

          <!-- Liste Client -->
          <div class="tab-pane fade show active" id="liste-client">
            <?php require __DIR__ . "/../client/listeClient.php" ?>
          </div>
          <div class="tab-pane fade" id="edit-profile">
            <?php require __DIR__ . "/../client/updateClient.php" ?>
          </div>
          <div class="tab-pane fade" id="add-client">
            <?php require __DIR__ . "/../client/addClient.php" ?>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php require __DIR__ . "/../components/foooter.php" ?>
  <script src="../screen/signin/signin.js"></script>
  <script src="../bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
