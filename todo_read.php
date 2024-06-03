<?php

// DB接続

$dbn = 'mysql:dbname=gs_l10_01;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}







// SQL作成&実行※実行したときはデータがそのまま入るわけではない

// ↓狙ったとこ取れてるかチェックここ
$sql = 'SELECT * FROM todo_table ORDER BY deadline ASC';
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
      <td>{$record["deadline"]}</td>
      <td>{$record["todo"]}</td>
    </tr>
  ";
}






?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>DB連携型todoリスト（一覧画面）</legend>
    <a href="todo_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>deadline</th>
          <th>todo</th>
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
  </script>




</body>

</html>