<?php
include('conn.php');
$name=$_POST['name'];
$comment=$_POST['comment'];
$password=MD5($_POST['password']);
//
try{
	$sql="INSERT INTO Article(name,comment,password)
	VALUES('$name','$comment','$password')";
	$conn->exec($sql);
	echo "<script>alert('投稿成功');location.href='forum_addSave.php'</script>";
}
catch(PDOException $e)
{
	echo $sql."<br>".$e->getMessage();
	echo "<br><br><br>失敗しました<br><br>";
	echo '<a href="javascript:history.back(-1);">やり直す</a>';
}
$conn=null;
?>