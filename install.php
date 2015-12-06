<!doctype html><html><head><title>InstallPage</title></head><body>
<?php
$user = isset($_GET["user"]) ? $_GET["user"] : "root";
$pwd = isset($_GET["pwd"]) ? $_GET["pwd"] : "1qazxsw2";
$link = mysqli_connect("127.0.0.1", $user, $pwd);
?>

<?php if ($link) : // 1. 接続確認 ?>
<p>MySqlの接続に成功しました</p>
<?php else:?>
<p>MySqlの接続に失敗しました</p>
<?php exit;endif;?>

<?php // 2. データベース作成
if (mysqli_query($link, "CREATE DATABASE sqlitest DEFAULT CHARACTER SET utf8;") === TRUE): ?>
<p>データベースの作成に成功しました</p>
<?php else:?>
<p>データベースの作成に失敗しました</p>
<?php exit;endif;?>

<?php // 3. テーブルの作成
if (mysqli_query($link, "CREATE TABLE `sqlitest`.`users` ( `id` BIGINT NOT NULL AUTO_INCREMENT , `username` VARCHAR(1024) NOT NULL , `password` VARCHAR(1024) NOT NULL , `name` VARCHAR(1024) NOT NULL , PRIMARY KEY (`id`)) ;") === TRUE): ?>
<p>テーブルの作成に成功</p>
<?php else:?>
<p>テーブルの作成に失敗</p>
<?php exit;endif;?>

<?php mysqli_close($link); // 99. 接続終了 ?>
</body></html>