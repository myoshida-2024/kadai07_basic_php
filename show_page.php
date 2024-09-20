<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Show screen -->
    <div id="show-screen" >
        <section id="Filter" class="text-gray-600 body-font">
            <div class="container px-5 py-4 mx-auto mt-6 ">
                <div class="lg:w-full md:w-full mx-auto ">
                    <form action="#" method="post" class="space-y-8 ">
                        <!-- フィルター -->
                        <div class="flex items-center border-b border-gray-300 pb-4">
                            <label for="selectCategory" class="w-1/3 small-text">カテゴリー</label>
                            <select id="selectCategory" name="selectCategory" class="w-2/3 ml-4 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option value="すべて">すべて</option>
                                <option value="和食">和食</option>
                                <option value="中華">中華</option>
                                <option value="イタリアン">イタリアン</option>
                                <option value="フレンチ">フレンチ</option>
                                <option value="エスニック">エスニック</option>
                                <option value="その他">その他</option>
                            </select>
                        </div>

                        <div class="button-container" style="display: flex; justify-content: center; align-items: center; margin-top: -30px; margin-bottom: 50px;">
                            <button type="submit" id="Filter">カテゴリー選択</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section id="content">
            <table border="1" style="width:100%; text-align: left;">
                <thead>
                    <tr>
                        <th>日付</th>
                        <th>レストラン名</th>
                        <th>カテゴリー</th>
                        <th>感想メモ</th>
                        <th>サムネイル</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // get_og_image関数を定義
                    function get_og_image($url) {
                        // 空のURLの場合はnullを返す
                        if (empty($url)) {
                            return null;
                        }

                        // 外部URLのHTMLを取得
                        $html = @file_get_contents($url);

                        // 取得できなかった場合
                        if ($html === FALSE) {
                            return null;
                        }

                        // og:imageの正規表現パターンを使って画像URLを抽出
                        if (preg_match('/<meta property="og:image" content="([^"]+)"/i', $html, $matches)) {
                            return $matches[1]; // 画像URLを返す
                        }

                        return null; // 画像が見つからなかった場合
                    }

                    // フォームから選択されたカテゴリーを取得
                    $selectedCategory = isset($_POST['selectCategory']) ? $_POST['selectCategory'] : 'すべて';

                    // CSVファイルを読み込む
                    $file = fopen("data.csv", "r");
                    if ($file !== FALSE) {
                        // CSVファイルの内容を1行ずつ読み込む
                        while (($data = fgetcsv($file)) !== FALSE) {
                            // 'すべて'が選択された場合はすべての行を表示、それ以外の場合は選択されたカテゴリーのみを表示
                            if ($selectedCategory == "すべて" || $selectedCategory == $data[3]) {
                                echo "<tr>";
                                // 各列データを表示
                                echo "<td>" . htmlspecialchars($data[0]) . "</td>";  // date
                                echo "<td>" . htmlspecialchars($data[1]) . "</td>";  // name
                                echo "<td>" . htmlspecialchars($data[3]) . "</td>";  // category
                                echo "<td>" . htmlspecialchars($data[4]) . "</td>";  // memo

                                // URLからOG画像を取得
                                $url = $data[2];
                                $og_image = get_og_image($url);
                                if ($og_image) {
                                    // 取得したOG画像を表示
                                    echo "<td><a href='" . htmlspecialchars($url) . "' target='_blank'>
                                            <img src='" . htmlspecialchars($og_image) . "' alt='Thumbnail' width='100'>
                                          </a></td>";
                                } else {
                                    // OG画像が取得できなかった場合、URLを表示
                                    echo "<td><a href='" . htmlspecialchars($url) . "' target='_blank'>" . htmlspecialchars($url) . "</a></td>";
                                }

                                echo "</tr>";
                            }
                        }
                        fclose($file);
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
