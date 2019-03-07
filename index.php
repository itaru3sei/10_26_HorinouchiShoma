<?php
include("functions.php");
$title = "受給者証登録";

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

    <div class="container">
        <ul id="echo" class="list-group">
            <!-- データ表示部分 -->
        </ul>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        // DBから取得したデータを表示する関数
        function listData(data) {
            const url = 'ju_get.php';
            $.getJSON(url)
                .done(function (data, textStatus, jqXHR) {
                    console.log(data);

                    // 今日の日付を取得
                    let today = new Date();
                    console.log(today);
                
                    // 表示用HTMLを作成
                    let view = '';
                    for (let i in data) {
                        view += '<li class="list-group-item';
                        // 期限切れに色を付ける
                        var enddate = new Date(data[i].enddate);
                        enddate.setDate(enddate.getDate() + 1);
                        if (today > enddate) {
                            view += ' bg-danger';
                        }
                        view += '">';
                        view += '<p>【利用者名】' + data[i].USER_NAME + '</p>';
                        view += '<p>【有効期間】' + data[i].startdate + " ~ " + data[i].enddate + '</p>';
                        view += '<img src="' + data[i].image + '" alt="image" height="150px">';
                        view += '<div><a href="ju_detail.php?id=' + data[i].id + '" class="badge badge-primary">編集</a>';
                        view += '<a href="ju_delete.php?id=' + data[i].id + '" class="badge badge-danger">削除</a></div>';
                        view += '</li>';
                    }

                    $("#echo").html(view);
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
        }

        // DBからデータを取得する関数
        function selectData() {
            const url = 'ju_get.php';
            $.getJSON(url)
                .done(function (data, textStatus, jqXHR) {
                    console.log(data);
                    var res = data;
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
        }

        // 読み込み時にDBからデータ取得
        selectData();
        listData();

    </script>

</body>

</html>