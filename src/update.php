<?php require 'header.php'; ?>
<?php require 'db-connect.php'; ?>
<a href="menu.php">メニューに戻る</a>
<hr>
<?php $pdo=new PDO($connect,USER,PASS) ?>;
<?php
	$id = $_GET['id'];
	$sql = $db->query(
		"SELECT * FROM Shinkansen
			LEFT JOIN Category
			ON Shinkansen.category_id = Category.category_id
		"
	);
	$sql2=$pdo->query('select * from Category');
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
停車駅<textarea name="stop" value="<?php
	if (isset($res['stop'])) {
		echo $res['stop'];
	}
?>"></textarea><br>
座席の種類<input type="text" name="zaseki" value="<?php
	if (isset($res['zaseki'])) {
		echo $res['zaseki'];
	}
?>"><br>
コンセントの有無<textarea name="outlet" value="<?php
	if (isset($res['outlet'])) {
		echo $res['outlet'];
	}
?>"></textarea><br>
車内販売<input type="text" name="hanbai" value="<?php
	if (isset($res['hanbai'])) {
		echo $res['hanbai'];
	}
?>"><br>
カテゴリー<select name="category" >
<option value="<?php
						if (isset($res['category_id'])) {
							echo $res['category_id'];
						}
						?>" selected hidden><?php
						if (isset($res['category_name'])) {
							echo $res['category_name'];
						}else{
							echo 'ねーよ！！';
						}
						?></option>
<?php 
foreach($sql2 as $row){
    echo '<option value="',$row['category_id'],'">',$row['category_name'],'</option>';
}
?>
</select>
<input type="submit" value="更新">
</form>
<button onclick="location.href='delete_output.php?id=<?=$id?>'">削除
<?php require 'header.php'; ?>