<?php
    require_once('dbconnect.php');
	
	$id = intval($_REQUEST['id']); // idをリクエストから取得（数値以外をすべて削除）
    $sql = sprintf("SELECT * FROM items WHERE id=%d", $id);//SQL文を作成

    $recordSet = mysqli_query($db, $sql);//SQLを実行、実行結果をリソースとして取得
    $data = mysqli_fetch_assoc($recordSet);//1件分のデータを配列で取得
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
	<div id="head"><h1>商品情報変更</h1></div>

	<div id="content">
		<p>変更する内容を記入してください。</p>
		<form id="frmUpdate" name="frmUpdate" method="post" action="update_do.php">
			<dl>
			<dt><label for="maker_id">メーカーID</label></dt>
			<dd>
				<input name="maker_id" type="text" id="maker_id" size="10" 	maxlength="10" value="<?php print(htmlspecialchars($data['maker_id'], ENT_QUOTES)); ?>" />
			</dd>
			<dt><label for="item_name">商品名</label></dt>
			<dd>
				<input name="item_name" type="text" id="item_name" size="35" maxlength="255" value="<?php print(htmlspecialchars($data['item_name'], ENT_QUOTES)); ?>" />
			</dd>
			<dt><label for="price">価格（円）</label></dt>
			<dd>
				<input name="price" type="text" id="price" size="10" maxlength="10" value="<?php print(htmlspecialchars($data['price'], ENT_QUOTES)); ?>" />
			</dd>
			<dt><label for="keyword">キーワード</label></dt>
			<dd>
				<input name="keyword" type="text" id="keyword" size="50" maxlength="255" value="<?php print(htmlspecialchars($data['keyword'], ENT_QUOTES)); ?>" />
			</dd>
			</dl>
			<div><input type="submit" value="変更する" /></div>
            <input type="hidden" name="id" value="<?php print(htmlspecialchars($data['id'], ENT_QUOTES)); ?>" />
		</form>
	</div>
</div>

<script>
        document.getElementById("frmUpdate").addEventListener("submit", function(event) {
            let price = document.getElementById("price").value;
            
            if (!/^\d+$/.test(price) || parseInt(price, 10) < 1) {
                alert("価格は1以上の整数を入力してください。");
                event.preventDefault(); // フォーム送信を阻止
            }
        });
    </script>
</body>
</html>