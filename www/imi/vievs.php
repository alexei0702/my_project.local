
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">


<?php
$dbh = new PDO("mysql:host=localhost;dbname=vimi", "root", "");
        $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
        $dbh->prepare("set character_set_client='utf8'")->execute(); 
        $dbh->prepare("set character_set_results='utf8'")->execute(); 
        $dbh->prepare("set collation_connection='utf8_general_ci'")->execute();
$stud = $dbh->prepare("SELECT * FROM vimi_aud_user_connect");
$stud->execute();
echo "<div class='container'>";
echo "<h1>"."All Students!"."</h1>";
echo "<table class='table table-striped table-bordered'>";
echo "<thead>";
	echo "<tr>";
	echo "<th>"."#"."</th>";
	echo "<th>"."FIO"."</th>";
	echo "<th>"."Auditory"."</th>";
	echo "<th>"."Time"."</th>";
	echo "</tr>";
	echo "</thead>";
	$i=1;
while($row=$stud->fetch()){
	echo "<tr>";
		echo "<th>".$i."</th>";
		$user = $dbh->prepare("SELECT user_fio FROM vimi_user WHERE user_id=".$row['user_id']);
		$user ->execute();
		$user_fio= $user->fetch();

		echo "<th>".$user_fio['user_fio']."</th>";
		$aud = $dbh->prepare("SELECT aud_num FROM vimi_aud WHERE aud_id=".$row['aud_id']);
		$aud ->execute();
		$aud_num= $aud->fetch();
		echo "<th>".$aud_num['aud_num']."</th>";
		echo "<th>".$row['connect_time']."</th>";
	echo "</tr>";
	$i++;
}
echo "</table>";
echo "</div>";
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>