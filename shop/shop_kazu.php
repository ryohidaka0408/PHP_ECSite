<?php

session_start();
session_regenerate_id(true);

require_once("../common/common.php");

$post = sanitize($_POST);
$max = $post["max"];
$cart = $_SESSION["cart"];

for($i = 0; $i < $max; $i++) {
    if(preg_match("/\A[0-9]+\z/", $post['kazu'.$i]) === 0) {
        print "正確な数を入力してください。<br><br>";
        print "<a href='shop_cartlook.php'>戻る</a>";
        exit();
    }
    if($post["kazu".$i] <= 0 or $post["kazu".$i] > 10) {
        print "0以上、10が上限になります。<br><br>";
        print "<a href='shop_cartlook.php'>戻る</a>";
        exit();
    }
    $kazu[] = $post["kazu".$i];
}

for($i = $max; $i >= 0; $i--) {
    if(isset($post["delete".$i]) === true) {
        array_splice($cart, $i, 1);
        array_splice($kazu, $i, 1);
}
}
$_SESSION["cart"] = $cart;
$_SESSION["kazu"] = $kazu;
header("Location:shop_cartlook.php");
exit();
?>