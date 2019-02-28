<?php
// セッションのスタート
session_start();

include("functions.php");
$title = "ユーザー一覧";

// ログイン状態のチェック
chk_ssid("login.php");

// headHTMLを作成
$head = headHtml($title);

// header用HTMLを作成
$header = headerHtml($title);

// DB接続
$pdo = db_conn();

// データ表示SQL作成
$sql = "SELECT * FROM user_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ表示
$view="";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    errorMsg($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = "id: ".$result["id"];
        $name = "ユーザー名: ".$result["name"];
        $lid = "ログインID: ".$result["lid"];
        $lpw = "パスワード: ".$result["lpw"];
        $kanri_flg = "kanri_flg: ".$result["kanri_flg"];
        $life_flg = "life_flg: ".$result["life_flg"];
        $edit = '<a href="user_detail.php?id='.$result['id'].'" class="badge badge-primary">Edit</a>';
        $delete = '<a href="user_delete.php?id='.$result['id'].'" class="badge badge-danger">Delete</a>';
        $view .= "<li class='list-group-item'>
            <p>$id</p>
            <p>$name</p>
            <p>$lid</p>
            <p>$lpw</p>
            <p>$kanri_flg</p>
            <p>$life_flg</p>
            $edit$delete
            </li>";
    }
}

?>



<!DOCTYPE html>
<html lang="ja">

<?=$head?>

<body>

    <?=$header?>

    <div class="container">
        <ul class="list-group">
            <?=$view?>
        </ul>
    </div>

</body>

</html>