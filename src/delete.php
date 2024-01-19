<?php require 'header.php'; ?>
<a href="menu.php">メニューに戻る</a>
<hr>
<?php
	$id = $_GET['id'];
?>
<p class="sakujo">削除しますか？</p>
<?php
    echo "<a href='delete-output.php?id=$id' class='yes'>はい</a>";
?>
    <a href="#" onclick="history.back()" class="no">いいえ</a>
<?php require 'footer.php'; ?>