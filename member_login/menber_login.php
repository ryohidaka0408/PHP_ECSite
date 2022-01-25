<!DOCTYPE html>
<html lang="ja">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/menber_login.css">
<title>ログイン入力</title>

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
            <p>欲しいものがきっと見つかる。</p>
        </div>
        <form action="menber_login_check.php" method="post">
            <h1><span>Login</span> WINSHOP</h1>
            <input placeholder="メールアドレス" type="text" name="email">
            <input placeholder="パスワード" type="password"name="pass">
            <input placeholder="再入力" type="password" name="pass2">
            <input type="submit" class="btn" value="ログイン">
            <label for="new"><br>
                <a href="./menber_login_db.php" class="button">会員登録画面へ</a>
            </label>
        </form>
        <br><br>
        <!-- <div class="home-content wrapper">
            <h3>会員情報を入力してください。</h3>    
                <form action="menber_login_check.php" method="post">        
                    <label for="username">mailアドレス</label>
                        <br>
                        <input type="text" name="email" class="placeholder" placeholder="name@example.com">
                        <br>
                    <label for="password">パスワード</label>
                        <br>
                        <input type="password" name="pass" class="placeholder" placeholder="Password">
                        <br>
                    <label for="password">パスワード再入力</label>
                        <br>
                        <input type="password" name="pass2" class="placeholder" placeholder="Password">
                        <br><br>
                        <input type="submit" class="button" value="OK">
                        <br>
                </form>
                <br>                    
                <label for="new">会員情報が未登録の方はこちらから登録をお願いします。<br>
                <a href="./menber_login_db.php">会員登録画面へ</a> -->
    </div>
    <script type="text/javascript" src="../js/menber_login.js"></script>
    <footer>
        <div>
            <p><small>&copy; 2021 RyoHidaka</small></p>
        </div>
    </footer>
    <!-- <header>
    
        <div class="inline-box">
            <a href=""><img src="../img/logo.png" alt="HOME"></a>
            <ul>
                <li><a href="">HOME</a></li>
                <li><a href="">SHOP</a></li>
                <li><a href="">MEMBER</a></li>
            </ul>
        </div>    
    
    </header>
    <h1 class="text-form">会員情報を入力してください。</h1>
        <div class="inline-box">    
            <main>
                <div class="text-form">
                    <form id="slick-login" action="menber_login_check.php" method="post">
                        
                        <label for="username">mailアドレス</label>
                            <br>
                            <input type="text" name="email" class="placeholder" placeholder="name@example.com">
                            <br>
                        <label for="password">パスワード</label>
                            <br>
                            <input type="password" name="pass" class="placeholder" placeholder="Password">
                            <br>
                        <label for="password">パスワード再入力</label>
                            <br>
                            <input type="password" name="pass2" class="placeholder" placeholder="Password">
                            <br><br>
                            <input type="submit" value="OK">
                            <br><br>
                            <input type="button" onclick="history.back()" value="戻る">
                            <br><br>

                    </form>
                </div>
            </main>
            <br>
            <aside class="text-form">
                
                <label for="new">会員情報が未登録の方はこちらから登録をお願いします。<br>
                <a href="./menber_login_db.php">会員登録画面へ</a>
            
            </aside>
        </div> -->

</body>
</html>