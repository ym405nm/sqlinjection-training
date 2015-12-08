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
<title>sample 2</title>
</head>
<body>
<h1>ログインシステム</h1>
<form action="" method="post">
  <p>ID：<input type="text" name="username" value="<?php echo (isset($_POST["username"])) ? htmlspecialchars($_POST["username"]) : "sakamoto@example.com"; ?>"></p>
  <p>パスワード : <input type="password" name="password" value="<?php echo (isset($_POST["password"])) ? htmlspecialchars($_POST["password"]) : "sakamoto" ?>"</p>
  <input type="submit" value="ログイン">
</form>
<hr>
<?php
// 検索クエリを処理
if(isset($_POST["username"]) && isset($_POST["password"])){
  $username = mb_convert_encoding($_POST["username"], "UTF-8", "auto");
  $password = mb_convert_encoding($_POST["password"], "UTF-8", "auto");
  $sql = "select * from `sqlitest`.`users` where `users`.`username` = '". $username ."' and `users`.`password` = '". $password ."';";
  $query = mysqli_query($link, $sql);
  if(mysqli_num_rows($query)){
    printf("<p>ログイン成功</p>");
  }else if(mysqli_error($link) == false) {
    printf("<p>ログイン失敗</p>");
  }else{
    die("error");
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
