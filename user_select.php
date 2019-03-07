<?php
include("functions.php");
$title = "利用者一覧";

// headHTMLを作成
$head = headHtml($title);

// header用HTMLを作成
$header = headerHtml($title);

// DB接続
$pdo = db_conn();

// データ表示SQL作成
$sql = "SELECT * FROM mst_care_user";
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
        $user_id = "【usre_id】".$result["USER_ID"];
        $user_name = "【利用者名】".$result["USER_NAME"];
        $user_kana = "【リヨウシャメイ】".$result["USER_KANA"];
        $service = "【利用サービス】";
        if ($result["NURSING"]) {
            $service .= "訪問看護 ";
        }
        if ($result["EMPLOYMENT_B"]) {
            $service .= "就労継続支援 ";
        }
        if ($result["GH"]) {
            $service .= "共同生活援助 ";
        }
        $edit = '<a href="user_detail.php?user_id='.$result['USER_ID'].'" class="badge badge-primary">編集</a>';
        $delete = '<a href="user_delete.php?user_id='.$result['USER_ID'].'" class="badge badge-danger">削除</a>';
        $view .= "<li class='list-group-item'>
            <p>$user_id</p>
            <p>$user_name</p>
            <p>$user_kana</p>
            <p>$service</p>
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