<?php
$filename="kadai5.txt";
$errMsg="";
if(!$_POST['number1']){$errMsg="番号を入力してください<br>";}
if(!$_POST['password2']){$errMsg="パスワードを入力してください<br>";}
if(!$errMsg){
        $bno=$_POST["number1"];
		$pw=$_POST["password2"];
		$pw=hash("sha256",$pw);
        $log=file("$filename");
        for ($i=0; $i<count($log); $i++) {			
            $line=explode(".'<>'.", $log[$i]);
			if($line[3]==$pw){
				if($line[0]==$bno){
					array_splice($log,$i,1);
					$log2=fopen("$filename","w");
					flock($log2,LOCK_EX);
					foreach($log as $value){
						fwrite($log2,$value);
					}
					flock($log2,LOCK_UN);
					fclose($log2);
					echo "<br><br><br>";
					$errMsg="削除処理完了！";
				}else{$errMsg="パスワードは間違っています";}
			}
		}
}
?>
<?php 
if($errMsg){
	echo "<br><br><br><font color=red>$errMsg</font>";
	}
?>
<html>
<head>
<meta http-equiv="refresh" content="1;url='forum_delete.php'">
</head>
</html>
