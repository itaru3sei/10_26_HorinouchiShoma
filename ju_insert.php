<?php
include('functions.php');

// 入力チェック
if (
    !isset($_POST['user_id']) || $_POST['user_id']=='' ||
    !isset($_POST['user_id']) || $_POST['user_id']=='' ||
    !isset($_POST['startdate']) || $_POST['startdate']=='' ||
    !isset($_POST['startdate']) || $_POST['startdate']=='' ||
    !isset($_POST['enddate']) || $_POST['enddate']=='' ||
    !isset($_POST['enddate']) || $_POST['enddate']==''
) {
    exit('必須項目が入力されていません。');
}

//POSTデータ取得
$user_id = $_POST['user_id'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];

//Fileアップロードチェック
if (isset($_FILES['image']) && $_FILES['image']['error'] ==0) {
    // ファイルをアップロードしたときの処理
    // ①送信ファイルの情報取得
    $file_name = $_FILES['image']['name']; //ファイル名
    $tmp_path = $_FILES['image']['tmp_name']; //tmpフォルダ
    $file_dir_path = 'upload/';

    // ②File名の準備
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $uniq_name = date('YmdHis').md5(session_id()) . "." . $extension;
    $file_name = $file_dir_path.$uniq_name;

    // ③サーバの保存領域に移動&④表示
    $img='';
    if (is_uploaded_file($tmp_path)) {
        if (move_uploaded_file($tmp_path, $file_name)) {
            chmod($file_name, 0644);
        } else {
        exit('Error:画像をアップロードできませんでした．');
        }  
    }

} else {
    // ファイルをアップしていないときの処理
    exit("画像が選択されていません。");
}


// DB接続
$pdo = db_conn();

// データ登録SQL作成
// imageカラムとバインド変数を追加
$sql ='INSERT INTO ju_syuro(id, user_id, startdate, enddate, image)
VALUES(NULL, :user_id, :startdate, :enddate, :image)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':startdate', $startdate, PDO::PARAM_STR);
$stmt->bindValue(':enddate', $enddate, PDO::PARAM_STR);
$stmt->bindValue(':image', $file_name, PDO::PARAM_STR);
$status = $stmt->execute();


//データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    header("Location: alert.php?alert=データを登録しました。");
}
