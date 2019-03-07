<?php
// 関数ファイル読み込み
include("functions.php");

//入力チェック(受信確認処理追加)
if (
    !isset($_POST["user_name"]) || $_POST["user_name"] == ""
) {
    exit("必須項目が入力されていません！");
}

//POSTデータ取得
$user_name = $_POST["user_name"];
$user_kana = $_POST["user_kana"];
$service = $_POST["service"];
$user_id = $_POST["user_id"];

// 配列要素の分配
if (in_array("nursing", $service)) {
    $nursing = 1;
} else {
    $nursing = "NULL";
}
if (in_array("employment_b", $service)) {
    $employment_b = 1;
} else {
    $employment_b = "NULL";
}
if (in_array("gh", $service)) {
    $gh = 1;
} else {
    $gh = "NULL";
}


//DB接続します(エラー処理追加)
$pdo = db_conn();

//データ更新SQL作成
$sql = "UPDATE mst_care_user SET USER_NAME=:user_name, USER_KANA=:user_kana,  NURSING=:nursing, EMPLOYMENT_B=:employment_b, GH=:gh WHERE USER_ID=:user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":user_name", $user_name, PDO::PARAM_STR);
$stmt->bindValue(":user_kana", $user_kana, PDO::PARAM_STR);
$stmt->bindValue(":nursing", $nursing, PDO::PARAM_STR);
$stmt->bindValue(":employment_b", $employment_b, PDO::PARAM_STR);
$stmt->bindValue(":gh", $gh, PDO::PARAM_STR);
$stmt->bindValue(":user_id", $user_id, PDO::PARAM_STR);
$status = $stmt->execute();

//データ更新処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    header("Location: alert.php?alert=データを更新しました。");
}
