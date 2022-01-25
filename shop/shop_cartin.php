<?php

session_start();
session_regenerate_id(true);

if(isset($_SESSION["menber_login"]) === false) {
    print "ログインしてく下さい。<br><br>";
    print "<a href='../menber_login/menber_login.php'>ログイン画面へ<br><br></a>";
    print "<a href='shop_list.php'>TOP画面へ</a>";
    exit();
}
    if(isset($_SESSION["menber_login"]) === true) {
    print "ようこそ";
    print $_SESSION["menber_name"];
    print "様　";
    print "<a href='../menber_login/menber_logout.php'>ログアウト</a>";
    print "<br><br>";
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>カートに追加</title>
<link rel="stylesheet" href="../style.css">
</head>
    
<body>

<?php
    
$code = $_GET["code"];

if(isset($_SESSION["cart"]) === true) {
    $cart = $_SESSION["cart"];
    $kazu = $_SESSION["kazu"];
        if(in_array($code, $cart) === true) {
        print "すでにカートにあります。<br><br>";
        print "<a href='shop_list.php'>商品一覧へ戻る</a>";
        } 
        }
if(empty($_SESSION["cart"]) === true or in_array($code, $cart) === false) {
$cart[] = $code;
$kazu[] = 1;
$_SESSION["cart"] = $cart;
$_SESSION["kazu"] = $kazu;

print "カートに追加しました。<br><br>";
print "<a href='shop_list.php'>商品一覧へ戻る</a>";
}

?>
<br><br>

</body>
</html>