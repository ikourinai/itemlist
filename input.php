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
		<p>登録する商品の情報を記入してください。</p>
		<form id="frmInput" name="frmInput" method="post" action="input_do.php">
			<dl>
			<dt><label for="maker_id">メーカーID</label></dt>
			<dd>
				<input name="maker_id" type="text" id="maker_id" size="10" 	maxlength="10" />
			</dd>
			<dt><label for="item_name">商品名</label></dt>
			<dd>
				<input name="item_name" type="text" id="item_name" size="35" maxlength="255" />
			</dd>
			<dt><label for="price">価格（円）</label></dt>
			<dd>
				<input name="price" type="text" id="price" size="10" maxlength="10" />
			</dd>
			<dt><label for="keyword">キーワード</label></dt>
			<dd>
				<input name="keyword" type="text" id="keyword" size="50" maxlength="255" />
			</dd>
			</dl>
			<div><input type="submit" value="登録する" /></div>
		</form>
	</div>
</div>

<script>
        document.getElementById("frmInput").addEventListener("submit", function(event) {
            let price = document.getElementById("price").value;
            
            if (!/^\d+$/.test(price) || parseInt(price, 10) < 1) {
                alert("価格は1以上の整数を入力してください。");
                event.preventDefault(); // フォーム送信を阻止
            }
        });
    </script>
</body>
</html>