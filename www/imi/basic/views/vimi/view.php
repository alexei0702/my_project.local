<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Schedule;
?>
<style>
    html,
        body {
            margin: 0;
            padding: 0;
        }
table, .container {
            width: 100%;
            border-collapse: collapse;
        }
        th,
        td {
            border: #ccc 1px solid;
            padding: 5px 10px;
        }

</style>
<?php $count_pair=0;?>

	<div class="container">
    <div class="row">
    <div class="col-md-4">
    <select class="form-control">
        <option>Выбери неделю</option>
        <option>Нечетная(текущая)</option>
        <option>Четная</option>
    </select>
    </div>
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Выбрать</button>
    </div>
    </div>
    <br>
</div>
<table class='table table-striped table-hover table-bordered'>
    <thead>
<tr>
        <th style="background-color: #59595A;"></th>
        <th style="background-color: #59595A;"></th>
        <td colspan="<?php $cnt = Schedule::getPair(1);
        				echo $cnt;
        				$count_pair+=$cnt;?>" class="danger">Понедельник</td>
        <td colspan="<?php $cnt = Schedule::getPair(2);
        				echo $cnt;
        				$count_pair+=$cnt;?>" class="warning">Вторник</td>
        <td colspan="<?php $cnt = Schedule::getPair(3);
        				echo $cnt;
        				$count_pair+=$cnt;?>" class="success">Среда</td>
        <td colspan="<?php $cnt = Schedule::getPair(4);
        				echo $cnt;
        				$count_pair+=$cnt;?>" class="info">Четверг</td>
        <td colspan="<?php $cnt = Schedule::getPair(5);
        				echo $cnt;
        				$count_pair+=$cnt;?>" style="background-color: #4340E2;">Пятница</td>
        <td colspan="<?php $cnt = Schedule::getPair(6);
        				echo $cnt;
        				$count_pair+=$cnt;?>" style="background-color: #B240E2;">Суббота</td>
        </tr>
        <tr>
        <th style="background-color: #59595A;"></th>
        <th style="background-color: #59595A;"></th>
        <th colspan="<?php $cnt = Schedule::getPair(1);
        				echo $cnt;?>">11-11-11</th>
        <th colspan="<?php $cnt = Schedule::getPair(2);
        				echo $cnt;?>">12-12-12</th>
        <th colspan="<?php $cnt = Schedule::getPair(3);
        				echo $cnt;?>">13-13-13</th>
        <th colspan="<?php $cnt = Schedule::getPair(4);
        				echo $cnt;?>">14-14-14</th>
        <th colspan="<?php $cnt = Schedule::getPair(5);
        				echo $cnt;?>">15-15-15</th>
        <th colspan="<?php $cnt = Schedule::getPair(6);
        				echo $cnt;?>">03-10-16</th>
        </tr>
        <tr>
            <th>№</th>
            <th>ФИО</th>

			<?php foreach ($schedule as $sk): 
				$les = $sk->getLesson($sk->lesson_id);
			?>
			<th><?php echo $les;?></th>
			<?php endforeach;?>
        </tr>
    </thead>
    <tbody>
    	<?php 
    	$num=1;
    	$stud=Schedule::getStudents($_GET['gr']);
    	foreach ($stud as $stud):   	
    	?>
    	<tr>
        <td><?= $num?></td>
        <td><?php echo $stud->Secondname." ".$stud->Name." ".$stud->Patronymic;?></td>
        <?php for($i=1;$i<=$count_pair;$i++):?>
        	<td></td>
        <?php endfor;?>
        </tr>

    	<?php 
    	$num++;
    	endforeach;
    	?>
    </tbody>
 </table>



