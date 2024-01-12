    <?php require 'header.php'; ?>
	<?php require 'db-connect.php'; ?>
	<?php
	$pdo=new PDO($connect,USER,PASS);
	$sql=$pdo->prepare('insert into Shinkansen Values (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
	$sql->execute([$_POST['name'], $_POST['explanation'], $_POST['upload_image'], $_POST['vehicle'], 
        $_POST['stop'], $_POST['zaseki'], $_POST['outlet'], $_POST['hanbai'], $_POST['category']]);
    $getfrommysql = mysql_fetch_assoc(mysql_query('SELECT * FROM Category'));
    $data = array();
    $i = 1;
    foreach($getfrommysql as $value) {
    // 一応データをパースする
    $data[$i] = htmlspecialchars(trim(urldecode(mb_convert_encoding($value, 'UTF-8', 'auto'))));
    $i++;
    echo '<h1>登録しました</h1>';


		echo '名前：', $_POST['name'],'<br>';
		echo '説明：', $_POST['explanation'] ,'<br>';
		echo '画像：', $_POST['upload_image'],'<br>';
		echo '使用車両：', $_POST['vehicle'],'<br>';
		echo '停車駅：', $_POST['stop'],'<br>';
        echo '座席の種類：', $_POST['zaseki'],'<br>';
        echo 'コンセントの有無：', $_POST['outlet'],'<br>';
        echo '車内販売：', $_POST['hanbai'],'<br>';
        echo 'カテゴリ：', $data[$i],'<br>';
    }
    
    ?>
	<br><br><br>
    <input type="button" class="button" onclick="location.href='insert.php'" value="続けて登録する">
    
    <?php require 'footer.php'; ?>