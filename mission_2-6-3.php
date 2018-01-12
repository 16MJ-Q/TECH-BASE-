<?php
$filename="kadai5.txt";
$errMsg = "";
if (isset($_POST["modify"])){
    $log=file("$filename");
	$date=date("Y-m-d\TH:i:sP");
    for($i=0;$i<count($log);$i++){
        $line2 = explode(".'<>'.", $log[$i]);
        $bno = $_POST["bno"];
        $name = $_POST['name'];
        $comment = $_POST['comment'];
		$pw=$_POST['password'];
		//echo $pw;
        if($line2[0]==$bno){
            $newline = "$bno.'<>'.$name.'<>'.$comment.'<>'.$pw.'<>'.$date\n";
			//echo $newline;
            array_splice($log,$i,1,"$newline");
        }
    }

    $log2=fopen("$filename","w");
    flock($log2,LOCK_EX);
    foreach($log as $value){
        fwrite($log2, $value);
    }
    flock($log2, LOCK_UN);
    fclose($log2);
	echo "<br><br><br>";
    $errMsg="編集処理完了！";
}
?>
<?php if($errMsg) {echo "<font color=red>$errMsg</font>";}?>
<html>
<head>
<meta http-equiv="refresh" content="1;url='forum_modify.php'">
</head>
</html>
