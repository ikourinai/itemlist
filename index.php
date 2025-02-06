<?php
    require_once('dbconnect.php');

    $recordSet = mysqli_query($db, 'SELECT m.name, i.* FROM makers m, items i WHERE m.id=i.maker_id ORDER BY id DESC');
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
	<div id="head"><h1>商品管理</h1></div>

	<div id="content">
    <p><a href="input.php">商品を登録する</a></p>
        <table width="100%">
            <tr>   
                <th scope="col">ID</th>
                <th scope="col">メーカー</th>
                <th scope="col">商品名</th>
                <th scope="col">価格</th>
                <th scope="col">編集・削除</th>
            </tr>
        <?php
        while ($table = mysqli_fetch_assoc($recordSet)){
        ?>
            <tr>
                <td><?php print(htmlspecialchars($table['id'])); ?></td>
                <td><?php print(htmlspecialchars($table['name'])); ?></td>
                <td><?php print(htmlspecialchars($table['item_name'])); ?></td>
                <td><?php print(htmlspecialchars($table['price'])); ?></td>
                <td><a href="update.php?id=<?php print(htmlspecialchars($table['id'])); ?>">編集</a> <a href="delete.php?id=<?php print(htmlspecialchars($table['id'])); ?>">削除</a></td>
            </tr>
        <?php
        }
        ?>
        </table>
	</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    // すべての削除リンクに対して処理を設定
    document.querySelectorAll("a[href^='delete.php']").forEach(function (link) {
        link.addEventListener("click", function (event) {
            // 確認アラートを表示
            if (!confirm("本当に削除しますか？")) {
                event.preventDefault(); // キャンセル時は処理を中断
            }
        });
    });
});
</script>
</body>
</html>