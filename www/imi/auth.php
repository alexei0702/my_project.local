<?php
	session_start();
	$login=trim($_POST['username']);
	$password=trim($_POST['password']);
	$errorMessage="Incorrect login or password";
	$DBH = new PDO("mysql:host=localhost;dbname=imi_visiting", "root", "");
	$Null=$DBH->prepare("SELECT * FROM students WHERE username='".$login."' AND password='".$password."'"); 
	$Null->execute();
	$row=$Null->fetch();
	if($row['id']>0){ 
		//залогинился - записываем в базу
		$Null = $DBH->prepare("UPDATE /*ТаблицаNAME*/ SET status=1 WHERE studID=".$row['id']); 
		$Null->execute();
		echo $row['username']."Вы авторизовались в аудитории".$_GET['audID'];
}
	else{
		header("Location:funnyScript.php"); 
	}
?>