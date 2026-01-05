<?php
session_start();

if (!isset($_SESSION['idUser'])) {
  header('Location: /ecommerce-website/screen/signin/signin.php');
  exit;
}


$role = $_SESSION['role'] ?? '';
if ($role === 'admin') {
  header('Location: admin/index.php');
} else if ($role === 'vendeur') {
  header('Location: vendeur/index.php');
} else {
  header('Location: client/index.php');
}
