<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<a href="menu.php">メニューに戻る</a>
<hr>
<form action="insert-output.php" method="post" enctype="multipart/form-data">
<?php
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->query('select * from Category');
?>
<span>名前</span><input type="text" name="name" required><br>
<span>説明</span><textarea name="explanation" cols="130" rows="4" required></textarea><br>
<span>画像</span><input type="file" name="upload_image" accept="image/*" required><br>
<span>使用車両</span><input type="text" name="vehicle" required><br>
<span>停車駅</span><textarea name="stop" cols="130" rows="4" required></textarea><br>
<span>座席の種類</span><textarea name="zaseki" cols="130" rows="4" required></textarea><br>
<span>コンセントの有無</span><textarea name="outlet" cols="130" rows="4" required></textarea><br>
<span>車内販売</span><input type="text" name="hanbai" required><br>
<span>カテゴリー</span><select name="category" required>
<option value="" selected hidden required>選択してください</option>
<?php 
foreach($sql as $row){
    echo '<option value="',$row['category_id'],'">',$row['category_name'],'</option>';
}
?>
</select><br>
<input type="submit" value="登録">
<?php require 'footer.php'; ?>