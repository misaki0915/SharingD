<?php
function check_user_login($url_root = "") {
  if (isset($_SESSION['user_id']) !== TRUE) {
    redirect_login_page();
  }
}

function redirect_login_page() {
  $url_root = dirname($_SERVER["REQUEST_URI"]).'/';
   header('Location: '.(empty($_SERVER["HTTPS"]) ? "http://" : "https://"). $_SERVER['HTTP_HOST'] . $url_root . 'logout_set.php');
   exit();
}

function entity_str($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function entity_assoc_array($assoc_array) {
  foreach ($assoc_array as $key => $value) {
    foreach ($value as $keys => $values) {
      $assoc_array[$key][$keys] = entity_str($values);
    }
  }
  return $assoc_array;
}

function check_number($number) {
  if (preg_match('/\A\d+\z/', $number) === 1 ) {
    return true;
  } else {
    return false;
  }
}

function get_post_data($key) {
  $str = '';
  if (isset($_POST[$key]) === TRUE) {
   $str = $_POST[$key];
  }
  return $str;
}

function trim_space($str) {
  return preg_replace('/\A[　\s]*|[　\s]*\z/u', '', $str);
}

function get_db_connect($dsn, $username, $password) {
  $dbh = null;
  try {
    $dbh = new PDO($dsn, $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  } catch (PDOException $e) {
    throw $e;
  }
  return $dbh;
}

?>
