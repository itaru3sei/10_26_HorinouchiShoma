<?php
include("functions.php");
$title = "利用者登録";

// headHTMLを作成
$head = headHtml($title);

// header用HTMLを作成
$header = headerHtml();


?>

<!DOCTYPE html>
<html lang="ja">

<?=$head?>

<body>

    <?=$header?>

    <form action="user_insert.php" method="POST" class="container">
        <div class="form-group">
            <label for="user_name">
                <b>利用者名 *</b>
            </label>
            <input type="text" class="form-control" id="user_name" name="user_name">
        </div>
        <div class="form-group">
            <label for="user_kana">
                <b>リヨウシャメイ</b>
            </label>
            <input type="text" class="form-control" id="user_kana" name="user_kana">
        </div>
        <div class="form-group">
            <label for="service">
                <b>利用サービス</b>
            </label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="service[]" id="nursing" value="nursing">
                <label class="form-check-label" for="nursing">訪問看護</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="service[]" id="employment_b" value="employment_b">
                <label class="form-check-label" for="employment_b">就労継続支援</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="service[]" id="gh" value="gh">
                <label class="form-check-label" for="gh">共同生活援助</label>
            </div>
            <input type="checkbox" name="service[]" value="" checked="checked" style="display:none;">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </form>
    
</body>

</html>