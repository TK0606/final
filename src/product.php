<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<a href="menu.php">メニューに戻る</a>
<hr>
<?php
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->query('select * from Shinkansen');
foreach($sql as $row){
    echo $row['name'];
    echo $row['explanation'];
    echo ' style=text-decoration:none;><img src="../img/',$row['image'];
    echo '【使用車両】<br>',$row['vehicli'];
    echo '【停車駅】<br>',$row['stop'];
    echo '【座席の種類】<br>',$row['zaseki'];
    echo '【コンセントの有無】<br>',$row['outlet'];
    echo '【車内販売】<br>',$row['hanbai'];
}
?>
<?php require 'footer.php'; ?>