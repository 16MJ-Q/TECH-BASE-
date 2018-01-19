<?php
include('conn.php');
$number=$_POST['number2'];
$password=MD5($_POST['password3']);
//echo $password;
//echo "<br>";
try{
	$sql=$conn->prepare("SELECT * FROM Article WHERE id='$number'");
	$sql->execute();
    $row=$sql->fetch(PDO::FETCH_NUM);
	//print $result->password;
	//echo $row[3];
	if($row[3]==$password){
		echo "<br><br>";
		echo "<font color=blue>$row[0]番が編集できます</font><br>";
		echo "<br><br>";
        echo "<form method=POST action=mission_2-15-5.php>";
        echo "名前<input type='text' name='name' size='20' value='" . $row[1] . "'><br><br>";
        echo "コメント<br><textarea name='comment' rows='15px' cols='36px' value='" . $row[2] . "'></textarea><br>";
        echo "<br><input type='submit' name='modify' value='上書き保存'>
		<input type='hidden' name='number' value='" . $number . "'>
		<input type='hidden' name='password' size='60' value='" . $password . "'><br>";
        echo "</form>";
	}else{
		echo "<br><br><br>パスワードが間違っています";
		echo '<a href="javascript:history.back(-1);">やり直す</a>';
		}
}
catch(PDOException $e)
{
	echo $sql."<br>".$e->getMessage();
	echo "<br><br><br>失敗しました<br><br>";
	echo '<a href="javascript:history.back(-1);">やり直す</a>';
}
$conn=null;
?>