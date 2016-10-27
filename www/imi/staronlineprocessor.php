<?php
	$login=$_POST['user_id'];
	$password=trim($_POST['password']);
	$aud_num=$_POST['aud_num'];
	$DBH = new PDO("mysql:host=localhost;dbname=vimi", "root", "");
	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
        $DBH->prepare("set character_set_client='utf8'")->execute(); 
        $DBH->prepare("set character_set_results='utf8'")->execute(); 
        $DBH->prepare("set collation_connection='utf8_general_ci'")->execute();
	$Null=$DBH->prepare("SELECT COUNT(*) AS user_count,user_fio FROM vimi_user WHERE user_id='".$login."' AND user_password='".$password."'"); 
	$Null->execute();
	$row=$Null->fetch();
	if($row['user_count']==1){ 
		$aud_id=$DBH->prepare("SELECT aud_id FROM vimi_aud WHERE aud_num='".$aud_num."'");
		$aud_id->execute();
		$audID=$aud_id->fetch();
		if($audID['aud_id']!=0){	
		//залогинился - записываем в базу
		$date = date('y-m-d H-i-s');
		$Null = $DBH->prepare("INSERT INTO vimi_aud_user_connect (user_id, aud_id, connect_time) VALUES ('".$login."','".$audID['aud_id']."', '".$date."')");
		$Null->execute();
		header("Location:success.php?aud=".$aud_num."&userId=".$login);
}
else
{
	header("Location:staronline.php?messege=Incorrect auditory&audNum=".$aud_num); 
}
}
	else{
		header("Location:staronline.php?messege=Incorrect password&audNum=".$aud_num); 
	}
?>