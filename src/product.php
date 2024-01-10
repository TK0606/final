<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<hr>
<?php
$pdo=new PDO($connect,USER,PASS);
foreach($sql as $row){
    $id=$row['id'];
    echo '<tr>';
    echo '<td>',$id,'</td>';
    echo '<td>';
    echo '<a href="detail.php?id=',$id,'">',$row['name'],'</a>';
    echo '</td>';
    echo '<td>',$row['price'],'</td>';
    echo '</tr>';
}
?>
<?php require 'footer.php'; ?>