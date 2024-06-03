<?php
// POSTデータ確認
// var_dump($_POST);
// exit();




if (
    !isset($_POST['todo']) || $_POST['todo'] === '' ||
    !isset($_POST['deadline']) || $_POST['deadline'] === ''
) {
    exit('入力されていません');
}



$todo = $_POST['todo'];
$deadline = $_POST['deadline'];




// DB接続※毎回同じ※YOUR＿DB＿NAMEだけは自分のやつに（今回gs_l10_01に変える


// todo_create.php

// 各種項目設定
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

// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる．





// SQL作成&実行
$sql = 'INSERT INTO todo_table (id, todo, deadline, created_at, updated_at) VALUES (NULL, :todo, :deadline, now(), now())';
// ↑↑↑一旦SQLで動かしたやつ持ってくるチェックのやり方あり


$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}






// SQL実行の処理

header('Location:todo_input.php');
exit();


// echo"DB接続成功";

// SQL作成&実行
