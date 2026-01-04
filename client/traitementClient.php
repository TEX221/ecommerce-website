<?php
function getClients(PDO &$pdo)
{
  try {
    $sql =  "
    SELECT 
      idUser, firstName, lastName, email, tel, role 
    FROM 
      Users 
    WHERE 
        role = 'client'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $clients;
  } catch (Exception $e) {
    error_log("\n " . $_SERVER['PHP_SELF'] . $e->getMessage(), 3, "../utils/error_log.log");
    return null;
  }
}
