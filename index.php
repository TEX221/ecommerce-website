<?php
session_start();

if (!isset($_SESSION['user'])) {
  header('Location: screen/signin/signin.php');
  exit;
}


$role = $_SESSION['user']['role'] ?? '';
if ($role === 'admin') {
  header('Location: admin/index.php');
} else if ($role === 'vendeur') {
  header('Location: vendeur/index.php');
} else {
  header('Location: client/index.php');
}
