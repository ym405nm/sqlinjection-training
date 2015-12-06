<!doctype html><html><head><meta charset="UTF-8"><title>InstallPage</title></head><body>
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

<?php // 4. データの入力
mysqli_set_charset($link, "utf8");
$users = file_get_contents("users.sql", "UTF-8");
if (mysqli_query($link, $users) === TRUE):?>
<p>データの入力に成功</p>
<?php else: ?>
<p>データの入力に失敗</p>
<?php exit;endif;?>

<?php mysqli_close($link); // 99. 接続終了 ?>
<p>正常終了</p>
</body></html>
