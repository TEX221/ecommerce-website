<?php
session_start();

if (!isset($_SESSION['idUser'])) {
  header('Location: /projet/screen/signin/signin.php');
  exit;
}
$idUser = $_SESSION['idUser'];
$firstName = $_SESSION['firstName'] ?? '';
$lastName = $_SESSION['lastName'] ?? '';
$email = $_SESSION['email'] ?? '';
$tel = $_SESSION['tel'] ?? '';
$role = $_SESSION['role'] ?? '';

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
      <h5 class="text-center text-primary my-2"> Bienvenue <?= $firstName ?> <?= $lastName ?></h5>

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
          <?php require __DIR__ . "/../client/listeClient.php" ?>

          <?php require __DIR__ . "/../client/updateClient.php" ?>
          <?php require __DIR__ . "/../client/addClient.php" ?>

        </div>

      </div>

    </div>
  </main>

  <?php require __DIR__ . "/../components/foooter.php" ?>

  <script src="../screen/signin/signin.js"></script>
  <script src="js/updateClient.js"></script>
  <script src="../bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>