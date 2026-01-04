<?php
ini_set("display_errors", 0);

$host = "127.0.0.1";
$port = 3306;
$password = "0540";
$user = "root";
$dbname = "Commerciale";
try {
  $pdo = new PDO(
    "mysql:host=$host;port=$port;dbname=$dbname",
    $user,
    $password
  );
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo json_encode([
    "message" => "Erreur coté serveur, désolée on rencontre un problème !",
    "success" => false
  ]);
  error_log("\n connexion-db.php -> " . $e->getMessage(), 3, "./error_log.log");
}
