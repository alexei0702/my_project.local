<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Squad;
use app\models\Family;
use app\models\Kind;
use app\models\Status;
use app\models\StatusConnect;

?>

<h1 style="text-align: center;">Птички</h1>
<br>
<br>
<div class="row">
<?php
foreach ($birds as $bird): 
$squad = Squad::find()->where(['squad_id' => $bird->squad_id])->one();
$family = Family::find()->where(['family_id' => $bird->family_id])->one();
$kind = Kind::find()->where(['kind_id' => $bird->kind_id])->one();
?>
<div class="col-lg-4">
            <a href='index.php?r=site/views-details&id=<?=$bird->bird_id?>'>
            <img src="<?= '/bird_project/basic/upload/'.$bird->link?>" width="300" class="img-rounded" alt="111"></a>
            <br>
            <?= Html::a(Html::encode ("{$bird->bird_name} - {$bird->bird_name_lat}"), "index.php?r=site/views-details&id=".$bird->bird_id) ?><br>
            <?= Html::encode ("{$squad->squad_name} - {$squad->squad_name_lat}") ?> <br>
            <?= Html::encode ("{$family->family_name} - {$family->family_name_lat}") ?><br>
            <?= Html::encode ("{$kind->kind_name} - {$kind->kind_name_lat}") ?> <br>
</div>
<?php 
 endforeach;
 ?>
 </div>
<div class="clear-fix"></div>
<?= LinkPager::widget(['pagination' => $pagination]) ?>