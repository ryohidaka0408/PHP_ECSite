<?php

session_start();
session_regenerate_id(true);
if(isset($_SESSION["login"]) === false) {
    print "ログインしていません。<br><br>";
    print "<a href='staff_login.html'>ログイン画面へ</a>";
    exit();
} else {
    print $_SESSION["name"]."さんログイン中";
    print "<br><br>";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>商品追加チェック</title>
<link rel="stylesheet" href="../style.css">
</head>
    
<body>
    
<?php
    
require_once("../common/common.php");
    
$post = sanitize($_POST);
$name = $post["name"];
$price = $post["price"];
$gazou = $_FILES["gazou"];
$comments = $post["comments"];
$cate = $post["cate"];
    
print $cate."<br><br>";
    
if(empty($name) === true) {
    print "商品名が入力されていません。<br><br>";
} else {
    print $name;
    print "<br><br>";
}
    
if(preg_match("/\A[0-9]+\z/", $price) === 0) {
    print "正しい値を入力してください。<br><br>";
} else {
    print $price."円";
    print "<br><br>";
}
    
if($gazou["size"] > 0) {
    if($gazou["size"] > 1000000) {
        print "ファイルのサイズが大きすぎます。<br><br>";
    } else {
        move_uploaded_file($gazou["tmp_name"],"./gazou/".$gazou["name"]);
        print "<img src='./gazou/".$gazou['name']."'>";
        print "<br><br>";
    }
}
if(empty($comments) === true) {
    print "詳細が入力されていません。";
    print "<br><br>";
} 
if(mb_strlen($comments) > 100) {
    print "文字数は100文字が上限です。";
    print "<br><br>";
} else {
    print $comments;
    print "<br><br>";
}
    
if(empty($name) or preg_match("/\A[0-9]+\z/", $price) === 0 or $gazou["size"] > 1000000 or empty($comments) or mb_strlen($comments) > 100) {
    print "<form>";
    print "<input type='button' onclick='history.back()' value='戻る'>";
    print "</form>";
} else {
    print "上記商品を追加しますか？<br><br>";
    print "<form action='pro_add_done.php' method='post'>";
    print "<input type='hidden' name='cate' value='".$cate."'>";
    print "<input type='hidden' name='name' value='".$name."'>";
    print "<input type='hidden' name='price' value='".$price."'>";
    print "<input type='hidden' name='gazou' value='".$gazou['name']."'>";
    print "<input type='hidden' name='comments' value='".$comments."'>"; 
    print "<input type='button' onclick='history.back()' value='戻る'>";
    print "<input type='submit' value='OK'>";
    print "</form>";
}
?>
</body>
</html>