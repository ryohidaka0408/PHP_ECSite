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
<title>スタッフ修正チェック</title>
<link rel="stylesheet" href="style.css">
</head>
    
<body>
    
<?php

// 関数の呼び出し
require_once("../common/common.php");
// staff_edit.phpよりPost(修正したい内容)されたの値を取得
// sanitize関数の呼び出し
$post = sanitize($_POST);
$code = $post["code"];
$name = $post["name"];
$pass = $post["pass"];
$pass2 = $post["pass2"];

// 修正したい内容の確認
print "スタッフコード<br>";
print $code;
print "　の情報を修正します。";
print "<br><br>";

// もし[name]が完全一致じゃなかったら
if(empty($name) === true) {
    print "名前が入力されていません。<br><br>";
} 
// 完全一致なら
else {
    print "スタッフ名:";
    print $name;
    print "<br><br>";
}

// もし[pass]が完全一致じゃなかったら  
if(empty($pass) === true) {
    print "パスワードが入力されていません。<br><br>";
}
// もし[pass]と[pass2](再入力パスワード)が完全一致じゃなかったら    
if($pass != $pass2) {
    print "パスワードが異なります。<br><br>";
}
// もし[name]が空だった場合、もしくは[pass]が空だった場合、もしくは[pass]と[pass2]が一致していなかったら    
if(empty($name) or empty($pass) or $pass != $pass2) {
    // ひとつ前のページへ遷移
    print "<form>";
    print "<input type='button' onclick='history.back()' value='戻る'>";
    print "</form>";
}// 上記のif文に当てはまらなかったら
 else {
    // passを32桁のランダムな文字へ変換
    $pass = md5($pass);
    print "上記の通り修正しますか？<br><br>";
    // スタッフ項目編集実行ページへ遷移
    print "<form action='staff_edit_done.php' method='post'>";
    print "<input type='hidden' name='name' value='".$name."'>";
    print "<input type='hidden' name='pass' value='".$pass."'>";
    print "<input type='hidden' name='code' value='".$code."'>";
    print "<input type='button' onclick='history.back()' value='戻る'>";
    print "<input type='submit' value='OK'>";
    print "</form>";
}
?>
</body>
</html>