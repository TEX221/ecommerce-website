<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");

ini_set("display_errors", 0);

if ($_SERVER['REQUEST_METHOD'] === "OPTIONS") {
  http_response_code(200);
  exit;
}

if (isset($_SESSION['user'])) {
  header('Location: /');
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


if ($_SERVER['REQUEST_METHOD'] === "POST") {
  try {
    $email = htmlspecialchars($_POST['email'] ?? '');
    $password = htmlspecialchars($_POST['password'] ?? '');
    if ($email && $password) {
      require __DIR__ . "/../utils/connexion_db.php";
      logIn($pdo, $email, $password);
    } else {
      echo json_encode([
        "message" => "Tous les champs sont obligatoires !",
        "success" => false
      ]);
    }
  } catch (Exception $e) {
    echo json_encode([
      "message" => "Erreur coté serveur",
      "success" => false
    ]);
    error_log("\n- login.php ->", 3, "./error_log.log");
  }
}

function logIn(PDO &$pdo, string $email, string $password)
{
  $sql = "
    SELECT 
        idUser, firstName, lastName, email, tel,  password, role
    FROM Users
    WHERE email = :email
  ";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    "email" => $email
  ]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  // si un utilisateur avec un tel email n'existe pas.
  if (empty($user)) {
    echo json_encode([
      "message" => "Un utilisateur avec un tel email n'existe pas, éssayez de créer un compte !",
      "success" => false
    ]);
  } else {
    $passwordHash = $user['password'];
    // Si le mot de passe est incorrect .
    if (!password_verify($password, $passwordHash)) {
      echo json_encode([
        "message" => "Le mot de passe est incorrect !",
        "success" => false
      ]);
      exit;
    }
    // le mot de passe est donc correct.
    $_SESSION['idUser'] = $user['idUser'];
    $_SESSION['firstName'] = $user['firstName'];
    $_SESSION['lastName'] = $user['lastName'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['tel'] = $user['tel'];
    $_SESSION['role'] = $user['role'];

    // j'enregistre la session. 
    echo json_encode([
      "message" => "Connexion réussie",
      "success" => true
    ]);
  }
}
