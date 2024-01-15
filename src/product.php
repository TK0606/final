<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<link rel="stylesheet" href="../css/style.css">
<a href="menu.php">メニューに戻る</a>
<hr>
<?php
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->query('select * from Shinkansen');
foreach($sql as $row){
    echo '<a href="update.php?id=' . $row['shinkansen_id'] . '" class=futosa>',$row['name'],'</a><br>';
    echo $row['explanation'],'<br>';
    echo '<br>';
    echo '<img src="../img/',$row['image'],'" alt="', $row['name'],'"><br>';
    echo '<br>';
    echo '【使用車両】<br>',$row['vehicle'],'<br>';
    echo '<br>';
    echo '【停車駅】<br>',$row['stop'],'<br>';
    echo '<br>';
    echo '【座席の種類】<br>',$row['zaseki'],'<br>';
    echo '<br>';
    echo '【コンセントの有無】<br>',$row['outlet'],'<br>';
    echo '<br>';
    echo '【車内販売】<br>',$row['hanbai'],'<br>';
}
?>
<?php require 'footer.php'; ?>