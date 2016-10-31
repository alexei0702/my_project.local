<?php
require_once ('header.php');
$stud = $DBH->prepare("SELECT * FROM vimi_aud_user_connect");
$stud->execute();
echo "<div class='container'>";
echo "<h1>"."All Students!"."</h1>";
echo "<table class='table table-striped table-hover'>";
echo "<thead>";
	echo "<tr class='danger'>";
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
		$user = $DBH->prepare("SELECT user_fio FROM vimi_user WHERE user_id=".$row['user_id']);
		$user ->execute();
		$user_fio= $user->fetch();

		echo "<th>".$user_fio['user_fio']."</th>";
		$aud = $DBH->prepare("SELECT aud_num FROM vimi_aud WHERE aud_id=".$row['aud_id']);
		$aud ->execute();
		$aud_num= $aud->fetch();
		echo "<th>".$aud_num['aud_num']."</th>";
		echo "<th>".$row['connect_time']."</th>";
	echo "</tr>";
	$i++;
}
echo "</table>";
echo "</div>";
require_once ('footer.php');
?>