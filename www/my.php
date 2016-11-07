<?php
$DBH = new PDO("mysql:host=localhost;dbname=vimi.bsu.ru","root","");
	/*$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
    $DBH->prepare("set character_set_client='utf8'")->execute(); 
    $DBH->prepare("set character_set_results='utf8'")->execute(); 
    $DBH->prepare("set collation_connection='utf8_general_ci'")->execute();*/

   $STH = $DBH->prepare("SELECT name FROM Table");
   $STH->execute();
   while($row = $STH->fetch()){
   	echo $row['name'];
   	echo "<br>";
   }

   echo 11111;
?>