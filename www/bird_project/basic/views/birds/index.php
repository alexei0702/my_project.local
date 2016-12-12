<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Squad;
use app\models\Family;
use app\models\Kind;
use app\models\Status;
use app\models\StatusConnect;

$this->title = 'Birds';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
body {
  margin: 0;
  padding: 0;
  font: 20px sans-serif;
}
table
{
  width: 100%;
  border-collapse: collapse;
}
th,td 
{
  padding: 5px 10px;
}
.container
{
  width: 100%;
}
</style>
<h1>Birds</h1>
<br>
<p>
        <?= Html::a('Create Bird', ['create-bird'], ['class' => 'btn btn-info']) ?>
</p>

<table class="table table-striped table-hover table-bordered">
<thead>
<tr>
<th>#</th>
<th>Name</th>
<th>Squad</th>
<th>Family</th>
<th>Kind</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1;
foreach ($birds as $bird): 
$squad = Squad::find()->where(['squad_id' => $bird->squad_id])->one();
$family = Family::find()->where(['family_id' => $bird->family_id])->one();
$kind = Kind::find()->where(['kind_id' => $bird->kind_id])->one();
?>
	    <tr>
            <td><?=$i?></td>
            <td><?= Html::a(Html::encode ("{$bird->bird_name} - {$bird->bird_name_lat}"), "index.php?r=birds/views-details&id=".$bird->bird_id) ?></td>
            <td><?= Html::encode ("{$squad->squad_name} - {$squad->squad_name_lat}") ?> </td>
            <td><?= Html::encode ("{$family->family_name} - {$family->family_name_lat}") ?> </td>
            <td><?= Html::encode ("{$kind->kind_name} - {$kind->kind_name_lat}") ?> </td>
            <td>
            <a href="/bird_project/basic/web/index.php?r=birds%2Fupdate-bird&amp;id=<?=$bird->bird_id?>&amp;name=Bird" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="/bird_project/basic/web/index.php?r=birds%2Fdelete-bird&amp;id=<?=$bird->bird_id?>&amp;name=Bird" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
<?php $i++;
 endforeach;
 ?>
</tbody>
</table>

<?= LinkPager::widget(['pagination' => $pagination]) ?>