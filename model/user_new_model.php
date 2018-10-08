<?php
function REGISTER_user() {
  try {
    $dbh = new PDO($DSN, $USER, $PASSWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = "INSERT INTO user_data(user_id, user_pass) VALUES (?,?)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $user_id,    PDO::PARAM_INT);
    $stmt->bindValue(2, $user_pass,    PDO::PARAM_INT);
    $stmt->execute();
  } catch (PDOException $e) {
    $err_msg[] = '既に使われているIDです'; //エラー文修正の必要あり
  }
}
?>
