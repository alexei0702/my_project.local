<?php
require_once ('header.php');
$Null=$DBH->prepare("SELECT user_fio FROM vimi_user WHERE user_id=".$_GET['userId']);
$Null->execute();
$row=$Null->fetch();
?> 
<h1>  <p><span class="text-success glyphicon glyphicon-ok"></span> <?php echo $row['user_fio'];?> Вы успешно авторизовались в аудитории № <?php echo $_GET['aud'];?></p></h1><br>
<p style="text-align: center;"><img class="" src='https://pp.vk.me/c626926/v626926848/3b236/Kusri0RV-B0.jpg'>
</p>

<?php

require_once ('footer.php');

?>