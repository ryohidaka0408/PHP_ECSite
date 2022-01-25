<?php
session_start();
session_regenerate_id(true);

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
<title>ECサイトTOP</title>
<link rel="stylesheet" href="../css/shop_list.css">

</head>
    
<body>

<?php
try{
 
$dsn = "mysql:host=localhost;port=3309;dbname=shop;charset=utf8";
$user = "root";
$password = "root";
$dbh = new PDO($dsn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$sql = "SELECT code,name,price,gazou,explanation FROM mst_product WHERE1";
$stmt = $dbh -> prepare($sql);
$stmt -> execute();
    
$dbh = null;
?>

<header>
    <div class="header-line">
        <p>
            <a href="/"><img class="logo" src="../img/logo.png"></a>
        </p>
        <p>
        <a href="" class="btn btn--orange btn--radius">ACCOUNT</a>
        </p>  
        <div class="flex-form">
            <p>
                <select name="category" require>                    
                    <option value="すべて">すべて</option>
                    <option value="">家電</option>                        
                    <option value="">家具</option>
                    <option value="">本・雑誌</option>
                    <option value=""></option>
                </select>
            </p>
            <form action="" method="post">
                <input type="text" value=""></input>
                <input type="submit" value="検索"></input>
            </form>
        </div>
        <div class="">
            <?php
                print "販売商品一覧";
                print "　<a href='shop_cartlook.php'>カートを見る</a>";
                print "<br><br>";
            ?>
        </div>
    </div>
</header>
<br><br>

<?php

while(true) {
    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
    if($rec === false) {
        break;
    }
    $code = $rec["code"];
    print "<a href='shop_product.php?code=".$code."'>";
    if(empty($rec["gazou"]) === true) {
        $gazou = "";
    } else {
        $gazou = "<img src='../product/gazou/".$rec['gazou']."'>";
    }
    print $gazou;
    print "<br>";
    print "商品名:".$rec["name"];
    print "<br>";
    print "価格:".$rec["price"]."円";
    print "<br>";
    print "詳細:".$rec["explanation"];
    print "</a>";
    print "<br><br>";
}
print "<br>";

}
catch(Exception $e) {
    print "只今障害が発生しております。<br><br>";
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}
?>

<h3>カテゴリー</h3>
    <ul>
        <li><a href="shop_list_eart.php">食品</a></li>
        <li><a href="shop_list_kaden.php">家電</a></li>
        <li><a href="shop_list_book.php">書籍</a></li>
        <li><a href="shop_list_niti.php">日用品</a></li>
        <li><a href="shop_list_sonota.php">その他</a></li>
    </ul>

</body>
</html>                  
    

    

</body>

</html>