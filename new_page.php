<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="css/sample.css" />
</head>
<body>
    <!-- New screen -->

    <form action="write.php" method="post">

  <div id="new-screen" >
    <div class="layer ">
      <div class="grid-container">
        
        <div class="grid-item">レストラン名</div>
        <div class="grid-item">
          <!-- <textarea name="name" id="name" cols="36" rows="1" class="border border-blue-400" -->
            <!-- style="align-items: start;"></textarea> -->
            <input type="text" id="name" name="name" 
                placeholder="レストラン名を入力" 
                required class="w-2/3 ml-4 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
  
        <div class="grid-item">URL</div>
        <div class="grid-item">
          <!-- <textarea name="kana" id="kana" cols="36" rows="1" class="border border-blue-400" -->
            <!-- style="align-items: start;"></textarea> -->
            <input type="url" id="url" name="url" style="width: 400px"
                placeholder="レストラン情報URLを入力" 
                required class="w-2/3 ml-4 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
      
        </div>
  
        <div class="grid-item">カテゴリー</div>
        <div class="grid-item">
          <select id="category" class="border border-blue-400" style="width:150px" name="category">
            <option value="" selected disabled>選択してください</option>
            <option value="和食"> 和食</option>
            <option value="中華">中華</option>
            <option value="イタリアン">イタリアン</option>
            <option value="フレンチ">フレンチ</option>
            <option value="エスニック">エスニック</option>
            <option value="その他">その他</option>
          </select>
        </div>
  
        <div class="grid-item">評価</div>
        <div class="grid-item">
            <div class="rating w-2/3 ml-4">
              <input type="radio" id="star5" name="rating" value="5">
              <label for="star5" title="5 stars">★</label>
              <input type="radio" id="star4" name="rating" value="4">
              <label for="star4" title="4 stars">★</label>
              <input type="radio" id="star3" name="rating" value="3">
              <label for="star3" title="3 stars">★</label>
              <input type="radio" id="star2" name="rating" value="2">
              <label for="star2" title="2 stars">★</label>
              <input type="radio" id="star1" name="rating" value="1">
              <label for="star1" title="1 star">★</label>
            </div>
        </div>

        <div class="grid-item">感想メモ</div>
        <div class="grid-item">
          <input type="text" id="memo" name="memo" style="width: 400px" 
          placeholder="感想を入力" required class="w-2/3 ml-4 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>

        <!--
        <div class="grid-item">写真アップロード</div>
        <div class="grid-item">
         <input type="file" id="photo" name="photo" accept="image/*" class="w-2/3 ml-4 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
       </div>

      </div>
    </div>
  -->

    <div class="button-container" style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">
      <button id="saveButton">保存</button>
    </div>

  </section>

</div>
</form>
</body>
</html>




