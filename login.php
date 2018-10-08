<?php
require_once './conf/const.php';
require_once './model/common.php';
require_once './model/login_model.php';

$err_msg    = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_id = '';
  $user_pass = '';
  $user_id = get_post_data('user_id');
  $user_pass = get_post_data('user_pass');
  if ($user_id === '') {
    $err_msg[] = 'ユーザー名を入力してください。';
  }
  if ($user_pass=== '') {
    $err_msg[] = 'パスワードを入力してください。';
  }
  try {
    $dbh = get_db_connect($DSN, $USER, $PASSWD);
  } catch (PDOException $e) {
    $err_msg[] = 'エラーが発生しました。管理者へお問い合わせください。'.$e->getMessage();
  }

  if ($dbh) {
    $result = get_user($dbh, $user_id, $user_pass);
    if ($result) {
      session_start();
      $_SESSION['user_id'] = $user_id;
      $url_root = dirname($_SERVER["REQUEST_URI"]).'/';
      header('Location: http://'. $_SERVER['HTTP_HOST'] . $url_root . 'top.php');
    } else {
      $err_msg[] = 'ユーザー名あるいはパスワードが違います';
    }
  }
}

include_once './view/login_view.php';
?>
