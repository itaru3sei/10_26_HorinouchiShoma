<?php
include('functions.php');

//DB接続
$pdo = db_conn();

//データ表示SQL作成
$sql = 'SELECT * FROM ju_syuro INNER JOIN mst_care_user ON ju_syuro.user_id=mst_care_user.USER_ID ORDER BY ju_syuro.user_id, ju_syuro.startdate DESC';
// ORDER BY user_id, startdate DESC
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//データ表示
if ($status==false) {
    errorMsg($stmt);
} else {
    $res = [];
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $res[] = $result; //配列に入れる
    }
    echo json_encode($res);
}
?>
