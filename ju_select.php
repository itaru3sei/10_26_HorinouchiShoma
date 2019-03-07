<?php
include("functions.php");
$title = "受給者証登録";

// headHTMLを作成
$head = headHtml($title);

// header用HTMLを作成
$header = headerHtml();

//DB接続
$pdo = db_conn();

//データ表示SQL作成
$sql = 'SELECT * FROM ju_syuro ORDER BY user_id, startdate DESC';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//データ表示
if ($status==false) {
    errorMsg($stmt);
} else {
    $view='';
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $username = getUsername($result["user_id"]);
        $view .= '<li class="list-group-item">';
        $view .= '<p>【利用者名】'.$username.'</p>';
        $view .= '<p>【有効期間】'.$result['startdate']." ~ ".$result["enddate"].'</p>';
        $view .= '<img src="'.$result['image'].'" alt="image" height="150px">';
        $view .= '<div><a href="ju_detail.php?id='.$result["id"].'" class="badge badge-primary">編集</a>';
        $view .= '<a href="ju_delete.php?id='.$result["id"].'" class="badge badge-danger">削除</a></div>';
        $view .= '</li>';
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