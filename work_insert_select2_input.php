<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB連携（入力画面）</title>
</head>

<body>
    <form action="work_insert_select2_create.php" method="POST">
        <fieldset>
            <legend>DB連携（入力画面）</legend>
            <a href="work_insert_select2_read.php">一覧画面</a>
            <div>
                title: <input type="text" name="todo">
            </div>
            <!-- <div>
                deadline: <input type="date" name="deadline">
            </div> -->
            <div>
                <button>submit</button>
            </div>
        </fieldset>
    </form>

</body>

</html>