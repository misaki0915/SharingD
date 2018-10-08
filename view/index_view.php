<!DOCTYPE html>
<html lang="ja">
<head>
  <link rel="stylesheet" href="./css/common.css">
  <link rel="stylesheet" href="./css/index.css">
  <meta charset="UTF-8">
  <title>Sharing Dictionary</title>
</head>
<body>
  <header>
    <div class="login">
      <a href="user_new.php" class="square_btn">新規登録</a>
      <a href="login.php" class="square_btn">Login</a>
    </div>
    <h1>Sharing Dictionary</h1>
  </header>
  <h2>◉Sharing Dictionaryとは？</h2>
  <p>　用語の意味をみんなで解説しあえるWebサービスです</p>
  <h3>新規投稿一覧</h3>
  <hr class="word">
  <?php foreach($rows as $row){ ?>
    <div class="word_box">
      <h4><?php echo htmlspecialchars($row['word_name'],ENT_QUOTES,'UTF-8'); ?></h4>
      <div class="word_box_statement_simple">
        <span class="box-title">簡単に説明すると：</span>
        <p><?php echo htmlspecialchars($row['word_simple'],ENT_QUOTES,'UTF-8'); ?></p>
      </div>
      <div class="word_box_statement">
        <span class="box-title">詳しく説明すると：</span><p><?php echo htmlspecialchars($row['word_description'],ENT_QUOTES,'UTF-8'); ?></p>
      </div>
      <p class="status">投稿者：<?php echo htmlspecialchars($row['user_id'],ENT_QUOTES,'UTF-8'); ?></p>
      <p class="status">投稿日時：<?php echo htmlspecialchars($row['create_datetime'],ENT_QUOTES,'UTF-8'); ?></p>
    </div>
    <hr class="word">
  <?php } ?>
</body>
</html>
