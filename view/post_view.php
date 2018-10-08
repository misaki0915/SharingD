<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./css/common.css">
  <link rel="stylesheet" href="./css/post.css">
  <title>ユーザーページ</title>
</head>
<body>
  <header>
    <div class="login">
      <p class="nemu">[<?php print $_SESSION['user_id']; ?>]でログイン中</p>
      <a href="./top.php" class="square_btn_gr">Topへ</a>
      <a href="./user_page.php" class="square_btn_gr">ユーザーページ</a>
      <a href="./logout.php" class="square_btn">ログアウト</a>
    </div>
    <h1>Sharing Dictionary</h1>
  </header>
  <hr>
  <?php foreach ($err_msg as $value) { ?>
    <p><span class="red"><?php print $value; ?></span></p>
  <?php } ?>
  <div class="user_post">
    <h2>新しい用語を入力</h2>
    <form method="post">
      <h3>用語名：</h3><input type="text" class="form_name" name="word_name">
      <h3>簡単に説明すると：</h3><input type="text" class="form_simple" name="word_simple">
      <h3>詳しく説明すると：</h3><textarea class="form_description" name="word_description" cols="50" rows="10" wrap="soft"></textarea>
      <input class="square_btn" type="submit" name="submit" value="登録">
    </form>
  </div>
</body>
</html>
