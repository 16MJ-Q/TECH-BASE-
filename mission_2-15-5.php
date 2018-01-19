<?php
include('conn.php');
$name=$_POST['name'];
$comment=$_POST['comment'];
$number=$_POST['number'];
try{
	$sql="UPDATE Article SET name='$name',comment='$comment' WHERE id='$number'";
	$result=$conn->query($sql);
	echo "<script>alert('更新しました');location.href='forum_modifySave.php'</script>";
}
catch(PDOException $e)
{
	echo $sql."<br>".$e->getMessage();
	echo "<br><br><br>失敗しました<br><br>";
	echo '<a href="javascript:history.back(-1);">やり直す</a>';
}
$conn=null;
?>