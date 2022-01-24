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
<title>スタッフ詳細</title>
<link rel="stylesheet" href="../style.css">
</head>
    
<body>
    
<?php
    try{
// staff_list.phpよりPostされたCodeの値を取得    
$code = $_GET["code"];

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
$sql = "SELECT code, name FROM mst_staff WHERE code=?";

// 上記SQL文の準備
$stmt = $dbh -> prepare($sql);

// 上記SQL文の？へ代入
$data[] = $code;// 1個目の？へ代入

// SQL文の実行
$stmt -> execute($data);

// 準備したSQL文の初期化
$dbh = null;

// 配列モードへの変更（左辺へ代入）
$rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        
}
// SQL文の実行前にエラーが出た場合
catch(Exception $e) {
    print "只今障害が発生しております。<br><br>";
    // スタッフのログインページへ遷移
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}
?>
<!-- スタッフデータの修正内容確認 -->
スタッフ詳細<br><br>
スタッフコード<br>
<?php print $rec["code"];?>
<br><br>
スタッフネーム<br>
<?php print $rec["name"];?>
<br><br>
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>

</body>
</html>