<?php
require_once('dbconnect.php');

$sql = sprintf('DELETE FROM items WHERE id=%d',
    mysqli_real_escape_string($db, $_REQUEST['id'])
);
mysqli_query($db, $sql) or die(mysqli_error($db));
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>商品管理</title>
</head>
<body>
<div id="wrap">
	<div id="head"><h1>商品の情報を削除</h1></div>

	<div id="content">
    <p>商品の情報を削除しました</p>
    <p><a href="index.php">一覧に戻る</a></p>
	</div>
</div>
</body>
</html>