<?php
require_once ('header.php');
$aud=$DBH->prepare("SELECT aud_num FROM vimi_aud");
$aud->execute();
?>
<div class="container">
<div class="row">
<form class="center form" action="staronline.php" method="POST"> 
        <div class="col-md-6">
        <select name='aud_num' class="form-control">
        <option>Выбери аудиторию</option> 
        <?php
        while ($row=$aud->fetch())
          { 
            echo "<option value='".$row['aud_num']."'>".$row['aud_num']."</option>"; 
          }
        ?>
        </select>
        </div>
        <div class="col-md-6">
        <button class="btn btn-lg btn-primary" type="submit">Перейти к аудитории</button>
        </div>
      </form>
      </div>
</div>
<?php
require_once ('footer.php');
?>