<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<span class='<?php echo $group->group_code;?>' id="code"></span>
<link rel="stylesheet" type="text/css" href="css/diagrama.css">
<div class="col-md-6" id="id">
<h1>Ведомость межсессионного контроля</h1>
<h2>Группа <?php echo $group->group_code; ?> направление "<?php echo $group->group_name;?>" :</h2>
<br>
</div>
<?php 
	if($count!=0):
?>
<div class="col-md-6">
<h1>Cписок топ студентов:
<table class='table table-striped table-hover table-bordered'>
    <thead>
		<tr>
			<td>#</td>
			<td>FIO</td>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach ($msk as $msk)
		{
			if($msk->count_null==0)
			{
				echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td>".$msk->user_fio."</td>";
				echo "</tr>";
				$i++;
			}
		}
		?>
</tbody>
</table>
</h1>
<?php endif; ?>
</div>

<script src="http://d3js.org/d3.v3.min.js"></script>
<script src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>

<script src="js/draw.js" ></script>


