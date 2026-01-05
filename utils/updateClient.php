<?php

ini_set("display_errors", 0);
ini_set('log_errors', 1);
ini_set('error_log', './php_error.log');
error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === "OPTIONS") {
  http_response_code(200);
  exit;
}

$duration = 15 * 24 * 60 * 60;

// configuration de la durée de la session pour 15 jours.
session_set_cookie_params([
  'lifetime' => $duration,
  'path'     => '/',
  'secure'   => true,   // true si HTTPS
  'httponly' => true,
  'samesite' => 'Lax'
]);
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    $idUser = $_SESSION['idUser'] ?? '';
    $firstName = trim($_POST['firstName'] ?? '');
    $lastName = trim($_POST['lastName'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $tel = trim($_POST['tel'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $passwordConfirmation = trim($_POST['confirmation'] ?? '');

    if (
      $idUser && $firstName && $lastName && $email
      && $tel && $password && $passwordConfirmation
    ) {
      if ($password !== $passwordConfirmation) {
        echo json_encode([
          'message' => 'les deux mots de passe ne correspondent pas !',
          'success' => false
        ]);
        exit;
      }
      require __DIR__ . '/../utils/connexion_db.php';
      require __DIR__ . '/../client/traitementClient.php';
      updateClient($pdo, $idUser, $firstName, $lastName, $email, $tel, $password);
      $_SESSION['firstName'] = $firstName;
      $_SESSION['lastName'] = $lastName;
      $_SESSION['email'] = $email;
      $_SESSION['tel'] = $tel;
      echo json_encode([
        'message' => 'Votre compte a ete modifie.',
        'success' => true
      ]);
    } else {
      echo json_encode([
        'message' => "Tous les champs sont obligatoires $firstName $lastName $idUser $email $tel $password !",
        'success' => false
      ]);
    }
  } catch (Exception $e) {
    error_log("\n updateClient.php -> " . $e->getMessage(), 3, '../utils/error_log.log');
    echo json_encode([
      'message' => 'Erreur cote serveur !',
      'success' => false
    ]);
  }
}
