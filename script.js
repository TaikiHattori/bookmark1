// PHPファイルからテキストを取得する関数
function getText() {
    fetch('work_insert_select2_read.php') // PHPファイルのURL
        .then(response => response.json())
        .then(data => {
            const text = data.text; // テキストを取得
            // ここでテキストを使用して文章を生成し、ブラウザに表示する処理を実装する
            const generatedText = text + "から始まる文章を生成"; // 例：取得したテキストから文章を生成
            document.getElementById('output').innerText = generatedText; // 生成した文章をブラウザに表示
        });
}

getText(); // 関数を実行
