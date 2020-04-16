<?php
require_once("./properties.php");
require_once('./getFormAction.php');

$action = new getFormAction();

$eventId = null;
// イベントID取得
if (isset($_POST['eventId'])) {
	$eventId = $_POST['eventId'];
}

switch ($eventId) {

	// データベース保存
	case 'save':

		$action->saveDbPostData($_POST);
		require("./post.php");
		break;

	// 初回アクセス時、投稿画面表示
	default:
		require("./post.php");
		break;
}
?>
