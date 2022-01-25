<?php
// sessionの開始
session_start();
// SESSIONの配列を空に
$_SESSION = array();

// 
if(isset($_COOKIE[session_name()]) === true) {
    setcookie(session_name(), "", time()-42000, "/");
}
// SESSION自体の破壊
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ログアウト</title>
<link rel="stylesheet" href="../style.css">
</head>
    
<body>
    
ログアウトしました。<br><br>
<!-- もう一度ログインから -->
<a href="staff_login.html">ログイン画面へ</a>

</body>
</html>