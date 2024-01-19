<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<a href="menu.php">メニューに戻る</a>
<hr>
<form action="insert-output.php" method="post" enctype="multipart/form-data">
<?php
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->query('select * from Category');
?>
<p>名前</p><input type="text" name="name" required><br>
<p>説明</p><textarea name="explanation" cols="70" rows="4" required></textarea><br>
<p>画像</p><input type="file" name="upload_image" accept="image/*" required><br>
<p>使用車両</p><input type="text" name="vehicle" required><br>
<p>停車駅</p><textarea name="stop" cols="70" rows="4" required></textarea><br>
<p>座席の種類</p><textarea name="zaseki" cols="70" rows="4" required></textarea><br>
<p>コンセントの有無</p><textarea name="outlet" cols="70" rows="4" required></textarea><br>
<p>車内販売</p><input type="text" name="hanbai" required><br>
<p>カテゴリー</p><select name="category" required>
<option value="" selected hidden required>選択してください</option>
<?php 
foreach($sql as $row){
    echo '<option value="',$row['category_id'],'">',$row['category_name'],'</option>';
}
?>
</select><br>
<input type="submit" value="登録">
<?php require 'footer.php'; ?>