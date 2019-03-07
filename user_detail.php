<?php
// 関数ファイルの読み込み
include("functions.php");
$title = "ユーザー更新";

// headHTMLを作成
$head = headHtml($title);

// header用HTMLの作成
$header = headerHtml($title);

// getで送信されたidを取得
$user_id = $_GET["user_id"];

//DB接続
$pdo = db_conn();

//データ登録SQL作成，指定したidのみ表示する
$sql = "SELECT * FROM mst_care_user WHERE user_id=:user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if ($status==false) {
    // エラーのとき
    errorMsg($stmt);
} else {
    // エラーでないとき
    $rs = $stmt->fetch();
}

// checked
$checked1 = "";
$checked2 = "";
$checked3 = "";
if ($rs["NURSING"] == 1) {
    $checked1 = "checked='checked'";
}
if ($rs["EMPLOYMENT_B"] == 1) {
    $checked2 = "checked='checked'";
}
if ($rs["GH"] == 1) {
    $checked3 = "checked='checked'";
}

?>


<!DOCTYPE html>
<html lang="ja">

<?=$head?>

<body>

    <?=$header?>

    <form method="post" action="user_update.php" class="container">
        <div class="form-group">
            <label for="user_name">
                <b>利用者名 *</b>
            </label>
            <input type="text" class="form-control" id="user_name" name="user_name" value="<?=$rs["USER_NAME"]?>">
        </div>
        <div class="form-group">
            <label for="user_kana">
                <b>リヨウシャメイ</b>
            </label>
            <input type="text" class="form-control" id="user_kana" name="user_kana" value="<?=$rs["USER_KANA"]?>">
        </div>
        <div class="form-group">
            <label for="service">
                <b>利用サービス</b>
            </label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="service[]" id="nursing" value="nursing" <?=$checked1?>>
                <label class="form-check-label" for="nursing">訪問看護</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="service[]" id="employment_b" value="employment_b" <?=$checked2?>>
                <label class="form-check-label" for="employment_b">就労継続支援</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="service[]" id="gh" value="gh" <?=$checked3?>>
                <label class="form-check-label" for="gh">共同生活援助</label>
            </div>
            <input type="checkbox" name="service[]" value="" checked="checked" style="display:none;">
        </div>
        <input type="hidden" name="user_id" value="<?=$rs['USER_ID']?>">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
    </form>

</body>

</html>