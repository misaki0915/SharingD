<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link type="text/css" rel="stylesheet" href="./css/common.css">
  <link type="text/css" rel="stylesheet" href="./css/login.css">
</head>
<body>
  <header>
    <div class="login">
      <a href="user_new.php" class="square_btn">新規登録</a>
      <a href="login.php" class="square_btn">Login</a>
    </div>
    <a href="./index.php">
      <h1>Sharing Dictionary</h1>
    </a>
  </header>
  <?php foreach ($err_msg as $value) { ?>
    <p><span class="red"><?php print $value; ?></span></p>
  <?php } ?>
  <hr>
  <h2>Login</h2>
  <div class="user_login">
    <form method="post" action="./login.php">
      <p> ユーザー名：<input type="text" name="user_id" placeholder="ユーザー名"></p><br>
      <p>パスワード：<input type="password" name="user_pass" placeholder="パスワード"></p>
      <input class="square_btn" type="submit" value="ログイン">
    </form>
  </div>
</body>
</html>
