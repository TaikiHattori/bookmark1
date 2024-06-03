<?php

//******************************************** */
// create 1   うまくいかなかったのを丸ごと置いとく
//******************************************** */

// POSTデータ確認
// var_dump($_POST);
// exit();

// <input type="file"> でアップロードされたファイルは $_FILES に格納され、$_POST には含まれません。
//したがって、var_dump($_POST) を使用しても、アップロードされた画像のデータを取得することはできません。
//array(1) { ["taitoru"]=> string(3) "お" }というテキストだけ表示された状態でOK
// ⇒ここまでOK


// var_dump($_FILES['gazou']);
// exit();


// array(6) { 
//["name"]=> string(19) "ボウリング.jpg"   //アップロードされたファイルの名前
//["full_path"]=> string(19) "ボウリング.jpg"   //アップロードされたファイルのフルパス
//["type"]=> string(10) "image/jpeg"   //アップロードされたファイルの MIME タイプ
//["tmp_name"]=>string(52) "C:\Users\Taiki Hattori\Desktop\xampp\tmp\phpDBA3.tmp"   //アップロードされたファイルが一時的に保存されている場所
//["error"]=>int(0)   //アップロード中に発生したエラーコード（この場合、int(0) はエラーが発生しなかったことを示します）
//["size"]=> int(47939) }  //アップロードされたファイルのサイズ

// という表示が出た
// ⇒エラーではない。ファイルが正常にアップロードされたことを示している
//⇒コメントアウト
//⇒ここまでOK

// -------------------------
// 未入力1  ☓
// -----------------------


// if (
//     !isset($_POST['taitoru']) || $_POST['taitoru'] === '' ||
//     !isset($_POST['gazou']) || $_POST['gazou'] === ''
// ) {
//     exit('入力されていません');
// }


// -------------------------
//未入力2  
// -----------------------

// if (
//     !isset($_POST['taitoru']) || $_POST['taitoru'] === '' ||
//     !isset($_FILES['gazou']) || $_FILES['gazou'] === ''
// ) {
//     exit('入力されていません');
// }

// ⇒何も表示なし
// ⇒ここまでOK

// なぜかSaraのinput.phpを用いるとvar_dumpはできているのにここが「入力されていません」となる
// ⇒やはり講義ベースでしないとうまくいかない


// $taitoru = $_POST['taitoru'];
// $gazou = $_FILES['gazou'];

// なぜかSaraのinput.phpを用いるとvar_dumpはできているのにここでエラーが表示される。




// -------------------------------------
// DB接続1  ※元々
//※毎回同じ  ※YOUR＿DB＿NAMEだけは自分のやつに（課題はDB名をgs_l10_01_workにしたのでそれに変える)
// -----------------------------------------


// 各種項目設定
// $dbn = 'mysql:dbname=gs_l10_01_work;charset=utf8mb4;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// // DB接続
// try {
//     $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//     echo json_encode(["db error" => "{$e->getMessage()}"]);
//     exit();
// }

// echo "DB接続成功";
// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる．

//DB接続成功が表示されたらOK
//⇒echoコメントアウト
// ⇒ここまでOK




// -------------------------------------
// DB接続2
//※毎回同じ  ※YOUR＿DB＿NAMEだけは自分のやつに（課題はDB名をgs_l10_01_workにしたのでそれに変える)
// -----------------------------------------
//bySara
//何度も同じコードを書くのは面倒なので functions.php というファイルを作成して、データベース接続する関数を用意bySara

// function connectDB()
// {

// 各種項目設定
// $dbn = 'mysql:dbname=gs_l10_01_work;charset=utf8mb4;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// // DB接続
//     try {
//         $pdo = new PDO($dbn, $user, $pwd);
//         return $pdo;
//         //↑return追加bySara

//     } catch (PDOException $e) {
//         echo json_encode(["db error" => "{$e->getMessage()}"]);
//         exit();
//     }
// }

// echo "DB接続成功";

// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる．
//DB接続成功が表示されたらOK
//⇒echoコメントアウト
// ⇒ここまでOK





//**************************** */
// bySara  functions.php
//********************************* */

// --------------
// DB接続3
// ------------------

// function connectDB()
// {

//     // 各種項目設定
//     $dbn = 'mysql:dbname=gs_l10_01_work;charset=utf8mb4;port=3306;host=localhost';
//     $user = 'root';
//     $pwd = '';

//     // // DB接続
//     try {
//         $pdo = new PDO($dbn, $user, $pwd);
//         return $pdo;
//     } catch (PDOException $e) {
//         exit($e->getMessage());
//     }
// }

// echo "DB接続成功";

// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる．
//DB接続成功が表示されたらOK
//⇒echoコメントアウト
// ⇒ここまでOK









// -------------------------
//画像の保存1 bySara  gazou ver.☓
// ---------------------------

// $pdo = connectDB();

// if ($_SERVER['REQUEST_METHOD'] != 'POST') {
// 画像を取得

// } else {
// 画像を保存
// if (!empty($_FILES['gazou']['name'])) {
//     $name = $_FILES['gazou']['name'];
//     $type = $_FILES['gazou']['type'];
//     $content = file_get_contents($_FILES['gazou']['tmp_name']);
//     $size = $_FILES['gazou']['size'];



//     $sql = 'INSERT INTO insert_select_table (id, title, picture, created_at, updated_at) VALUES (NULL, :title, :picture, now(), now())';

//     $stmt = $pdo->prepare($sql);

//     $stmt->bindValue(':title', $taitoru, PDO::PARAM_STR);





// 画像データをバイナリ形式でデータベースに挿入
// $stmt->bindValue(':picture', file_get_contents($_FILES['gazou']['tmp_name']), PDO::PARAM_LOB);




//☓ $stmt->bindValue(':picture', file_get_contents($tmp_name), PDO::PARAM_LOB);
//☓ $stmt->bindValue(':picture', $gazou, PDO::PARAM_STR);






// $stmt->bindValue(':image_name', $name, PDO::PARAM_STR);
// $stmt->bindValue(':image_type', $type, PDO::PARAM_STR);
// $stmt->bindValue(':image_content', $content, PDO::PARAM_STR);
// $stmt->bindValue(':image_size', $size, PDO::PARAM_INT);
// $stmt->execute();


// SQL実行（実行に失敗すると `sql error ...` が出力される）
//     try {
//         $status = $stmt->execute();
//     } catch (PDOException $e) {
//         echo json_encode(["sql error" => "{$e->getMessage()}"]);
//         exit();
//     }
// }


// echo ("SQL実行成功");
//SQL実行成功のみが表示されたらOK
//⇒echoコメントアウト






// -------------------------
//画像の保存2 bySara  image⇒gazou ver.
// ---------------------------

// $pdo = connectDB();

// if ($_SERVER['REQUEST_METHOD'] != 'POST') {
// 画像を取得

// } else {
// 画像を保存
// if (!empty($_FILES['gazou']['name'])) {
//     $name = $_FILES['gazou']['name'];
//     $type = $_FILES['gazou']['type'];
//     $content = file_get_contents($_FILES['gazou']['tmp_name']);
//     $size = $_FILES['gazou']['size'];



//     $sql = 'INSERT INTO insert_select_table (id, title, picture, created_at, updated_at) VALUES (NULL, :title, :picture, now(), now())';

//     $stmt = $pdo->prepare($sql);


// バインド変数を設定
// $stmt->bindValue(':title', $taitoru, PDO::PARAM_STR);
// $stmt->bindValue(':picture', $gazou, PDO::PARAM_STR);


// $stmt->bindValue(':image_name', $name, PDO::PARAM_STR);
// $stmt->bindValue(':image_type', $type, PDO::PARAM_STR);
// $stmt->bindValue(':image_content', $content, PDO::PARAM_STR);
// $stmt->bindValue(':image_size', $size, PDO::PARAM_INT);
//         $stmt->execute();
//     } else {
//         echo "ファイルのアップロードに失敗しました。";
//     }

//     header('Location:work_insert_select_input.php');
//     exit();
// }

// echo ("SQL実行成功");





// -------------------------------------------
// 画像をアップロードするフォルダ1☓  ※
// -----------------------------------------

// $uploadDir = 'uploads/';

// ファイルが送信されたか確認
// if (isset($_FILES['image'])) {
//     $fileName = $_FILES['image']['name'];
//     $tempName = $_FILES['image']['tmp_name'];
//     $fileType = $_FILES['image']['type'];

// ファイルの拡張子を取得
// $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

// 新しいファイル名を生成
// $newFileName = uniqid() . '.' . $fileExt;

// ファイルを移動
// if (move_uploaded_file($tempName, $uploadDir . $newFileName)) {
// 画像のパスをデータベースに保存
//         $sql = "INSERT INTO insert_select_table (picture) VALUES (:picture)";
//         $stmt = $pdo->prepare($sql);
//         $stmt->bindValue(':picture', $uploadDir . $newFileName, PDO::PARAM_STR);
//         $stmt->execute();
//     } else {
//         echo "ファイルのアップロードに失敗しました。";
//     }
// }


// echo ("画像アップロード成功");
//画像アップロード成功が表示されたらOK
//⇒echoコメントアウト









// -------------------------------------------
// 画像をアップロードするフォルダ2  ※
// -----------------------------------------
// $uploadDir = 'uploads/';

// ファイルが送信されたか確認
// if (isset($_FILES['gazou'])) {
//     $fileName = $_FILES['gazou']['name'];
//     $tempName = $_FILES['gazou']['tmp_name'];
//     $fileType = $_FILES['gazou']['type'];

// ファイルの拡張子を取得
// $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

// 新しいファイル名を生成
// $newFileName = uniqid() . '.' . $fileExt;

// ファイルを移動
// if (move_uploaded_file($_FILES['gazou']['tmp_name'], $uploadDir . $newFileName)) {
// 画像のパスをデータベースに保存
//         $sql = "INSERT INTO insert_select_table (id, title, picture, created_at, updated_at) VALUES (NULL, :title, :picture, now(), now())";
//         $stmt = $pdo->prepare($sql);
//         $stmt->bindValue(':picture', $uploadDir . $newFileName, PDO::PARAM_STR);
//         $stmt->execute();
//     } else {
//         echo "ファイルのアップロードに失敗しました。";
//     }
// }

// echo ("画像アップロード成功");
//画像アップロード成功のみが表示されたらOK
//⇒echoコメントアウト









// --------------------------
// SQL作成&実行  講義
// ------------------------


// $sql = 'INSERT INTO insert_select_table (id, title, picture, created_at, updated_at) VALUES (NULL, :title, :picture, now(), now())';
// // ↑↑↑一旦SQLで動かしたやつ持ってきて、それの中身にバインド変数の：をつけてチェックするやり方がある



// $stmt = $pdo->prepare($sql);

// バインド変数を設定  ※「':title', $taitoru」の意味は⇒「上記の$sql式の:titleに$taitoruを入れる」
// $stmt->bindValue(':title', $taitoru, PDO::PARAM_STR);
// $stmt->bindValue(':picture', $gazou, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
// try {
//     $status = $stmt->execute();
// } catch (PDOException $e) {
//     echo json_encode(["sql error" => "{$e->getMessage()}"]);
//     exit();
// }

// echo("SQL実行成功");

//SQL実行成功が表示されたらOK
//⇒echoコメントアウト

//⇒うまくいけば入力画面でsubmit提出したデータがDBのテーブルに保存される



// header('Location:work_insert_select_input.php');
// exit();















//******************************************** */
// create.phpファイル 2  なっしーさん方面
//******************************************** */

// --------------------
// POSTデータ確認
// ------------------------

// var_dump($_POST);
// exit();
// ⇒ここまでOK

// var_dump($_FILES['gazou']);
// exit();
//⇒ここまでOK

// -------------------------
//未入力 2  
// -----------------------

if (
    !isset($_POST['taitoru']) || $_POST['taitoru'] === ''
    || !isset($_FILES['gazou']) || $_FILES['gazou'] === ''
) {
    exit('入力されていません');
}
// ⇒ここまでOK


$taitoru = $_POST['taitoru'];
$gazou = $_FILES['gazou'];


// echo ($taitoru);
// echo "<br>";
// echo "ファイル名: " . $_FILES['gazou']['name'];
// echo "<br>";
// echo "一時的な保存パス: " . $_FILES['gazou']['tmp_name'];
// echo "<br>";
// echo "ファイルの種類: " . $_FILES['gazou']['type'];
// echo "<br>";
// echo "ファイルサイズ: " . $_FILES['gazou']['size'];

// ⇒ここまでOK


// ----------------------------------------------------------------------------------------------------
// DB接続1  ※元々※毎回同じ  ※YOUR＿DB＿NAMEだけは自分のやつに（課題はDB名をgs_l10_01_workにしたのでそれに変える)
//bySaraでいうfunctions.php
// ------------------------------------------------------------------------------------------------------

// 各種項目設定
$dbn = 'mysql:dbname=gs_l10_01_work;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// // DB接続
try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}
// echo "DB接続成功";
// ⇒ここまでOK



// ---------------------------------
//画像の保存  bySara 1  gazou ver.
//bySaraはlist.phpに書いているが、自分はcreate.phpで良い
// ----------------------------------

if ($_SERVER['REQUEST_METHOD'] != 'POST') {

    // 画像を取得  追加
    // $sql = 'SELECT * FROM insert_select_table ORDER BY created_at DESC';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute();
    // $images = $stmt->fetchAll();
} else {
    // 画像を保存
    if (!empty($_FILES['gazou']['name'])) {
        $name = $_FILES['gazou']['name'];
        $type = $_FILES['gazou']['type'];
        $content = file_get_contents($_FILES['gazou']['tmp_name']);
        $size = $_FILES['gazou']['size'];


        $sql = 'INSERT INTO insert_select_table (id, title, picture, created_at, updated_at) VALUES (NULL, :title, :picture, now(), now())';
        $stmt = $pdo->prepare($sql);

        //テキスト
        $stmt->bindValue(':title', $taitoru, PDO::PARAM_STR);

        // 画像データをバイナリ形式でデータベースに挿入
        $stmt->bindValue(':picture', file_get_contents($_FILES['gazou']['tmp_name']), PDO::PARAM_LOB);
        // ↑一覧画面に大量文字化け出る

        // $stmt->bindValue(':picture', file_get_contents($tmp_name), PDO::PARAM_LOB);
        // $stmt->bindValue(':picture', $gazou, PDO::PARAM_STR);



        // SQL実行（実行に失敗すると `sql error ...` が出力される）
        try {
            $status = $stmt->execute();
        } catch (PDOException $e) {
            echo json_encode(["sql error" => "{$e->getMessage()}"]);
            exit();
        }
    }
}

echo ("SQL実行成功");

//SQL実行成功が表示されたらOK
//⇒echoコメントアウト

//⇒うまくいけば入力画面でsubmit提出したデータがDBのテーブルに保存される


// header('Location:work_insert_select_input.php');
// exit();















//********************************************************************************************* */
// create.phpファイル 3  画像の保存場所を別にして、DBにはファイル名を登録するというやり方  あみさん方面
//***************************************************************************************************** */

// --------------------
// POSTデータ確認
// ------------------------

// var_dump($_POST);
// exit();
// ⇒ここまでOK

// var_dump($_FILES['gazou']);
// exit();
//⇒ここまでOK

// -------------------------
//未入力 2  
// -----------------------

// if (
//     !isset($_POST['taitoru']) || $_POST['taitoru'] === '' ||
//     !isset($_FILES['image']) || $_FILES['image'] === ''
// ) {
//     exit('入力されていません');
// }
// ⇒ここまでOK


// $taitoru = $_POST['taitoru'];
// $gazou = $_FILES['image'];


// echo ($taitoru);
// echo "<br>";
// echo "ファイル名: " . $_FILES['image']['name'];
// echo "<br>";
// echo "一時的な保存パス: " . $_FILES['image']['tmp_name'];
// echo "<br>";
// echo "ファイルの種類: " . $_FILES['image']['type'];
// echo "<br>";
// echo "ファイルサイズ: " . $_FILES['image']['size'];

// ⇒ここまでOK


// ----------------------------------------------------------------------------------------------------
// DB接続1  ※元々※毎回同じ  ※YOUR＿DB＿NAMEだけは自分のやつに（課題はDB名をgs_l10_01_workにしたのでそれに変える)
//bySaraでいうfunctions.php
// ------------------------------------------------------------------------------------------------------

// 各種項目設定
// $dbn = 'mysql:dbname=gs_l10_01_work;charset=utf8mb4;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// // DB接続
// try {
//     $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//     echo json_encode(["db error" => "{$e->getMessage()}"]);
//     exit();
// }
// echo "DB接続成功";
// ⇒ここまでOK



// ---------------------------------
//
// ----------------------------------

// if (isset($_POST['upload'])) {//送信ボタンが押された場合
        // $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
        // // $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
        // $file = "images/$image";
        // $sql = "INSERT INTO insert_select_table(name) VALUES (:image)";
        // $stmt = $dbh->prepare($sql);
        // $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        // if (!empty($_FILES['image']['name'])) {//ファイルが選択されていれば$imageにファイル名を代入
            // move_uploaded_file($_FILES['image']['tmp_name'], './images/' . $image);//imagesディレクトリにファイル保存
            // if (exif_imagetype($file)) {//画像ファイルかのチェック
    //             $message = '画像をアップロードしました';
    //             $stmt->execute();
    //         } else {
    //             $message = '画像ファイルではありません';
    //         }
    //     }
    // }
