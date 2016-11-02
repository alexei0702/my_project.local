<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Vimi_user;
use app\models\Vimi_aud;
$this->title = 'Views';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>All Students</h1>
<br>
<div class="container">
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>#</th>
<th>FIO</th>
<th>Auditory</th>
<th>Time</th>
</tr>
</thead>
<tbody>
<?php $i=1;
foreach ($stud as $stud): 
?>
	    <tr>
            <th><?=$i?></th>
            <?php $query = Vimi_user::find()->where(['user_id'=>$stud->user_id])->one(); ?>
            <th><h4><?= Html::encode ("{$query->user_fio}") ?></h4> </th>
    
    
            <th>
            <?php $query = Vimi_aud::find()->where(['aud_id'=>$stud->aud_id])->one(); ?>
            <h4><?= Html::encode ("{$query->aud_num}") ?></h4>
            </th>
            <th>
            <h4><?= Html::encode ("{$stud->connect_time}") ?></h4>
            </th>
        </tr>
<?php $i++;
 endforeach;
 ?>
</tbody>
</table>
</div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>