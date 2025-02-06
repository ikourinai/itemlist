<?php
require_once('dbconnect.php');

$sql = sprintf('INSERT INTO items SET maker_id=%d, item_name="%s", price=%d, keyword="%s"',
    mysqli_real_escape_string($db, $_POST['maker_id']),
    mysqli_real_escape_string($db, $_POST['item_name']),
    mysqli_real_escape_string($db, $_POST['price']),
    mysqli_real_escape_string($db, $_POST['keyword'])
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
	<div id="head"><h1>商品登録</h1></div>

	<div id="content">
    <p>商品を登録しました</p>
    <p><a href="index.php">一覧に戻る</a></p>
	</div>
</div>
</body>
</html>