<?php
	session_start();
	$login=$_POST['username'];
	$password=trim($_POST['password']);
	$errorMessage="Incorrect login or password";
	$DBH = new PDO("mysql:host=localhost;dbname=imi_visiting", "root", "");
	$Null=$DBH->prepare("SELECT * FROM students WHERE username='".$login."' AND password='".$password."'"); 
	$Null->execute();
	$row=$Null->fetch();
	if($row['id']>0){ 
		$Null=$DBH->prepare("SELECT id FROM auditory WHERE number='".$_SESSION['audID']."'");
		$Null->execute();
		$audID=$Null->fetch();	
		//залогинился - записываем в базу
		$date = date("d-m-y H-i");
		$Null = $DBH->prepare("INSERT INTO user_presense (student_id, auditory_id, time) values ('".$row['id']."','".$audID['id']."', '".$date."')");
		$Null->execute();
		echo $row['username']." "."Вы авторизовались в аудитории"." ".$_SESSION['audID'];
}
	else{
		header("Location:funnyScript.php"); 
	}
?>