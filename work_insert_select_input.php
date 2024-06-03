<!-- *************************** -->
<!-- bySara  list.php -->
<!-- ************************ -->


<!-- <!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>DB連携</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 border-right">
                <ul class="list-unstyled">






                    ?php for ($i = 0; $i < 3; $i++) : ?>
                        <li class="media mt-5">
                            <a href="#lightbox" data-toggle="modal" data-slide-to="<?= $i; ?>">
                                <img src="img/月.jpg" width="100" height="auto" class="mr-3">
                            </a>
                            <div class="media-body">
                                <h5>Cat.jpg (123.45KB)</h5>
                                <a href="#"><i class="far fa-trash-alt"></i> 削除</a>
                            </div>
                        </li>
                    ?php endfor; ?>




                </ul>
            </div>
            <div class="col-md-4 pt-4 pl-4"> -->



<!-- <form action="work_insert_select_create.php" method="POST" enctype="multipart/form-data"> -->
<!-- action、post⇒POST追加 -->
<!-- <legend>DB連携（入力画面）</legend>
                    <a href="work_insert_select_read.php">一覧画面</a>
                    <div>
                        title: <input type="text" name="taitoru">
                    </div> -->
<!-- ↑title追加 -->
<!-- <div class="form-group"> -->
<!-- <label>画像を選択</label> -->
<!-- picture: <input type="file" name="gazou" required> -->
<!-- ↑image⇒gazou変更 -->
<!-- </div>
                    <button type="submit" class="btn btn-primary">保存</button>
                    <a href="work_insert_select_create.php">create画面</a>
                </form> -->

<!-- ↑なぜか"taitoru"をcreate.phpに送信できない -->




<!-- <form action="work_insert_select_create.php" method="POST" enctype="multipart/form-data"> -->
<!-- enctype追加↑ -->

<!-- <fieldset>
                        <legend>DB連携（入力画面）</legend>
                        <a href="work_insert_select_read.php">一覧画面</a>
                        <div>
                            title: <input type="text" name="taitoru">
                        </div>
                        <div>
                            picture: <input type="file" name="gazou" accept="gazou/*"> -->
<!-- accept追加↑ -->

<!-- </div>
                        <div>
                            <button>submit</button>
                        </div>
                    </fieldset>
                </form>


                <a href="work_insert_select_create.php">create画面</a>





            </div>
        </div>
    </div> -->



<!-- <div class="modal carousel slide" id="lightbox" tabindex="-1" role="dialog" data-ride="carousel" style="position:fixed;"> -->
<!-- ↑style追加 -->

<!-- <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <ol class="carousel-indicators">
                        ?php for ($i = 0; $i < 3; $i++) : ?>
                            <li data-target="#lightbox" data-slide-to="?= $i; ?>" ?php if ($i == 0) echo 'class="active"'; ?>></li>
                        ?php endfor; ?>
                    </ol>

                    <div class="carousel-inner">
                        ?php for ($i = 0; $i < 3; $i++) : ?>
                            <div class="carousel-item ?php if ($i == 0) echo 'active'; ?>">
                                <img src="cat.jpg" class="d-block w-100">
                            </div>
                        ?php endfor; ?>
                    </div>

                    <a class="carousel-control-prev" href="#lightbox" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#lightbox" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html> -->

<!-- ↑ダメだったのでコメントアウト -->





<!--******************************* -->
<!-- 【input.phpファイル】2 -->
<!-- ******************************** -->



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB連携（入力画面）</title>
</head>

<body>
    <form action="work_insert_select_create.php" method="POST" enctype="multipart/form-data">
        <!-- enctype追加↑ -->

        <fieldset>
            <legend>DB連携（入力画面）</legend>
            <a href="work_insert_select_read.php">一覧画面</a>
            <div>
                title: <input type="text" name="taitoru">
            </div>
            <div>
                picture: <input type="file" name="gazou" accept="gazou/*">
                <!-- accept追加↑ -->

            </div>
            <div>
                <button>submit</button>
            </div>
            <!-- <a href="work_insert_select_create.php">create画面</a> -->
            <!-- ↑入れたらダメかも -->

        </fieldset>
    </form>

</body>

</html>






<!--*********************************************************************** -->
<!-- 画像の保存場所を別にして、DBにはファイル名を登録するというやり方  あみさん方面-->
<!-- ******************************************************************** -->






<!-- <!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB連携（入力画面）</title>
</head>

<body>

    ?php if (isset($_POST['upload'])) : ?>
        <p>?php echo $message; ?></p>
    ?php else : ?>


        <form action="work_insert_select_create.php" method="POST" enctype="multipart/form-data"> -->
<!-- enctype追加↑ -->

<!-- <fieldset>
                <legend>DB連携（入力画面）</legend>
                <a href="work_insert_select_read.php">一覧画面</a>
                <div>
                    title: <input type="text" name="taitoru">
                </div>
                <div>
                    picture: <input type="file" name="image" accept="image/*"> -->
<!-- accept追加↑  nameでgazou⇒image変更 -->

<!-- </div>
                <div>
                    <button><input type="submit" name="upload" value="送信">submit</button>
                </div>
            </fieldset>
        </form>

    ?php endif; ?>

</body>

</html> -->