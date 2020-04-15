<?php

// -----------------ここを追記--------------------
// 登録データ取得
$post_datas = $action->getDbPostData();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>掲示板</title>
</head>
<body>
	<h1>掲示板</h1>
	<!-- 入力エリア -->
	<div class="input_area">
		<form action="./index.php" method="post" id="contact_form">
			<dl class="name">
				<dt>名前</dt>
				<dd><input type="text" name="name" value=""></dd>
			</dl>
			<dl class="email">
				<dt>メールアドレス</dt>
				<dd><input type="text" name="email" value=""></dd>
			</dl>
			<dl class="body">
				<dt>本文</dt>
				<dd><textarea name="body"></textarea></dd>
			</dl>
			<input type="hidden" name="eventId" value="save">
			<input type="submit" value="送信">
		</form>
	</div>
	<!-- //入力エリア -->
	<hr>

	<!-- 投稿表示エリア -->
	<!-- ココから変更-------------------------- -->
	<?php if (!empty($post_datas)) {?>
	<div class="list">
		<?php foreach ($post_datas as $post) { ?>
		<div class="item">
			<div class="name"><?php if (!empty($post["email"])) {?><a href="mailto:<?php echo $post["email"];?>"><?php } ?><?php echo $post["name"];?><?php if (!empty($post["email"])) {?></a><?php } ?></div>
			<div class="body"><?php echo nl2br($post["body"]);?></div>
			<div class="date"><?php echo $post["created_at"];?></div>
		</div>
		<?php } ?>
	</div>
	<?php } ?>
	<!-- // 投稿表示エリア -->
</body>
</html>
