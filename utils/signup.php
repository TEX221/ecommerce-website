<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");

ini_set("display_errors", 0);

if ($_SERVER['REQUEST_METHOD'] === "OPTIONS") {
  http_response_code(200);
  exit;
}

session_start();
if (isset($_SESSION['idUser'])) {
  header('Location: /ecommerce-website/');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  try {
    $firstName = filter_var($_POST['firstName'] ?? '');
    $lastName = filter_var($_POST['lastName'] ?? '', FILTER_SANITIZE_STRING);
    $email = htmlspecialchars($_POST['email'] ?? '');
    $password = htmlspecialchars($_POST['password'] ?? '');
    $passwordConfirmation = htmlspecialchars($_POST['confirmation'] ?? '');
    $tel = htmlspecialchars($_POST['tel'] ?? '');
    $role = htmlspecialchars($_POST['role'] ?? '');

    if (
      $firstName && $lastName
      && $email && $tel && $password
      && $passwordConfirmation && $role
    ) {
      if ($password !== $passwordConfirmation) {
        echo json_encode([
          "message" => "Les deux mots de passe ne correspondent pas !",
          "success" => false
        ]);
        exit;
      }
      if (!in_array($role, ['client', 'vendeur'], true)) {
        echo json_encode([
          "message" => "Erreur le roe de l'utlisateur doit être soit client ou vendeur !",
          "success" => false
        ]);
        exit;
      }
      require __DIR__ . "/../utils/connexion_db.php";
      // je vérifie si un utlisateur avec de tel identtifiant exist déja.
      $sql = "SELECT * FROM Users WHERE tel = :tel OR email = :email";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        "tel" => $tel,
        "email" => $email
      ]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      if (!empty($user)) {
        echo json_encode([
          "message" => "Un utlisateur avec ces mêmes idtentifiants existe déja !",
          "success" => true
        ]);
        exit;
      } else {
        signUp($pdo, $firstName, $lastName, $email, $tel, $password, $role);
      }
      echo json_encode([
        "message" => "Votre compte a été créé avec succes !",
        "success" => true
      ]);
    } else {
      echo json_encode([
        "message" => "Tous les champs sont obligatoires",
        "success" => false
      ]);
      throw new Exception("signup.php -> Error some variables are null !");
    }
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
      "message" => "Erreur coté serveur !",
      "success" => false
    ]);
    error_log("-\n signup.php " . $e->getMessage(), 3, "./error_log.log");
  }
}

function signUp(PDO &$pdo, string $firstName, string $lastName, string $email, string $tel, string $password, string $role)
{
  $sql = "
        INSERT INTO Users(firstName, lastName, email, tel, password, role) 
      VALUES (:firstName, :lastName, :email, :tel, :password, :role) ";

  $stmt = $pdo->prepare($sql);
  // je hashe le mot de passe 
  $passwordHash = password_hash($password, PASSWORD_DEFAULT);
  $stmt->execute([
    "firstName" => $firstName,
    "lastName" => $lastName,
    "email" => $email,
    "tel" => $tel,
    "password" => $passwordHash,
    "role" => $role
  ]);
}
