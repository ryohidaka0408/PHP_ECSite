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
<title>商品詳細</title>
<link rel="stylesheet" href="style.css">
</head>
    
<body>
    
<?php
    try{
    
$code = $_GET["code"];

$dsn = "mysql:host=localhost;port=3309;dbname=shop;charset=utf8";
$user = "root";
$password = "root";
$dbh = new PDO($dsn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$sql = "SELECT category, code, name, price, gazou, explanation FROM mst_product WHERE code=?";
$stmt = $dbh -> prepare($sql);
$data[] = $code;
$stmt -> execute($data);
    
$dbh = null;
        
$rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        
}
catch(Exception $e) {
    print "只今障害が発生しております。<br><br>";
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}
?>
    
商品詳細<br><br>
商品コード<br>
<?php print $rec["code"];?>
<br><br>
カテゴリー<br>
<?php print $rec["category"];?>
<br><br>
商品名<br>
<?php print $rec["name"];?>
<br><br>
画像<br>
<?php if(empty($rec["gazou"]) === true) {
    $disp_gazou = "";
} else {
    $disp_gazou = "<img src='./gazou/".$rec['gazou']."'>";
};?>
<?php print $disp_gazou;?>
<br><br>
詳細<br>
<?php print $rec["explanation"];?>
<br><br>    
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>

</body>
</html>