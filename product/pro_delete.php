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
<title>商品削除</title>
<link rel="stylesheet" href="../style.css">
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
    
$sql = "SELECT code, name, price, gazou FROM mst_product WHERE code=?";
$stmt = $dbh -> prepare($sql);
$data[] = $code;
$stmt -> execute($data);
    
$dbh = null;
        
$rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        
$gazou = $rec["gazou"];
    
if(empty($gazou) === true) {
    $disp_gazou = "";
} else {
    $disp_gazou = "<img src='./gazou/".$gazou."'>";
}
               
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
商品名<br>
<?php print $rec["name"];?>
<br><br>
価格<br>
<?php print $rec["price"];?>
円<br>
<br>
画像<br>
<?php print $disp_gazou;?>
<br><br>
上記情報を削除しますか？<br><br>
<form action="pro_delete_done.php" method="post">
<input type="hidden" name="code" value="<?php print $rec['code'];?>">
<input type="hidden" name="gazou" value="<?php print $gazou;?>">
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>
</html>