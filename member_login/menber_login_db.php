<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>会員情報入力画面</title>
<link rel="stylesheet" href="../css/menber_login_db.css">
</head>
    
<body>
    <div id="login_db" class="big-bg">
        <div class="home-content wrapper">    
            <h2 class="page-title">新規会員登録画面</h2>
        </div>
        
        <form action="menber_login_db_check.php" method="post">
            <h1><span>NewUser</span> WINSHOP</h1>
            <input type="text" name="name" placeholder="氏名">
            <br>
            <input type="text" name="email" placeholder="メールアドレス">
            <br>
            <input type="text" name="address" placeholder="住所">
            <br>
            <input type="text" name="tel" placeholder="電話番号">
            <br>
            <input type="password" name="pass" placeholder="パスワード">
            <br>
            <input type="password" name="pass2" placeholder="再入力">
            <br><br>
            <input type="submit" class="btn" value="OK">
            <input type="button" class="button" onclick="history.back()" value="戻る">
            <br><br>
            
        </form>
        <br>
    </div>
    <script type="text/javascript" src="../js/menber_login.js"></script>
    <footer>
        <div>
            <p><small>&copy; 2021 RyoHidaka</small></p>
        </div>
    </footer>

</body>
</html>