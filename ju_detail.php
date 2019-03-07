<?php
include("functions.php");
$title = "受給者証更新";

// headHTMLを作成
$head = headHtml($title);

// header用HTMLを作成
$header = headerHtml();

// getで送信されたidを取得
$id = $_GET["id"];

//DB接続
$pdo = db_conn();

//データ登録SQL作成，指定したidのみ表示する
$sql = "SELECT * FROM ju_syuro WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if ($status==false) {
    // エラーのとき
    errorMsg($stmt);
} else {
    // エラーでないとき
    $rs = $stmt->fetch();
}

// ユーザーリストHTMLを作成
$userlist = createUserlist($rs["user_id"]);


?>

<!DOCTYPE html>
<html lang="ja">

<?=$head?>

<body>

    <?=$header?>

    <form method="POST" action="ju_update.php" enctype="multipart/form-data" class="container">
        <?=$userlist?>
        <div class="form-group">
            <label for="startdate">
                <b>有効開始日 *</b>
            </label>
            <input type="date" class="form-control" id="startdate" name="startdate" value="<?=$rs["startdate"]?>">
        </div>
        <div class="form-group">
            <label for="enddate">
                <b>有効終了日 *</b>
            </label>
            <input type="date" class="form-control" id="enddate" name="enddate" value="<?=$rs["enddate"]?>">
        </div>
        <div class="form-group">
            <label for="image">
                <b>画像 *</b>
            </label>
            <input type="file" name="image" accept="image/*" capture="camera">
        </div>        
        <input type="hidden" name="id" value="<?=$rs['id']?>">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
    </form>
    
</body>

</html>
