<?php
require_once './conf/const.php';
require_once './model/common.php';

$sql     = '';
$data    = array();
$err_msg = array();
$sql_kind   = '';
$result_msg = '';
$dbh        = null;

session_start();
check_user_login();

try {
  $dbh = get_db_connect($DSN, $USER, $PASSWD);
} catch (PDOException $e) {
  $err_msg[] = 'エラーが発生しました。管理者へお問い合わせください。'.$e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $word_name = $_POST['word_name'];
  $word_simple = $_POST['word_simple'];
  $word_description = $_POST['word_description'];
  if (empty($_POST["word_name"])) {
    $err_msg[] = '用語名が未記入です。';
  }
  if (empty($_POST["word_simple"])) {
    $err_msg[] = '簡潔説明が未入力です。';
  }
    if (empty($_POST["word_description"])) {
    $err_msg[] = '詳細が未入力です。';
  }
  if ($_POST['word_name'] !== "") {
    if ($_POST['word_simple'] !== "") {
      if ($_POST['word_description'] !== "") {
      try {
        $dbh = new PDO($DSN, $USER, $PASSWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'));
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $date = date('Y-m-d H:i:s');
        $user_id = $_SESSION['user_id'];
        $sql = "INSERT INTO word(word_name,word_simple,word_description,user_id,create_datetime) VALUES (?,?,?,?,?)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $word_name,    PDO::PARAM_STR);
        $stmt->bindValue(2, $word_simple,    PDO::PARAM_STR);
        $stmt->bindValue(3, $word_description,    PDO::PARAM_STR);
        $stmt->bindValue(4, $user_id,    PDO::PARAM_INT);
        $stmt->bindValue(5, $date,    PDO::PARAM_STR);
        $stmt->execute();
        echo "登録しました";
      } catch (PDOException $e) {
        $err_msg[] = 'エラー'; //エラー文要修正
      }
      }
    }
  }
} else {
  $error_msg[] = '不正なリクエストです';
}

include_once './view/post_view.php';
?>
