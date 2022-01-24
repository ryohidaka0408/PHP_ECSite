<?php
// スタッフとしてログイン出来ているか確認
// セッションの開始
session_start();
session_regenerate_id(true);
// もし$_SESSION["login"]の中身がture(SESSIONに整合性の取れた値が格納されていたら)ならelseへ抜ける
if(isset($_SESSION["login"]) === false) {
    print "ログインしていません。<br><br>";
    print "<a href='staff_login.html'>ログイン画面へ</a>";
    exit();
}

// 各ページへ遷移するため

// スタッフの追加ページへ遷移
if(isset($_POST["add"]) === true) {
    header("Location:staff_add.php");
    exit();
}

// スタッフの詳細ページへ遷移
if(isset($_POST["disp"]) === true) {
    if(isset($_POST["code"]) === false) {
        header("Location:staff_ng.php");
        exit();
    } 
    $code = $_POST["code"];
    header("Location:staff_disp.php?code=".$code);
    exit();
}

// スタッフの項目編集ページへ遷移
if(isset($_POST["edit"]) === true) {
    if(isset($_POST["code"]) === false) {
        header("Location:staff_ng.php");
        exit();
    } 
    $code = $_POST["code"];
    header("Location:staff_edit.php?code=".$code);
    exit();
}

// スタッフの削除ページへ遷移
if(isset($_POST["delete"]) === true) {
    if(isset($_POST["code"]) === false) {
        header("Location:staff_ng.php");
        exit();
    } 
    $code = $_POST["code"];
    header("Location:staff_delete.php?code=".$code);
    exit();
}
?>