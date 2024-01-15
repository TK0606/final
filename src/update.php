<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<a href="menu.php">メニューに戻る</a>
<hr>
<?php $pdo=new PDO($connect,USER,PASS) ?>;
<?php
	$id = $_GET['id'];
	$sql = $db->query(
		"SELECT * FROM Shinkansen
			LEFT JOIN Categories
			ON Shinkansen.category_id = Categories.category_id
			WHERE Shinkansen.product_id = $id
		"
	);
	$res = $sql->fetch(PDO::FETCH_ASSOC);
?>
<form action="update_output.php?id=<?=$id?>" method="POST" enctype="multipart/form-data">
名前<input type="text" name="name" value="<?php
	if (isset($res['name'])) {
		echo $res['name'];
	}
?>"><br>
説明<textarea name="explanation" value="<?php
	if (isset($res['explanation'])) {
		echo $res['explanation'];
	}
?>"></textarea><br>
画像<input type="file" name="upload_image" accept="image/*" value="<?php
	if (isset($res['image'])) {
		echo $res['image'];
	}
?>"><br>
使用車両<input type="text" name="vehicle" value="<?php
	if (isset($res['vehicle'])) {
		echo $res['vehicle'];
	}
?>"><br>
<input type="submit" value="更新">
<button class="shohin" onclick="location.href=\'goods_update.php\?id=' . $row['product_id'] . '\'">
<?php require 'header.php'; ?>