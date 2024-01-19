<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<a href="menu.php">メニューに戻る</a>
<hr>
<form action="insert-output.php" method="post" enctype="multipart/form-data">
<?php
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->query('select * from Category');
?>
名前<input type="text" name="name" required><br>
説明<textarea name="explanation" required></textarea><br>
画像<input type="file" name="upload_image" accept="image/*" required><br>
使用車両<input type="text" name="vehicle" required><br>
停車駅<textarea name="stop" required></textarea><br>
座席の種類<input type="text" name="zaseki" required><br>
コンセントの有無<textarea name="outlet" required></textarea><br>
車内販売<input type="text" name="hanbai" required><br>
カテゴリー<select name="category" required>
<option value="" selected hidden required>選択してください</option>
<?php 
foreach($sql as $row){
    echo '<option value="',$row['category_id'],'">',$row['category_name'],'</option>';
}
?>
</select><br>
<input type="submit" value="登録">
<?php require 'footer.php'; ?>