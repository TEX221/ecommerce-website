<?php
ini_set('display_errors', 0);
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] === "OPTIONS") {
  http_response_code(200);
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  try {
  } catch (Exception $e) {
    echo json_encode([
      "message" => "Erreur coté serveur",
      "success" => false
    ]);
  }
}

function logIn(string $email, string $password) {}
