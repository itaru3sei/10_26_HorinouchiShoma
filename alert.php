<?php
include("functions.php");
$title = "alert";

// headHTMLを作成
$head = headHtml($title);

// header用HTMLを作成
$header = headerHtml();

$alert = $_GET["alert"];

?>

<!DOCTYPE html>
<html lang="ja">

<?=$head?>

<body>

    <?=$header?>
    <h1 class="container"><?=$alert?></h1>    
    
</body>

</html>