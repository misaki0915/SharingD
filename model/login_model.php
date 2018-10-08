<?php
function get_user($dbh, $user_id, $user_pass) {
  try {
    $sql = 'SELECT * FROM user_data WHERE user_id = ? AND user_pass = ?';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $user_id, PDO::PARAM_STR);
    $stmt->bindValue(2, $user_pass, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll();
  } catch (PDOException $e) {
    throw $e;
  }
  return $rows;
}
?>
