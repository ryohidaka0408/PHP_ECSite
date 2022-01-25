<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>会員登録完了</title>
<link rel="stylesheet" href="../css/menber_login_db_done.css">
</head>
    
<body>

<?php
    try{

require_once("../common/common.php");

$post = sanitize($_POST);

$name = $post["name"];
$address = $post["address"];
$tel = $post["tel"];
$email = $post["email"];
$pass = $post["pass"];
        
$pass = md5($pass);
        
$dsn = "mysql:host=localhost;port=3309;dbname=shop;charset=utf8";
$user = "root";
$password = "root";
$dbh = new PDO($dsn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
$sql = "SELECT email FROM menber WHERE1";
$stmt = $dbh -> prepare($sql);
$stmt -> execute();
        
while(true) {
    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
    if(empty($rec) === true) {
        break;
    }
    $mail[] = $rec["email"];
}

if(empty($mail) === true) {
    $mail[] = "a";
}
        
if(in_array($email, $mail) === true) {
     
    print "<div id='login_db' class='big-bg'>";
    print "     <div class='home-content wrapper'> ";  
    print "         <h2 class='page-title'>登録結果</h2>";
    print "     </div>";
    print "     <br><br>";
    print "<form action='menber_login.php' method='post'>";
    print "<p>すでに登録されているメールアドレスになります。</p><br><br>";
    print "<input type='submit' class='btn' value='ログインへ'>";
    print "</form>";

    $dbh = null;
} else {   
$sql = "INSERT INTO menber(name, email, address, tel, password) VALUES(?,?,?,?,?)";
$stmt = $dbh -> prepare($sql);
$data[] = $name;
$data[] = $email;
$data[] = $address;
$data[] = $tel;
$data[] = $pass;
$stmt -> execute($data);
        
$dbh = null;
        
 
print "<div id='login_db' class='big-bg'>";
print "     <div class='home-content wrapper'> ";  
print "         <h2 class='page-title'>登録結果</h2>";
print "     </div>";
print "     <br><br>";
print "<form action='menber_login.php' method='post'>";
print "<p>登録完了しました。</p><br><br>";
print "<input type='submit' class='btn' value='ログインへ'>";
print "</form>";
}
}
catch(Exception $e) {
   print "只今障害が発生しております。";
   print "a href='menber_login.php'>ログインページへ戻る</a>";
   exit();
}
?>
<br><br>
<script type="text/javascript" src="../js/menber_login.js"></script>
<footer>
    <div>
        <p><small>&copy; 2021 RyoHidaka</small></p>
    </div>
</footer>
</body>
</html>