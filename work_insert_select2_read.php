<?php

// DB接続

$dbn = 'mysql:dbname=gs_l10_01_work;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}
// echo("DB接続成功");






// SQL作成&実行※実行したときはデータがそのまま入るわけではない

// ↓狙ったとこ取れてるかチェックここ
$sql = 'SELECT * FROM insert_select_table2 ORDER BY created_at ASC';
// ↑↑↑一旦SQLで動かしたやつ持ってくるチェックのやり方あり

$stmt = $pdo->prepare($sql);




// バインド変数を設定⇒readファイルはフォーム入力を受け取るとかではないので、バインド変数不要↓
// $stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
// $stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);




// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    //$status = ←たろ先生消してた
    $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}




// SQL実行の処理

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);




// echo "<pre>";
// var_dump($result);
// echo "</pre>";
// exit();
// チェックOK




$output = "";
foreach ($result as $record) {
    $output .= "
    <tr>
      
      <td>{$record["title"]}</td>
    </tr>
  ";
}




// データベースからテキストを取得する処理
// $text = $output;
// echo json_encode(["text" => $text]); // テキストをJSON形式で返す







?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB連携（一覧画面）</title>


<!-- 
    <title>自動文章生成</title>
    <script src="script.js" defer></script> JavaScriptファイルを読み込み -->


</head>

<body>
    <fieldset>
        <legend>DB連携（一覧画面）</legend>
        <a href="work_insert_select2_input.php">入力画面</a>
        <table>
            <thead>
                <tr>
                    <!-- <th>deadline</th> -->
                    <th>title</th>
                </tr>
            </thead>
            <tbody>
                <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
                <?= $output ?>
            </tbody>
        </table>
    </fieldset>


    <script>
        const todos = <?= json_encode($result) ?>;
        console.log(todos);




        // PHPファイルからテキストを取得する関数
        // function getText() {
        //     fetch('work_insert_select2_read.php') // PHPファイルのURL
        //         .then(response => response.json())
        //         .then(data => {
        //             const text = data.text; // テキストを取得
        //             // ここでテキストを使用して文章を生成し、ブラウザに表示する処理を実装する
        //             const generatedText = text + "から始まる文章を生成"; // 例：取得したテキストから文章を生成
        //             document.getElementById('output').innerText = generatedText; // 生成した文章をブラウザに表示
        //         });
        // }

        // getText(); // 関数を実行
    </script>


    <div id="output"></div>
    <!-- 生成された文章を表示する場所 -->





</body>

</html>















<?php


// コピー避難


// DB接続

// $dbn = 'mysql:dbname=gs_l10_01_work;charset=utf8mb4;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// DB接続
// try {
//     $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//     echo json_encode(["db error" => "{$e->getMessage()}"]);
//     exit();
// }
// echo("DB接続成功");






// SQL作成&実行※実行したときはデータがそのまま入るわけではない

// ↓狙ったとこ取れてるかチェックここ
// $sql = 'SELECT * FROM insert_select_table2 ORDER BY created_at ASC';
// ↑↑↑一旦SQLで動かしたやつ持ってくるチェックのやり方あり

// $stmt = $pdo->prepare($sql);




// バインド変数を設定⇒readファイルはフォーム入力を受け取るとかではないので、バインド変数不要↓
// $stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
// $stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);




// SQL実行（実行に失敗すると `sql error ...` が出力される）
// try {
//$status = ←たろ先生消してた
//     $stmt->execute();
// } catch (PDOException $e) {
//     echo json_encode(["sql error" => "{$e->getMessage()}"]);
//     exit();
// }




// SQL実行の処理

// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);




// echo "<pre>";
// var_dump($result);
// echo "</pre>";
// exit();
// チェックOK




// $output = "";
// foreach ($result as $record) {
//     $output .= "
//     <tr>

//       <td>{$record["title"]}</td>
//     </tr>
//   ";
// }






?>

<!-- <!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB連携（一覧画面）</title>
</head>

<body>
    <fieldset>
        <legend>DB連携（一覧画面）</legend>
        <a href="work_insert_select2_input.php">入力画面</a>
        <table>
            <thead>
                <tr> -->
<!-- <th>deadline</th> -->
<!-- <th>title</th>
                </tr>
            </thead>
            <tbody> -->
<!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
<!-- ?= $output ?> -->
<!-- </tbody>
        </table>
    </fieldset>


    <script>
        const todos = ?= json_encode($result) ?>;
        console.log(todos);
    </scrip>




</body>

</html> -->