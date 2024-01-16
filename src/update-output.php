<?php require 'header.php'; ?>
	<?php require 'db-connect.php'; ?>
	<?php
	$pdo=new PDO($connect,USER,PASS);
    $id = $_GET['id'];
    $uploaddir = '../img/';
    $image_name=$_FILES['upload_image']['name'];
    $uploadfile = $uploaddir . $image_name;
    move_uploaded_file($_FILES['upload_image']['tmp_name'], $uploadfile);
	if($uploadfile) {
		$sql=$pdo->prepare('update Shinkansen set name=?,explanation=?,image=?,vehicle=?,stop=?,zaseki=?,outlet=?,hanbai=?,category_id=? WHERE Shinkansen_id=?');
		$sql->execute([$_POST["name"], $_POST["explanation"], $uploadfile, $_POST["vehicle"], $_POST["stop"], $_POST["zaseki"], $_POST["outlet"], $_POST["hanbai"], $_POST["category"],$id]);
        
	} else {
		$sql=$pdo->prepare('update Shinkansen set name=?,explanation=?,vehicle=?,stop=?,zaseki=?,outlet=?,hanbai=?,category_id=? WHERE Shinkansen_id=?');
		$sql->execute([$_POST["name"], $_POST["explanation"], $_POST["vehicle"], $_POST["stop"], $_POST["zaseki"], $_POST["outlet"], $_POST["hanbai"], $_POST["category"],$id]);
	}
    $res=$pdo->prepare('select category_name from Category where category_id = ?');
    $res->execute([$_POST['category']]);
    $categoryname=$res->fetch();
    echo '<h1>更新しました</h1>';

		echo '名前：', $_POST['name'],'<br>';
		echo '説明：', $_POST['explanation'] ,'<br>';
		echo '画像：', $uploadfile ,'<br>';
		echo '使用車両：', $_POST['vehicle'],'<br>';
		echo '停車駅：', $_POST['stop'],'<br>';
        echo '座席の種類：', $_POST['zaseki'],'<br>';
        echo 'コンセントの有無：', $_POST['outlet'],'<br>';
        echo '車内販売：', $_POST['hanbai'],'<br>';
        echo 'カテゴリ：', $categoryname['category_name'],'<br>';
    
    ?>
	<br><br><br>
    <input type="button" onclick="location.href='update.php'" value="もう一度更新する">
    <input type="button" onclick="location.href='product.php'" value="一覧へ戻る">
    <?php require 'footer.php'; ?>