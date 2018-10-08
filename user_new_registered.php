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

try {
  $dbh = get_db_connect($DSN, $USER, $PASSWD);
} catch (PDOException $e) {
  $err_msg[] = 'エラーが発生しました。管理者へお問い合わせください。'.$e->getMessage();
}

include_once './view/user_new_re_view.php';
?>
