<?php

// スタッフとしてログイン出来ているか確認
// セッションの開始
session_start();
session_regenerate_id(true);
// もし$_SESSION["login"]の中身がture(SESSIONに整合性の取れた値が格納されていたら)ならelseへ抜ける
if(isset($_SESSION["login"]) === false) {
    print "ログインしていません。<br><br>";
    print "<a href='staff_login.html'>ログイン画面へ</a>";
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
<title>管理画面TOP</title>
<link rel="stylesheet" href="../style.css">
</head>
    
<body>
    
管理画面TOP<br><br>
    <!-- スタッフの内容確認 -->
    <a href="../staff/staff_list.php">スタッフ管理</a>
    <br><br>
    <!-- 取扱品の内容確認 -->
    <a href="../product/pro_list.php">商品管理</a>
    <br><br>
    <!-- スタッフアカウントのログアウト -->
    <a href="staff_logout.php">ログアウト</a>
</body>
</html>