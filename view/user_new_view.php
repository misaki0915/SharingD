<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./css/common.css">
  <link rel="stylesheet" href="./css/user_new.css">
  <title>ユーザ登録</title>
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
    <p><span class="red">・<?php print $value; ?></span></p>
  <?php } ?>
  <hr>
  <h2>ユーザー登録</h2>
  <div class="user_login">
    <form method="post">
      <label>ユーザー名：<input type="text" name="user_id" pattern="^[0-9A-Za-z]+$"></label>
      <p>登録するIDを入力してください　※半角英数</p><br>
      <label>パスワード：<input type="password" name="user_pass"></label>
      <p>登録するパスワードを入力してください</p>
      <input class="square_btn" type="submit" name="submit" value="登録">
    </form>
  </div>
  <p><a href="login.php">既に登録している人はこちら</a></p>
</body>
</html>
