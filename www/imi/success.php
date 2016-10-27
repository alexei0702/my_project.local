<?php
$DBH = new PDO("mysql:host=localhost;dbname=vimi", "root", "");
	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
        $DBH->prepare("set character_set_client='utf8'")->execute(); 
        $DBH->prepare("set character_set_results='utf8'")->execute(); 
        $DBH->prepare("set collation_connection='utf8_general_ci'")->execute();
$Null=$DBH->prepare("SELECT user_fio FROM vimi_user WHERE user_id=".$_GET['userId']);
$Null->execute();
$row=$Null->fetch();
echo $row['user_fio']." Вы успешно авторизовались в аудитории ".$_GET['aud'];
?>