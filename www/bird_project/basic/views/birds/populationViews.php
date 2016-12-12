<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

$this->title = 'Population';
$this->params['breadcrumbs'][] = $this->title;

?>
<h1>Population</h1>
<br>
<p>	
	<a href='index.php?r=birds/create&name=<?= $name?>' class="btn btn-danger"> Create new population</a>        
    </p>

<table class="table table-striped table-bordered">
<thead>
<tr>
<th>#</th>
<th>Designations</th>
<th>Population</th>
<th>Description</th>
<th>Demention</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1;
foreach ($edit as $key): 
?>
	    <tr>
            <th><?=$i?></th>
            <th><h3><?= Html::encode ("{$key->population_designations}") ?></h3> </th>
            <th><h3><?= Html::encode ("{$key->population}") ?></h3> </th>
            <th><h3><?= Html::encode ("{$key->population_description}") ?></h3> </th>
            <th><?= Html::encode ("{$key->population_dimension_start}") ?>-<?= Html::encode ("{$key->population_dimension_end}") ?> </th>
            <th>
            <a href="/bird_project/basic/web/index.php?r=birds%2Fupdate&amp;id=<?=$key->population_id?>&amp;name=Population" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="/bird_project/basic/web/index.php?r=birds%2Fdelete&amp;id=<?=$key->population_id?>&amp;name=Population" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
            </th>
        </tr>
<?php $i++;
 endforeach;
 ?>
</tbody>
</table>
</div>

