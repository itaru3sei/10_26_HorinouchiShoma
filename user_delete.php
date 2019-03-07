<?php
// 関数ファイルの読み込み
include("functions.php");

//1. GETデータ取得
$user_id = $_GET["user_id"];

//2. DB接続します(エラー処理追加)
$pdo = db_conn();

//3．データ登録SQL作成
$sql = 'DELETE FROM mst_care_user WHERE USER_ID=:user_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    //select.phpへリダイレクト
    header("Location: alert.php?alert=データを削除しました。");
}
