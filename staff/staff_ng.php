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
<title>スタッフ選択NG</title>
<link rel="stylesheet" href="../style.css">
</head>
    
<body>
<!-- ラジオボタンで選択されていない場合に表示 -->    
スタッフが選択されていません。<br><br>
<a href="staff_list.php">スタッフ一覧に戻る</a>

</body>
</html>