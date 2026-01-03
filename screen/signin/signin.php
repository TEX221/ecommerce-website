<?php

if (isset($_SESSION['userId'])) {
  header('Location: /');
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../bootstrap-5.3.8-dist/css/bootstrap.min.css" />
</head>

<body class="bg-light">

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

            <form method="post" class="login-form">
              <div class="form-floating mb-3">
                <input type="email" class="form-control" placeholder="email">
                <label>Email</label>
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" placeholder="password">
                <label>Mot de passe</label>
              </div>

              <button class="btn btn-primary w-100 py-2">Se connecter</button>
            </form>
          </div>

          <!-- REGISTER -->
          <div class="tab-pane fade" id="register">
            <h4 class="text-center mb-3">Créer un compte ✨</h4>

            <form method="post" class="signup-form">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" placeholder="firstName">
                <label>Prénom </label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" placeholder="lastName" />
                <label>Nom </label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" placeholder="email">
                <label>Email</label>
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" placeholder="password">
                <label>Mot de passe</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" placeholder="Confirmation">
                <label>Confirmation du mot de passe</label>
              </div>
              <p class="error-message d-none text-center h4  text-danger"></p>
              <button class="btn btn-success w-100 py-2">S'inscrire</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="./signin.js"></script>
  <script src="../bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
