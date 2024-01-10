<?php require 'header.php'; ?>
<a href="menu.php">メニューに戻る</a>
名前<input type="text" name="name" required><br>
説明<textarea name="explanation" required></textarea><br>
画像<input type="file" name="upload_image" accept="image/*" required><br>
使用車両<input type="text" name="vehicli" required><br>
停車駅<textarea name="stop" required></textarea><br>
座席の種類<input type="text" name="zaseki" required><br>
コンセントの有無<textarea name="outlet" required></textarea><br>
車内販売<input type="text" name="hanbai" required><br>
<input type="submit" value="登録">
<?php require 'header.php'; ?>