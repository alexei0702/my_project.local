<?php
require_once ('header.php');
$group=$DBH->prepare("SELECT * FROM groups");
$group->execute();
?>
<div class="container">
<div class="row">
<form class="center form" action="groupMSK.php" method="POST"> 
        <div class="col-md-6">
        <select name='aud_num' class="form-control">
        <option>Выберите группу</option> 
        <?php
        while ($row=$group->fetch())
          { 
            echo "<option value='".$row['group_id']."'>".$row['group_code']."</option>"; 
          }
        ?>
        </select>
        </div>
        <div class="col-md-6">
        <button class="btn btn-lg btn-primary" type="submit">Перейти</button>
        </div>
      </form>
      </div>
</div>
