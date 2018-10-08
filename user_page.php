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
    $dbh = new PDO($DSN, $USER, $PASSWD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM word WHERE user_id = ? ORDER BY create_datetime DESC;";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $user_id,    PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll();
  } catch (PDOException $e) {
    echo '接続できませんでした。理由：'.$e->getMessage();
  }

include_once './view/user_page_view.php';

?>
