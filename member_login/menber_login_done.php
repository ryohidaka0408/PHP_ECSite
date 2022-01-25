<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ログイン実行</title>
<link rel="stylesheet" href="../css/menber_login_done.css">
</head>
    
<body>

<?php
    try{

require_once("../common/common.php");

$post = sanitize($_POST);

$email = $post["email"];
$pass = $post["pass"];
        
$pass = md5($pass);
        
$dsn = "mysql:host=localhost;port=3309;dbname=shop;charset=utf8";
$user = "root";
$password = "root";
$dbh = new PDO($dsn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
$sql = "SELECT code, name FROM menber WHERE email=? AND password=?";
$stmt = $dbh -> prepare($sql);
$data[] = $email;
$data[] = $pass;
$stmt -> execute($data);
        
$dbh = null;
        
$rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        
if(empty($rec["name"]) === true) {

    print "<div id='login_db' class='big-bg'>";
    print "     <div class='home-content wrapper'> ";  
    print "         <h2 class='page-title'>ログイン結果</h2>";
    print "     </div>";
    print "     <br><br>";
    print "<form action='menber_login.php' method='post'>";
    print "<p>ログイン情報が間違っています。</p><br><br>";
    print "<input type='submit' class='btn' value='再度ログインへ'>";
    print "</form>";

    exit();
} 
session_start();
$_SESSION["menber_login"] = 1;
$_SESSION["menber_name"] = $rec["name"];
$_SESSION["menber_code"] = $rec["code"];

print "<div id='login_db' class='big-bg'>";
print "     <div class='home-content wrapper'> ";  
print "         <h2 class='page-title'>ログイン結果</h2>";
print "     </div>";
print "     <br><br>";
print "<form action='../shop/shop_list.php' method='post'>";
print "<p>ログイン成功しました。</p><br><br>";
print "<input type='submit' class='btn' value='SHOPへ'>";
print "</form>";
        
}
catch(Exception $e) {
   print "只今障害が発生しております。";
   print "a href='menber_login.php'>ログインページへ戻る</a>";
   exit();
}
?>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>

<script type="text/javascript" src="../js/menber_login.js"></script>
<footer>
    <div>
        <p><small>&copy; 2021 RyoHidaka</small></p>
    </div>
</footer>

</body>
</html>