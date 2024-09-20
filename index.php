<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <title>ランチメモ</title>
    <script src="js/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="css/sample.css" />
  </head>

  <div class="mainvisual">
    <div class="layer layer-bg items-start">
      <div class="layer-txt">
        <p class="text-white"> Lunch Memo </p>
      </div>
    </div> 
  </div>

<body>

<main>

<!-- Initial screen  -->
  <div id="start-screen" style="display: flex; justify-content: center; align-items: center; height: 50vh; gap:20px;">

    <input type="button" id="new-button" class="image-button image-button-text" value="入力 " 
    style="width: 240px; height: 100px; background-image: url('./img/restaurant-button.png'); 
    background-size: cover; background-repeat: no-repeat; background-position: center; 
    color: white; font-weight: bold; font-size: 36px; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    display: flex; align-items: center; justify-content: center; text-align: center;" />
    <input type="button" id="show-button" class="image-button image-button-text" value="参照 " 
    style="width: 240px; height: 100px; background-image: url('./img/restaurant-button.png'); 
    background-size: cover; background-repeat: no-repeat; background-position: center; 
    color: white; font-weight: bold; font-size: 36px; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    display: flex; align-items: center; justify-content: center; text-align: center;" />

  </div>


   


</main>

    <footer style="font-size:medium">G's</footer>

<script>
 
    let obj=[];

      $("main").slideDown(10);

      $(document).ready(function () {
// ボタンのクリックイベントで入力画面に切り替える
    $("#new-button").on("click", function () {
        window.location.href = "new_page.php";
      });

// ボタンのクリックイベントで出力画面に切り替える
      $("#show-button").on("click", function () {
        window.location.href = "show_page.php";

        $("#Filter").on("click", function () {
        let selectedCategory = $("#selectCategory").val(); // 選択されたカテゴリーを取得
        console.log (selectedCategory);  
        });

       // ローカルストレージから値を取得
      let R_obj = localStorage.getItem("R_obj"); // 既存のデータを取得
      let existingData = R_obj ? JSON.parse(R_obj) : [];

     // outputHtmlの初期化
      let outputHtml = "<ul style='display: flex; flex-wrap: wrap; gap: 10px; padding:0; margin:0; list-style:none;'>";

      if (selectedCategory == "すべて") {
        console.log("すべて");
       // すべてのデータを表示
       existingData.forEach(function(item) {
            outputHtml += "<li style='display: flex; align-items: flex-start; gap: 10px; border: 1px solid #ddd; padding: 10px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);'>";
            
            // テキストの塊をdivで囲む
            outputHtml += "<div style='width: 500px;'>";
            outputHtml += item.r_date + "<br>";       
            outputHtml += item.r_name + "<br>";
            outputHtml += " <a href='" + item.r_url + "' target='_blank'>" + item.r_url + "</a><br>";
            outputHtml += item.r_category + "<br>";
            outputHtml += item.r_rating + "<br>";
            outputHtml += item.r_memo + "<br>";
            outputHtml += "</div>";

            // 画像として表示
            if (item.r_photo) {
                outputHtml += "<img src='" + 
                item.r_photo + "' alt='写真' style='max-width: 200px; max-height: 200px;'><br>";
            }
            outputHtml += "</li>";
        });
      }
      else {
      // 選択されたカテゴリーでデータをフィルタリング
      let filteredData = existingData.filter(function(item) {
            return item.r_category === selectedCategory;
        });

        filteredData.forEach(function(item) { // ここでfilteredDataを使う
            outputHtml += "<li style='display: flex; align-items: flex-start; gap: 10px; border: 1px solid #ddd; padding: 10px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);'>";
        
            // テキストの塊をdivで囲む
            outputHtml += "<div style='width: 200px;'>";
            outputHtml += item.r_date + "<br>";       
            outputHtml += item.r_name + "<br>";
            outputHtml += " <a href='" + item.r_url + "' target='_blank'>" + item.r_url + "</a><br>";
            outputHtml += item.r_category + "<br>";
            outputHtml += item.r_rating + "<br>";
            outputHtml += item.r_memo + "<br>";
            outputHtml += "</div>";

            // 画像として表示
            if (item.r_photo) {
                outputHtml += "<img src='" + 
                item.r_photo + "' alt='写真' style='max-width: 200px; max-height: 200px;'><br>";
            }
            outputHtml += "</li>";
        });
      }

      outputHtml += "</ul>";

      // sorted-content内に表示
      $("#sorted-content").html(outputHtml);
      $("#sorted-content").css("font-size","16px");
    
    });
  })
        
      //1.Save クリックイベント
      $("#saveButton").on("click", function () {
        let today = new Date();
        let year = today.getFullYear();
        let month = String(today.getMonth() + 1).padStart(2, '0');
        let day = String(today.getDate()).padStart(2, '0');
        // "YYYY-MM-DD" 形式の日付文字列を作成
        let formattedDate = `${year}-${month}-${day}`;
    
        // ファイル入力から選択されたファイルを取得
        let fileInput = document.getElementById('photo');
        let file = fileInput.files[0];
   
        // ファイルをBase64形式に変換
        let reader = new FileReader();
        reader.readAsDataURL(file);

        let rating = $("input[name='rating']:checked").val(); // 選択された星評価を取得
       

        reader.onload = function() {
        let R_obj = {
            r_name: $("#name").val(),
            r_url: $("#url").val(),
            r_category: $("#category").val(),
            r_memo: $("#memo").val(),
            r_date: formattedDate,
            r_photo: reader.result, // ここにBase64エンコードされた画像データを格納
            r_rating: rating
          };


        let existingObj = localStorage.getItem("R_obj"); // 既存のデータを取得
        let existingData = existingObj ? JSON.parse(existingObj) : [];
       
      // 配列に追加する
      existingData.push(R_obj);

        // ローカルストレージにオブジェクト全体を保存
       localStorage.setItem("R_obj", JSON.stringify(existingData));
       alert("保存しました");











        // ローカルストレージに r_Idを個別に保存
        // localStorage.setItem("r_Id", R_obj.r_Id);
      }
    }
    );
    
    </script>
     <script src="./js/script.js"></script>
  </body>
</html>
