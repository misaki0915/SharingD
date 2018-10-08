<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>ユーザーページ</title>
  <link type="text/css" rel="stylesheet" href="./css/common.css">
  <link type="text/css" rel="stylesheet" href="./css/user_page.css">
</head>
<body>
  <header>
    <div class="login">
      <p class="nemu">[<?php print $_SESSION['user_id']; ?>]でログイン中</p>
      <a href="./top.php" class="square_btn_gr">Topへ</a>
      <a href="./logout.php" class="square_btn">ログアウト</a>
    </div>
    <h1>Sharing Dictionary</h1>
  </header>
  <hr>
  <a href="post.php" class="part_line">
	  <i class="fa fa-caret-right"></i> ▶︎新しく用語を投稿する
  </a>
  <h2>◉あなたが過去に投稿した用語</h2>
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
