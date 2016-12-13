<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

$this->title = 'Kind';
$this->params['breadcrumbs'][] = $this->title;

?>
<h1>Kind</h1>
<br>
<p>	
	<a href='index.php?r=birds/create&name=<?= $name?>' class="btn btn-danger"> Create new kind</a>        
    </p>

<table class="table table-striped table-bordered">
<thead>
<tr>
<th>#</th>
<th>Name</th>
<th>Name Lat</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1;
foreach ($edit as $key): 
?>
	    <tr>
            <th><?=$i?></th>
            <th><h3><?= Html::encode ("{$key->kind_name}") ?></h3> </th>
            <th><h3><?= Html::encode ("{$key->kind_name_lat}") ?></h3> </th>
            <th>
            <a href="/bird_project/basic/web/index.php?r=birds%2Fupdate&amp;id=<?=$key->kind_id?>&amp;name=Kind" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="/bird_project/basic/web/index.php?r=birds%2Fdelete&amp;id=<?=$key->kind_id?>&amp;name=Kind" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
            </th>
        </tr>
<?php $i++;
 endforeach;
 ?>
</tbody>
</table>
</div>