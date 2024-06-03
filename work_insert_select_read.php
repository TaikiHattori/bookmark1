<?php

//*************************************
//1
//************************************ */



// DB接続

$dbn = 'mysql:dbname=gs_l10_01_work;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';


try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}

// echo("DB接続成功");
//DB接続成功が表示されたらOK
//⇒echoコメントアウト



// SQL作成&実行  ※実行したときはデータがそのまま入るわけではない

// ↓狙ったとこ取れてるかチェックここ
$sql = 'SELECT * FROM insert_select_table ORDER BY created_at ASC';
// ↑↑↑一旦SQLで動かしたやつ持ってくるチェックのやり方がある

$stmt = $pdo->prepare($sql);




// ここ不要↓（バインド変数不要）  readファイルはフォーム入力を受け取るとかではないので。
// $stmt->bindValue(':todo', $todo, PDO::PARAM_STR); //ここコメントアウトのまま
// $stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);  //ここコメントアウトのまま



// SQL実行
try {
    //     //$status = ←たろ先生消してた
    $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// echo("SQL実行成功");
//SQL実行成功が表示されたらOK（実行に失敗すると `sql error ...` が出力される）
//⇒echoコメントアウト




// SQL実行の処理

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);



// echo "<pre>";
// var_dump($result);
// echo "</pre>";
// exit();
//⇒read一覧画面にDBのテーブルに保存されたデータが連想配列状態できれいに表示される





// ---------------------------------
// 講義
// -------------------------

// $output = "";
// foreach ($result as $record) {
//     $output .= "
//     <tr>
//       <td>{$record["title"]}</td>
//       <td>{$record["picture"]}</td>
//     </tr>
//   ";
// }

//↑ここは"title"と"picture"



// ---------------------------------------
// 画像のパス表示1☓  ※
// ----------------------------


$output = "";
foreach ($result as $record) {

    //     //画像のパスを表示
    $output .= "
    <tr>
      <td>{$record["title"]}</td>
      <td><img src='img/月.jpg/{$record["picture"]}' alt='picture'></td>
    </tr>";
}

//画像マークぽいのは一覧画面に表示されたが、画像はまだ表示されていない





// ---------------------------------------
// 画像のパス表示2☓  ※["picture"]の直後に?と>があるが、コメントアウトできなかったので、消してる↓
// ----------------------------

// $output = "";
// foreach ($result as $record) {

//     //画像のパスを表示
//     $output .= "
//     <tr>
//       <td>{$record["title"]}</td>
//       <td><img src='<?= $record["picture"] ' alt='picture'></td>
//     </tr>";
// }













//*************************************
//2  bySaraでいうimage.phpファイル
//************************************ */


// DB接続
// $dbn = 'mysql:dbname=gs_l10_01_work;charset=utf8mb4;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';


// try {
//     $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//     echo json_encode(["db error" => "{$e->getMessage()}"]);
//     exit();
// }

// echo ("DB接続成功");
//⇒ここまでOK








// --------------------------------------------
//↓この間でエラーが起きている  なっしーさん方面
// ----------------------------------------------

// SQL作成&実行  ※実行したときはデータがそのまま入るわけではない

// $sql = 'SELECT * FROM insert_select_table WHERE id = :id LIMIT 1';
// ↑↑↑一旦SQLで動かしたやつ持ってくるチェックのやり方がある

// $stmt = $pdo->prepare($sql);


// 講義ではここ不要↓（バインド変数不要）  readファイルはフォーム入力を受け取るとかではないので。
// $stmt->bindValue(':todo', $todo, PDO::PARAM_STR); //ここコメントアウトのまま
// $stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);  //ここコメントアウトのまま

//「'id' パラメータがない」というエラーが表示されたが、そもそも'id' パラメータあるのか？を確かめる
// if (isset($_GET['id'])) {
// 'id' パラメータが存在する場合の処理
// $stmt->bindValue(':id', (int)$_GET['id'], PDO::PARAM_INT);
//↑追加  gpt曰く要る

// $id = $_GET['id']; // リクエストパラメータからidを取得
//     $stmt->bindParam(':id', $id, PDO::PARAM_INT);
// } else {
// 'id' パラメータが存在しない場合の処理
//     echo "id パラメータがありません。";
// }
// --------------------------------
// ↑この間でエラーが起きている
// --------------------------------






// SQL実行
// try {
//$status = ←たろ先生消してた
//     $stmt->execute();
// } catch (PDOException $e) {
//     echo json_encode(["sql error" => "{$e->getMessage()}"]);
//     exit();
// }
// echo ("SQL実行成功");




// SQL実行の処理
// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);



// echo "<pre>";
// var_dump($result);
// echo "</pre>";
// exit();
//⇒read一覧画面にDBのテーブルに保存されたデータが連想配列状態できれいに表示される
// チェックOK
//⇒コメントアウト



// ---------------------------------
// 講義
// -------------------------

// $output = "";
// foreach ($result as $record) {
//     $output .= "
//     <tr>
//       <td>{$record["title"]}</td>
//       <td>{$record["picture"]}</td>
//     </tr>
//   ";
// }

//↑ここは"title"と"picture"



// ---------------------------------------
// 画像のパス表示1☓  ※
// ----------------------------


// $output = "";
// foreach ($result as $record) {

//     //画像のパスを表示
//     $output .= "
//     <tr>
//       <td>{$record["title"]}</td>
//       <td><img src='img/月.jpg/{$record["picture"]}' alt='picture'></td>
//     </tr>";
// }

//画像マークぽいのは一覧画面に表示されたが、画像はまだ表示されていない



// -----------------------------------------------------------
// 画像のパス表示2☓  ※["picture"]の直後に?と>があるが、コメントアウトできなかったので、消してる↓
// --------------------------------------------------------

// $output = "";
// foreach ($result as $record) {

//     //画像のパスを表示
//     $output .= "
//     <tr>
//       <td>{$record["title"]}</td>
//       <td><img src='<?= $record["picture"] ' alt='picture'></td>
//     </tr>";
// }









// ↓あみさん方面
// $dsn = "mysql:host=localhost; dbname=xxx; charset=utf8";
// $username = "xxx";
// $password = "xxx";
// $id = rand(1, 5);
// try {
//     $dbh = new PDO($dsn, $username, $password);
// } catch (PDOException $e) {
//     echo $e->getMessage();
// }
// $sql = "SELECT * FROM images WHERE id = :id";
// $stmt = $dbh->prepare($sql);
// $stmt->bindValue(':id', $id);
// $stmt->execute();
// $image = $stmt->fetch();
// ↑あみさん方面









?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB連携（一覧画面）</title>
</head>

<body>


    <!-- ↓あみさん方面
<h1>画像表示</h1>
<img src="images/?php echo $image['name']; ?>" width="300" height="300">
<a href="upload.php">画像アップロード</a>
↑あみさん方面 -->


    <fieldset>
        <legend>DB連携（一覧画面）</legend>
        <a href="work_insert_select_input.php">入力画面</a>
        <table>
            <thead>
                <tr>
                    <th>title</th>
                    <th>picture</th>
                </tr>
            </thead>
            <tbody>
                <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
                <?= $output ?>
            </tbody>
        </table>
    </fieldset>


    <script>
        const pictures = <?= json_encode($result) ?>;
        console.log(pictures);
    </script>


</body>

</html>