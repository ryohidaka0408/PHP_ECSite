<?php
session_start();
$_SESSION = array();
if(isset($_Cookie[session_name()]) === true) {
    setcookie(session_name(), "", time()-42000, "/");
}
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ログアウト</title>
<link rel="stylesheet" href="../css/menber_logout.css">
</head>
    
<body>
<div id="login" class="big-bg">
    <header class="page-header wrapper">
        <h1><a href=""><img src="../img/logo.png" alt="HOME"></a></h1>
        <nav>
            <ul class="main-nav">
                <li><a href="">HOME</a></li>
                <li><a href="">SHOP</a></li>
                <li><a href="">MEMBER</a></li>
            </ul>
        </nav>
    </header>
    <div class="home-content wrapper">
        <h1 class="page-title">WINSHOP</h1>
        <p>ログアウトしました。</p>
        <a href="../menber_login/menber_login.php" class="button">ログインページへ</a>
    </div>
    <br><br>
</div>
<script type="text/javascript" src="../js/menber_login.js"></script>
<footer>
    <div>
        <p><small>&copy; 2021 RyoHidaka</small></p>
    </div>
</footer>
</body>
</html>