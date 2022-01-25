<?php

session_start();
session_regenerate_id(true);

if(isset($_SESSION["menber_login"]) === false) {
    print "ログインしてください。<br><br>";
    print "<a href='../menber_login/menber_login.php'>ログイン画面へ</a>";
    exit();
} else {
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
<title>カート情報</title>
<link rel="stylesheet" href="../style.css">
</head>
    
<body>
    
<?php
        
if(empty($_SESSION["cart"]) === true) {
    print "カートに商品はありません。<br><br>";
    print "<a href='shop_list.php'>商品一覧へ戻る</a>";
    exit();
}

try{
$cart = $_SESSION["cart"];
$kazu = $_SESSION["kazu"];
$max = count($cart);
    
$dsn = "mysql:host=localhost;port=3309;dbname=shop;charset=utf8";
$user = "root";
$password = "root";
$dbh = new PDO($dsn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
foreach($cart as $key => $val) {
    
$sql = "SELECT code, name, price, gazou FROM mst_product WHERE code=?";
$stmt = $dbh -> prepare($sql);
$data[0] = $val;
$stmt -> execute($data);
    
$rec = $stmt -> fetch(PDO::FETCH_ASSOC);
    
$name[] = $rec["name"];
$price[] = $rec["price"];
$gazou[] = $rec["gazou"];
}
$dbh = null;
}
catch(Exception $e) {
    print "只今障害が発生しております。<br><br>";
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}
?>
    
<form action="shop_kazu.php" method="post">
カート一覧<br><br>
<?php for($i = 0; $i < $max; $i++) {;?>
<?php if(empty($gazou[$i]) === true) {;?>
<?php $disp_gazou = "";?>
<?php } else {;?>
<?php $disp_gazou = "<img src='../product/gazou/".$gazou[$i]."'>";?>
<?php };?>
<?php print $disp_gazou;?>
商品名:<?php print $name[$i];?><br>
価格:<?php print $price[$i]."円　";?><br>
数量:<input type="text" name="kazu<?php print $i;?>" value="<?php print $kazu[$i];?>"><br>
合計価格:<?php print $price[$i] * $kazu[$i]."円";?><br><br>
削除:<input type="checkbox" name="delete<?php print $i;?>">
<br>

<?php };?>

<br><br>
<input type="hidden" name="max" value="<?php print $max;?>">
<input type="submit" value="数量変更/削除">
<br><br>
<input type="button" onclick="history.back()" value="戻る">
</form>
<br>
<a href="shop_form_check.php">ご購入手続きへ進む</a><br>
<br><br>

</body>
</html>