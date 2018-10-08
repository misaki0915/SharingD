<?php
require_once './conf/const.php';
require_once './model/common.php';
session_start();
$session_name = session_name();
$_SESSION = array();
if (isset($_COOKIE[$session_name])) {
  setcookie($session_name, '', time() - 42000);
}
session_destroy();
redirect_login_page();
?>
