<?php
// POSTデータ確認
// var_dump($_POST);
// exit();




if (
    !isset($_POST['todo']) || $_POST['todo'] === ''
    //||!isset($_POST['deadline']) || $_POST['deadline'] === ''
) {
    exit('入力されていません');
}



$todo = $_POST['todo'];
// $deadline = $_POST['deadline'];








// ↓講義では空欄になってますよ警告ver.
// 数値が間違えて入力された場合のチェック
if (is_numeric($todo)) {
    // 数値が入力された場合はエラーメッセージを表示して処理を終了
    echo "数値は入力できません。";
    exit();
}



// 文字列の長さが17字以上であるかをチェック
if (mb_strlen($todo) >= 17) {
    // 17文字以上の場合はエラーメッセージを表示して処理を終了
    echo "16文字以内で入力してください。";
    exit();
}



// ひらがなが入力された場合のチェック！！
if (!preg_match('/^[ァ-ヶー]+$/u', $todo) && strpos($todo, '@') !== false) {
    // //     // カタカナでない場合はエラーメッセージを表示して処理を終了
    echo "カタカナで入力してください。";
    // exit();
}



// メールアドレスに@が含まれているかチェック！！
if (strpos($todo, '@') !== false) {
    //     // メールアドレスが含まれている場合はエラーメッセージを表示して処理を終了
    echo "メールアドレスは入力しないでください。";
    exit();
}










// DB接続※毎回同じ※YOUR＿DB＿NAMEだけは自分のやつに（今回gs_l10_01に変える


// 各種項目設定
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
// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる．



// SQL作成&実行
$sql = 'INSERT INTO insert_select_table2 (id, title,  created_at, updated_at) VALUES (NULL, :todo,  now(), now())';
// ↑↑↑一旦SQLで動かしたやつ持ってくるチェックのやり方あり


$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
// $stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}
// echo"SQL実行成功";





// SQL実行の処理

header('Location:work_insert_select2_input.php');
exit();
