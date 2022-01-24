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
<title>スタッフ一覧</title>
<link rel="stylesheet" href="../style.css">
</head>
    
<body>
    
<?php
try{
// MySQLへの接続先の指定　注意点：portの指定・設定ファイルの変更・パスワードの設定も必要(phpMyAdminのユーザー名とMySQLのユーザー名の一致を意識する)
$dsn = "mysql:host=localhost;port=3309;dbname=shop;charset=utf8";
// MySQLのユーザー名の入力
$user = "root";
// MySQLのパスワードの入力
$password = "root";
// PDO関数を用いてMySQLへ接続
$dbh = new PDO($dsn, $user, $password);
// 上記の3項目にエラーが出た場合、catch（例外処理）へ
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// DBに接続し、現状格納されているスタッフアカウントの読み取り
$sql = "SELECT code,name FROM mst_staff WHERE1";
// 上記SQL文の準備
$stmt = $dbh -> prepare($sql);
// SQL文の実行
$stmt -> execute();
// 準備したSQL文の初期化
$dbh = null;
    
print "スタッフ一覧<br><br>";
// スタッフ内容の変更・削除の為
print "<form action='staff_branch.php' method='post'>";

// DBからSELECTしたスタッフがラジオボタン付きで次の行がなくなるまで繰り返している
while(true) {
    // 配列モードへの変更（左辺へ代入）
    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
    if($rec === false) {
        break;
    }
    // ラジオボタンでスタッフのcodeの把握
    print "<input type='radio' name='code' value='".$rec['code']."'>";
    // スタッフ名の表示
    print $rec["name"];
    print "<br>";
}
print "<br>";
// スタッフの内容確認ページへ
print "<input type='submit' name='disp' value='詳細'>";
// 新規スタッフ登録ページ
print "<input type='submit' name='add' value='追加'>";
// 既存スタッフの登録内容編集ページへ
print "<input type='submit' name='edit' value='修正'>";
// 既存スタッフの削除ページへ
print "<input type='submit' name='delete' value='削除'>";
}
// SQL文の実行前にエラーが出た場合
catch(Exception $e) {
    print "只今障害が発生しております。<br><br>";
    // スタッフのログインページへ遷移
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}
?>
<br><br>
<!-- スタッフのメインページへ遷移 -->
<a href="../staff_login/staff_login_top.php">管理画面TOPへ</a>
    
</body>
</html>