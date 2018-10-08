<?php
require_once './conf/const.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $user_id = $_POST['user_id'];
  $user_pass = $_POST['user_pass'];
  if (empty($_POST["user_id"])) {
    $err_msg[] = 'ユーザーIDが未入力です。';
  }
  if (empty($_POST["user_pass"])) {
    $err_msg[] = 'パスワードが未入力です。';
  }
  if ($_POST['user_id'] !== "") {
    if ($_POST['user_pass'] !== "") {
      try {
        $dbh = new PDO($DSN, $USER, $PASSWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'));
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $sql = "INSERT INTO user_data(user_id, user_pass) VALUES (?,?)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $user_id,    PDO::PARAM_INT);
        $stmt->bindValue(2, $user_pass,    PDO::PARAM_INT);
        $stmt->execute();
        header( "Location: ./user_new_registered.php" ) ;
	    exit ;
      } catch (PDOException $e) {
        $err_msg[] = '既に使われているIDです'; //エラー文修正の必要あり
      }
    }
  }
} else {
  $error_msg[] = '不正なリクエストです';
}

include_once './view/user_new_view.php';

?>
