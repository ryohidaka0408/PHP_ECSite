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
<title>スタッフ修正登録</title>
<link rel="stylesheet" href="../style.css">
</head>
    
<body>
    
<?php
    try{
// 関数の呼び出し    
require_once("../common/common.php");
// staff_edit.phpよりPost(修正したい内容)されたの値を取得
// sanitize関数の呼び出し    
$post = sanitize($_POST);
$code = $post["code"];
$name = $post["name"];
$pass = $post["pass"];

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

// DBに接続し、現状格納されているスタッフアカウント内容の更新
$sql = "UPDATE mst_staff SET name=?, password=? WHERE code=?";

// 上記SQL文の準備
$stmt = $dbh -> prepare($sql);

// ログイン時に入力した値を？へ代入
$data[] = $name;// 1つ目の？へ代入
$data[] = $pass;// 2つ目の？へ代入
$data[] = $code;// 3つ目の？へ代入

// SQL文の実行
$stmt -> execute($data);

// 準備したSQL文の初期化
$dbh = null;
        
}
// SQL文の実行前にエラーが出た場合
catch(Exception $e) {
    print "只今障害が発生しております。<br><br>";
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}
?>
    
修正完了しました。<br><br>
<a href="staff_list.php">スタッフ一覧へ</a>

</body>
</html>