<?php require 'header.php' ?>
<?php require 'db-connect.php'; ?>
<link rel="stylesheet" href="../css/delete.css">
<?php
    $pdo=new PDO($connect,USER,PASS);
    $id = $_GET['id'];
	
    $stmt = $pdo->prepare("DELETE FROM Shinkansen 
                            WHERE Shinkansen_id = $id ");
    $stmt->execute();
?>
	<br><br><br><br>
	<h1>削除しました。</h1>
	<br><br>
	<button type="button" onclick="location.href='product.php'">一覧へ戻る</button>
</html>