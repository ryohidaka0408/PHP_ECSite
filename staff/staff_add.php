<?php
// スタッフとしてログイン出来ているか確認
// セッションの開始
session_start();
session_regenerate_id(true);
// もし$_SESSION["login"]の中身がture(SESSIONに整合性の取れた値が格納されていたら)ならelseへ抜ける
if(isset($_SESSION["login"]) === false) {
   print "ログインしていません。<br><br>";
   print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
   exit();
}
// スタッフログインが出来ていたら 
else {
   print $_SESSION["name"]."さんログイン中";
   print "<br><br>";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>スタッフ追加</title>
<link rel="stylesheet" href="../style.css">
</head>
    
<body>
<!-- スタッフデータの追加内容確認 -->   
<form action="staff_add_check.php" method="post">
スタッフ追加<br><br>
スタッフ名<br>
<input type="text" name="name">
<br><br>
パスワード<br>
<input type="password" name="pass">
<br><br>
パスワード再入力<br>
<input type="password" name="pass2">
<br><br>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>
    
</body>