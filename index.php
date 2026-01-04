<?php

if (!isset($_SESSION['userId'])) {
  header('Location: screen/signin/signin.php');
  exit;
}


if (isset($_SESSION['role'])) {
  $role = $_SESSION['role'] ?? '';
  if ($role === 'admin') {
    header('Location: admin/index.php');
  } else if ($role === 'vendeur') {
    header('Location: vendeur/index.php');
  } else {
    header('Location: client/index.php');
  }
} else {
  header('Location: screen/signin.php');
}
