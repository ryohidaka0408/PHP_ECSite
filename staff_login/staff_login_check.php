<?php

// スタッフのログイン内容の整合性チェック

try {
// common.phpの呼び出し
require_once("../common/common.php");
// common/phpのsanitize関数の呼び出し
$post = sanitize($_POST);
$code = $post["code"];//スタッフコードのGet 
$pass = $post["pass"];//スタッフパスワードのGet

// Getした値の確認用
var_dump($code);
var_dump($pass);

// Getしたpassの値を32文字数のランダムな値に変更
$pass = md5($pass);

// 上記でランダムな値に変更した内容の確認
var_dump($pass);

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
$sql = "SELECT name FROM mst_staff WHERE code=? AND password=?";
// 上記SQL文の準備
$stmt = $dbh -> prepare($sql);
// ログイン時に入力した値を？へ代入
$data[] = $code;// 1つ目の？へ代入
$data[] = $pass;// 2つ目の？へ代入
// SQL文の実行
$stmt -> execute($data);

// 準備したSQL文の初期化
$dbh = null;

// 配列モードへの変更（左辺へ代入）
$rec = $stmt -> fetch(PDO::FETCH_ASSOC);

// もし$rec配列の変数[name]がDB内の[name]と完全一致じゃないなら抜ける
if(empty($rec["name"]) === true) {
    print "入力が間違っています。<br><br>";
    print "<a href='staff_login.html'>戻る</a>";
    exit();
}
// もし完全一致だった場合
else {
    // セッションの開始
    session_start();
    // スコープに保存
    $_SESSION["login"] = 1;
    $_SESSION["name"] = $rec["name"];
    $_SESSION["code"] = $code;
    // 下記URLへの遷移
    header("Location:staff_login_top.php");
    exit();
}
}
// SQL文の実行前にエラーが出た場合
catch(Exception $e) {
    print "只今障害が発生しております。<br><br>";
    print "<a href='staff_login.html'>戻る</a>";
}
?>