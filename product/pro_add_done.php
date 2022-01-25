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
<title>商品追加実効</title>
<link rel="stylesheet" href="../style.css">
</head>
    
<body>
    
<?php
    try{
    
require_once("../common/common.php");
    
$post = sanitize($_POST);
$name = $post["name"];
$price = $post["price"];
$gazou = $post["gazou"];
$comments = $post["comments"];
$cate = $post["cate"];

$dsn = "mysql:host=localhost;port=3309;dbname=shop;charset=utf8";
$user = "root";
$password = "root";
$dbh = new PDO($dsn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$sql = "INSERT INTO mst_product(category, name, price, gazou, explanation) VALUES(?,?,?,?,?)";
$stmt = $dbh -> prepare($sql);
$data[] = $cate;
$data[] = $name;
$data[] = $price;
$data[] = $gazou;
$data[] = $comments;
$stmt -> execute($data);
    
$dbh = null;
        
}
catch(Exception $e) {
    print "只今障害が発生しております。<br><br>";
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
    exit();
}
?>
    
商品を追加しました。<br><br>
<a href="pro_list.php">商品一覧へ</a>

</body>
</html>