<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<title>mission_2 プログラミングブログ</title>
<script>
function InputCheck(forum){
	if (forum.name.value=="")
  {
    alert("名前を入力してください");
    forum.name.focus();
    return (false);
  }
  if (forum.comment.value=="")
  {
    alert("コメントを入力してください");
    forum.comment.focus();
    return (false);
  }
  if(forum.password.value=="")
  {
	  alert("パスワードを入力してください");
	  forum.password.focus();
	  return(false);
  }
}
function myrefresh(){ 
window.location.reload(); 
} 
setTimeout('myrefresh()',10000);
</script>
</head>


<body>
<form action="mission_2-2.php" method="post" class="comment" onsubmit="return InputCheck(this)" name="forum">
<!-formタグで入力フォームを作って、入力した後、データ値は”mission_2-2.php”まで送る->
<br><br>
<div class="thin">
<!-見出し->
  <h3 style="color:#FFFFFF;">&nbsp;&nbsp;&nbsp;&nbsp;プログラミングブログ</h3>
</div>
<div class="thick">
  <font color="red">*</font>名前：<input type="text"  placeholder="&nbsp;&nbsp;&nbsp;&nbsp;社団太郎"class="su" name="name"/><br><br>
  <font color="red">*</font>コメント：<textarea id="text" name="comment" style="width:360px;height:150px;"></textarea><br><br>
  <font color="red">*</font>パスワード：<input type="password" class="su" name="password"/><br><br>
  <button type="submit">送信</button>&nbsp;&nbsp;&nbsp;&nbsp;
  <button type="reset">リセット</button><br><br>
</div>
</form>
<hr>
<?php
//テキストファイル名を変数$filenameに代入する
$filename='kadai5.txt';
//読み込むモードでファイルを開く
$fp=fopen($filename,'r');
//fgets関数でファイルの内容を1行ずつ読み出す
while($line=fgets($fp)){
	$arr=explode(".'<>'.",$line);
	$arr2=array_slice($arr,0,3);
	foreach($arr2 as $array){
		echo $array." ";
	}
	echo "<br>";
}
fclose($fp); 
?>
</body>
</html>
