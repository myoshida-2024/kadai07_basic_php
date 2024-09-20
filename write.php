<?php

// 日時を取得
$date = date("Y-m-d H:i:s"); // 現在の日付と時刻

$name = $_POST["name"];
$url = $_POST["url"];
$category = $_POST["category"];
$memo = $_POST["memo"];
$c = ",";
$str = $date.$c.$name.$c.$url.$c.$category.$c.$memo;

$file = fopen("data.csv","a"); //aはadd  rはread
fwrite($file, $str."\n"); //"\n"は改行コード
fclose($file);

header("Location: index.php"); //Location: のあとの半角スペースは必須
exit;

