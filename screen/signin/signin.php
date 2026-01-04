<?php
session_start();
if (isset($_SESSION['user'])) {
  header('Location: /');
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Commerciale</title>
  <link rel="stylesheet" href="../../bootstrap-5.3.8-dist/css/bootstrap.min.css" />
</head>

<body class="bg-light">

  <?php require __DIR__ . "/../../components/header.php" ?>

  <main class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg border-0 w-100" style="max-width: 420px;">
      <div class="card-body p-4">
        <ul class="nav nav-pills nav-fill mb-4" role="tablist">
          <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#login">Se connecter</button>
          </li>
          <li class="nav-item">
            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#register">S'inscrire</button>
          </li>
        </ul>

        <div class="tab-content">

          <!-- LOGIN -->
          <div class="tab-pane fade show active" id="login">
            <h4 class="text-center mb-3">Bienvenue 👋</h4>

            <form id="login-form">
              <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control" placeholder="email" required>
                <label>Email</label>
              </div>

              <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control" placeholder="password" required>
                <label>Mot de passe</label>
              </div>
              <p id="login-error" class="d-none text-center h6 my-2 text-danger"></p>

              <button class="btn btn-primary w-100 py-2">Se connecter</button>
            </form>
          </div>

          <!-- REGISTER -->
          <div class="tab-pane fade" id="register">
            <h4 class="text-center mb-3">Créer un compte ✨</h4>

            <form id="signup-form">
              <div class="container d-flex flex-column justify-content-center align-items-center my-3 mx-auto w-100">
                <h4 class="text-center text-secondary">Role</h4>

                <div class="d-flex flex-row justify-content-around  w-100">

                  <div class="p-3">
                    <input type="radio" value="client" name="role" required />
                    <label>Client</label>
                  </div>
                  <div class="p-3">
                    <input type="radio" value="vendeur" name="role" required />
                    <label>Vendeur</label>
                  </div>
                </div>

              </div>

              <div class="form-floating mb-3">
                <input name="firstName" type="text" class="form-control" placeholder="Prénom" required minlength="2" />
                <label>Prénom</label>
              </div>
              <div class="form-floating mb-3">
                <input name="lastName" type="text" class="form-control" placeholder="nom" required minlength="2" />
                <label>Nom</label>
              </div>
              <div class="form-floating mb-3">
                <input name="tel" type="tel" class="form-control" placeholder="+2217XXXXXXXX" required minlength="13" />
                <label>Numéro de téléphone</label>
              </div>

              <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control" placeholder="Email" required minlength="11" />
                <label>Email</label>
              </div>

              <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control" placeholder="Password" required minlength="4" maxlength="256" />
                <label>Mot de passe</label>
              </div>
              <div class="form-floating mb-3">
                <input name="confirmation" type="password" class="form-control" placeholder="Confirmation" required minlength="4" maxlength="256" />
                <label>Confirmation du mot de passe</label>
              </div>
              <p id="signup-error" class="d-none text-center my-2 h6 text-danger"></p>
              <button class="btn btn-success w-100 py-2">S'inscrire</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </main>

  <?php require __DIR__ . "/../../components/foooter.php" ?>

  <script src="signin.js"></script>
  <script src="../../bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
