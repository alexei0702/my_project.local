<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
$this->title = 'Auditory';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
<h1>Auditory list:</h1>
<div class="container">
<div class="col-md-6">
<select name="aud_num" class="form-control">
<option>Выбери аудиторию</option> 
<?php 
foreach ($aud as $aud): 
?>
<option value="<?= $aud->aud_id?>"><?= Html::encode ("{$aud->aud_num}	") ?></option>
<?php 
 endforeach;
 ?>
</select>
</div>
<input type="hidden" name="11" value="11">
<div class="col-md-6">
<div class="form-group">
        <button class="btn btn-lg btn-primary" type="submit">Перейти к аудитории <span class="glyphicon glyphicon-arrow-right"></span></button>
    </div>
   </div>
</div>
<?php ActiveForm::end(); ?>