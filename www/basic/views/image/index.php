<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Image';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>Image</h1>
<br>
<p>

        <?= Html::a('Create Image', ['create'], ['class' => 'btn btn-danger']) ?>
    </p>

<div class="container">
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>#</th>
<th>Name</th>
<th>Link</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1;
foreach ($images as $image): 
?>
	    <tr>
            <th><?=$i?></th>
            <th><h3><?= Html::encode ("{$image->name}") ?></h3> </th>
    
    
            <th>
            <img src="<?='/basic/upload/'.$image->link?>" width="200" height="160" class="img-rounded" alt="111">
            </th>
            <th>
            <a href="/basic/web/index.php?r=image%2Fupdate&amp;id=<?=$image->id?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="/basic/web/index.php?r=image%2Fdelete&amp;id=<?=$image->id?>" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0"><span class="glyphicon glyphicon-trash"></span></a>
            </th>
        </tr>
<?php $i++;
 endforeach;
 ?>
</tbody>
</table>
</div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>