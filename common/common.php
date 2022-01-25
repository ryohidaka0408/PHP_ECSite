<?php

function sanitize($before) {
    foreach($before as $key => $value) {
        $after[$key] = htmlspecialchars($value, ENT_QUOTES,"UTF-8");
    }
    return $after;
}

function pulldown_cate() {
    print "<select name='cate'>";
    print "<option value='食品'>食品</option>";
    print "<option value='家電'>家電</option>";
    print "<option value='書籍'>書籍</option>";
    print "<option value='日用品'>日用品</option>";
    print "<option value='その他'>その他</option>";
    print "</select>";
}

?>