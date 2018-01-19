<?php
include('conn.php');
$number=$_POST['number1'];
$password=MD5($_POST['password2']);
//echo $password;
//echo "<br>";
try{
	$sql=$conn->prepare("SELECT * FROM Article WHERE id='$number'");
	$sql->execute();
    $row=$sql->fetch(PDO::FETCH_NUM);
	//print $result->password;
	//echo $row[3];
	if($row[3]==$password){
		$sql2="DELETE FROM Article WHERE id='$number'";
		$result=$conn->query($sql2);
	    echo "<script>alert('削除しました');location.href='forum_deleteSave.php'</script>";
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