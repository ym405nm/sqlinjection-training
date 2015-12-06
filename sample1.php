<?php
// MYSQL 接続
$user = isset($_GET["user"]) ? $_GET["user"] : "root";
$pwd = isset($_GET["pwd"]) ? $_GET["pwd"] : "1qazxsw2";
$link = mysqli_connect("127.0.0.1", $user, $pwd);
if(!$link){
  die("データベース接続エラー / IDまたはPWDを確認してください");
}
mysqli_set_charset($link, "utf8");
?><!doctype html>
<html>
<head>
<title>sample 1</title>
</head>
<body>
<h1>ユーザ検索システム</h1>
<form action="" method="post">
  名前：<input type="text" name="name" value="<?php echo (isset($_POST["name"])) ? htmlspecialchars($_POST["name"]) : "坂本勇人"; ?>">
  <input type="submit" value="検索">
</form>
<hr>
<?php
// 検索クエリを処理
if(isset($_POST["name"])){
  $name = mb_convert_encoding($_POST["name"], "UTF-8", "auto");
  $sql = "select * from `sqlitest`.`users` where `users`.`name` = '". $name ."';";
  $query = mysqli_query($link, $sql);
  if(mysqli_num_rows($query)){
    printf("<p>見つかりました</p>");
  }else{
    printf("<p>見つかりません</p>");
    printf("<p>" . htmlspecialchars(mysqli_error($link), ENT_QUOTES, "UTF-8") . "</p>");
  }
  while ($row = mysqli_fetch_assoc($query)) {
    printf ("<p>%s, %s, %s</p>", $row["id"], $row["username"], $row["name"]);
  }
}else{
  $name = "";
}
?>
</body>
</html>
