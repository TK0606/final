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
<input type="submit" value="更新">
<?php require 'header.php'; ?>