<?php
include("functions.php");

// 入力チェック
if (
    !isset($_POST["user_name"]) || $_POST["user_name"] == ""
) {
    exit("必須項目が入力されていません！");
}

//POSTデータ取得
$user_name = $_POST["user_name"];
$user_kana = $_POST["user_kana"];
$service = $_POST["service"];

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

// DB接続
$pdo = db_conn();

// ユーザー登録SQL
$sql ="INSERT INTO mst_care_user(USER_ID, USER_NAME, USER_KANA, NURSING, EMPLOYMENT_B, GH) VALUES(NULL, :user_name, :user_kana, :nursing, :employment_b, :gh)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":user_name", $user_name, PDO::PARAM_STR);
$stmt->bindValue(":user_kana", $user_kana, PDO::PARAM_STR);
$stmt->bindValue(":nursing", $nursing, PDO::PARAM_STR);
$stmt->bindValue(":employment_b", $employment_b, PDO::PARAM_STR);
$stmt->bindValue(":gh", $gh, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    // SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    errorMsg($stmt);
} else {
    header("Location: alert.php?alert=データを登録しました。");
}







