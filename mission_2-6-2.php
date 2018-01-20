<?php
$filename="kadai5.txt";
$errMsg = "";
if(!$_POST['number2']){$errMsg="番号を入力してください<br>";}
if(!$_POST['password3']){$errMsg="パスワードを入力してください<br>";}
if(!$errMsg){
        $bno=$_POST["number2"];
	$pw=$_POST["password3"];
	$pw=hash("sha256",$pw);
        $log=file("$filename");
        for ($i=0; $i<count($log); $i++) {			
            $line=explode(".'<>'.", $log[$i]);
		if($line[3]==$pw){
				if ($line[0]==$bno){
					echo "<br><br><br>";
					echo "<font color=blue>$line[0]番が編集できます</font><br>";
                                        echo "<form method=POST action=mission_2-6-3.php>";
                                        echo "名前<input type='text' name='name' size='20' value='" . $line[1] . "'><br><br>";
                                        echo "コメント<br><textarea name='comment' rows='15px' cols='36px' value='" . $line[2] . "'></textarea><br>";
                                        echo "<br><input type='submit' name='modify' value='上書き保存'>
					      <input type='hidden' name='bno' value='" . $bno . "'>
					      <input type='hidden' name='password' size='60' value='" . $pw . "'><br>";
                                        echo "</form>";
                                 }else{$errMsg="パスワードは間違っています";}
			}
        }
    }

?>
<?php if($errMsg) {
	echo "<br><br><br><font color=red>$errMsg</font>";
	}
?>
