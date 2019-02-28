<?php
include("functions.php");
$title = "ログイン";

// headHTMLを作成
$head = headHtml($title);

// ヘッダー用HTMLを作成
$header = headerHtml($title);

?>

<!DOCTYPE html>
<html lang="ja">

<?=$head?>

<body>

    <?=$header?>

    <form method="post" action="login_act.php" class="container">
        <div class="form-group">
            <label for="lid">ログインID</label>
            <input type="text" class="form-control" id="lid" name="lid">
        </div>
        <div class=" form-group">
            <label for="lpw">パスワード</label>
            <input type="password" class="form-control" id="lpw" name="lpw">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">ログイン</button>
        </div>
    </form>

</body>

</html>