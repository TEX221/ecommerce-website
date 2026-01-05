<?php
function getClients(PDO &$pdo)
{

  $sql =  "
    SELECT 
      idUser, firstName, lastName, email, tel, role 
    FROM 
      Users 
    WHERE 
        role = 'client'";
  try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $clients;
  } catch (Exception $e) {
    error_log("\n " . $_SERVER['PHP_SELF'] . $e->getMessage(), 3, "../utils/error_log.log");
    return null;
  }
}
function updateClient(PDO &$pdo, int $idUser, string $firstName, string $lastName, string $email, string $tel, string $password)
{
  $sql = "UPDATE 
        Users 
        SET firstName = :firstName, lastName = :lastName, email = :email , tel = :tel, password = :passwordHash
        WHERE idUser = :idUser
        ";
  try {
    $stmt = $pdo->prepare($sql);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $user = [
      'firstName' => $firstName,
      'lastName' => $lastName,
      'email' => $email,
      'tel' => $tel,
      'idUser' => $idUser
    ];
    $stmt->execute([
      ...$user,
      'passwordHash' => $passwordHash
    ]);
  } catch (Exception $e) {
    error_log("\n traitement.php -> " . $e->getMessage(), 3, '../utils/error_log.log');
  }
}
