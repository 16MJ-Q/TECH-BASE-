<?php
//データを定義する
$name=$_POST["name"];
$comment=$_POST["comment"];
$password=$_POST["password"];
$password=hash("sha256",$password);
//echo $password;
$date=date("Y-m-d\TH:i:sP");
$count=1;
//テキストファイル名を変数$filenameに代入する
$filename='kadai5.txt';
$fp=fopen($filename,'a');
$file=file('kadai5.txt');
//追記モードでファイルを開く


foreach($file as $value){
	$count++;
}
//内容の書式を定義する
$content="$count.'<>'.$name.'<>'.$comment.'<>'.$password.'<>'.$date.\n";
//echo $content;
//fopenで開いたテキストファイルに受け取った文字列データを書き込む
fwrite($fp,$content);
fclose($fp);
echo "<br><br><br>"; 
echo "投稿成功！";
?>
<html>
<head>
<meta http-equiv="refresh" content="1;url='forum_add.php'">
</head>
</html>