<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ログインチェック</title>
<link rel="stylesheet" href="../css/menber_login_check.css">
</head>
    
<body>
    
<?php

require_once("../common/common.php");

$post = sanitize($_POST);

$email = $post["email"];
$pass = $post["pass"];
$pass2 = $post["pass2"];
$okflag = true;

if(empty($email) === true) {
    print "emailを入力してください。<br>";
    $okflag = false;
}
if(preg_match("/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/", $email) === 0) {
    print "正しいemailを入力してください。<br>";
    $okflag = false;
}
if(empty($pass) === true) {
    print "パスワードを入力してください。<br>";
    $okflag = false;
}
if($pass != $pass2) {
    print "パスワードが異なります<br>";
    $okflag = false;
}
if($okflag === false) {
    print "<form><br>";
    print "<input type='button' onclick='history.back()' value='戻る'>";
} else {

    print "<div id='login_db' class='big-bg'>";
    print "     <div class='home-content wrapper'> ";  
    print "         <h2 class='page-title'>下記mailアドレスでログインしますか？</h2>";
    print "     </div>";
    print "     <br><br>";
    print "<form action='menber_login_done.php' method='post'>";
    print "メールアドレス:$email<br><br>";
    print "<input type='hidden' name='email' value='".$email."'>";
    print "<input type='hidden' name='pass' value='".$pass."'>";
    print "<input type='submit' class='btn' value='ログイン'>";
    print "<input type='button' class='button' onclick='history.back()' value='戻る'>";
    print "</form>";
}
?>
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