<?php
include('conn.php');
try{
	$sql="CREATE TABLE Article(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(30) NOT NULL,
	comment TEXT NOT NULL,
	password VARCHAR(50),
	date TIMESTAMP
	)";
	$conn->exec($sql);
	echo "テーブル Article を作成しました";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn=null;
?>