<?php require 'header.php'; ?>
<link rel="stylesheet" href="../css/update.css">
<?php require 'db-connect.php'; ?>
<a href="menu.php">メニューに戻る</a>
<hr>
<?php
	$pdo=new PDO($connect,USER,PASS);
	$id = $_GET['id'];
	$sql = $pdo->query(
		"SELECT * FROM Shinkansen
			LEFT JOIN Category
			ON Shinkansen.category_id = Category.category_id
			WHERE Shinkansen.shinkansen_id = $id
		"
	);
	$sql2=$pdo->query('select * from Category');
	$res = $sql->fetch(PDO::FETCH_ASSOC);
?>
<form action="update-output.php?id=<?=$id?>" method="POST" enctype="multipart/form-data">
名前<br><input type="text" name="name" value="<?php
	if (isset($res['name'])) {
		echo $res['name'];
	}
?>"><br>
説明<br><textarea name="explanation" cols="130" rows="4"><?php
	if (isset($res['explanation'])) {
		echo $res['explanation'];
	}
?></textarea><br>
画像<br><input type="file" name="upload_image" accept="image/*" value="<?php
	if (isset($res['image'])) {
		echo $res['image'];
	}
?>"><br>
使用車両<br><input type="text" name="vehicle" value="<?php
	if (isset($res['vehicle'])) {
		echo $res['vehicle'];
	}
?>"><br>
停車駅<br><textarea name="stop" cols="130" rows="4"><?php
	if (isset($res['stop'])) {
		echo $res['stop'];
	}
?></textarea><br>
座席の種類<br><textarea name="zaseki" cols="130" rows="4"><?php
	if (isset($res['zaseki'])) {
		echo $res['zaseki'];
	}
?></textarea><br>
コンセントの有無<br><textarea name="outlet" cols="130" rows="4"><?php
	if (isset($res['outlet'])) {
		echo $res['outlet'];
	}
?></textarea><br>
車内販売<br><input type="text" name="hanbai" value="<?php
	if (isset($res['hanbai'])) {
		echo $res['hanbai'];
	}
?>"><br>
カテゴリー<br><select name="category" >
<option value="<?php
						if (isset($res['category_id'])) {
							echo $res['category_id'];
						}
						?>" selected hidden><?php
						if (isset($res['category_name'])) {
							echo $res['category_name'];
						}
						?></option>
<?php 
foreach($sql2 as $row){
    echo '<option value="',$row['category_id'],'">',$row['category_name'],'</option>';
}
?>
</select><br>
<input type="submit" class="submit" value="更新">
</form>
<button onclick="location.href='delete.php?id=<?=$id?>'">削除
<?php require 'footer.php'; ?>