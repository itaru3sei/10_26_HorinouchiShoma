<?php
include("functions.php");
$title = "データ一覧";

// headHTMLを作成
$head = headHtml($title);

// header用HTML作成
$header = headerHtml($title);

// DB接続
$pdo = db_conn();

// データ表示SQL作成
$sql = "SELECT * FROM moisture_table";
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
        $name = "ユーザー名: ".getUsername($result["name"]);
        $moisture = "水分量: ".$result["moisture"];
        $comment = "コメント: ".$result["comment"];
        $indate = "登録日時: ".$result["indate"];
        $detail = '<a href="detail_nologin.php?id='.$result['id'].'" class="badge badge-primary">detail</a>';
        $view .= "<li class='list-group-item'>
            <p>$id</p>
            <p>$name</p>
            <p>$moisture</p>
            <p>$comment</p>
            <p>$indate</p>
            $detail
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