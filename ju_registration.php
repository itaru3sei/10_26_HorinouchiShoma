<?php
include("functions.php");
$title = "受給者証登録";

// headHTMLを作成
$head = headHtml($title);

// header用HTMLを作成
$header = headerHtml();

// ユーザーリストHTMLを作成
$userlist = createUserlist("");


?>

<!DOCTYPE html>
<html lang="ja">

<?=$head?>

<body>

    <?=$header?>

    <form method="POST" action="ju_insert.php" enctype="multipart/form-data" class="container">
        <?=$userlist?>
        <div class="form-group">
            <label for="startdate">
                <b>有効開始日 *</b>
            </label>
            <input type="date" class="form-control" id="startdate" name="startdate">
        </div>
        <div class="form-group">
            <label for="enddate">
                <b>有効終了日 *</b>
            </label>
            <input type="date" class="form-control" id="enddate" name="enddate">
        </div>
        <div class="form-group">
            <label for="image">
                <b>画像 *</b>
            </label>
            <input type="file" name="image" accept="image/*" capture="camera">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </form>
    
</body>

</html>
