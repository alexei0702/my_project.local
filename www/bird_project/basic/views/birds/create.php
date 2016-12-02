<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
<style>
.width
{
	width: 100%;
}	
.textarea
{
	height: 100px;
	width: 700px;
}

</style>


<h1 style="text-align: center;">Birds create</h1>

<?php $form = ActiveForm::begin(['options' => ['class' => 'form']]) ?>

<?= $form->field($bird, 'bird_name')->label('Название'); ?>
<br>
<?php
    $items = ArrayHelper::map($squad,'squad_id','squad_name');
    $params = [
        'prompt' => 'Выберите Отряд'
    ];
    echo $form->field($bird, 'squad_id',['inputOptions' => ['class' => 'form-control width']])->dropDownList($items,$params)->label('');
?>

<br>

<?php
    $items = ArrayHelper::map($family,'family_id','family_name');
    $params = [
        'prompt' => 'Выберите Семейство'
    ];
    echo $form->field($bird, 'family_id',['inputOptions' => ['class' => 'form-control width']])->dropDownList($items,$params)->label('');
?>

<br>

<?php
    $items = ArrayHelper::map($kind,'kind_id','kind_name');
    $params = [
        'prompt' => 'Выберите Род'
    ];
    echo $form->field($bird, 'kind_id',['inputOptions' => ['class' => 'form-control width']])->dropDownList($items,$params)->label('');
?>
<br>
<br>
<h3><p>Статус:</p></h3>
<?php
$items = ArrayHelper::map($status,'status_id','status_name');
echo $form->field($bird, 'status_id')->checkboxList($items)->label('');
?>
<br>
<p><h3>Распространение:</h3></p>
<?php
echo $form->field($bird, 'propagation',['inputOptions' => ['class' => 'textarea']])->textarea()->label('');
?>
<p><h3>Миграции:</h3></p>
<?php
echo $form->field($bird, 'migration',['inputOptions' => ['class' => 'textarea']])->textarea()->label('');
?>
<p><h3>Местообитания</h3></p>
<?php
echo $form->field($bird, 'habitat',['inputOptions' => ['class' => 'textarea']])->textarea()->label('');
?>
<br>
<p><h3>Численность:</h3></p>
<div class="col-lg-5">
<?php
    $items = ArrayHelper::map($population,'population_id','count');
    $params = [
        'prompt' => 'Численность'
    ];
    echo $form->field($model, 'population',['inputOptions' => ['class' => 'form-control']])->dropDownList($items,$params)->label('');
?>
</div>
<div class="col-lg-5">
<?php
       $items = ArrayHelper::map($place,'place_id','place_name');
    $params = [
        'prompt' => 'Место'
    ];
    echo $form->field($model, 'place',['inputOptions' => ['class' => 'form-control']])->dropDownList($items,$params)->label('');
?>
</div>
<div class="col-lg-2">
<button class="btn btn-lg btn-default form-group" type="submit">add</button>
</div>
<div class="clearfix"></div>
<br>
<br>	
<button class="btn btn-default form-group" type="submit">Обзор</button>
<img src="images/1.jpg" width="700" height="500">
<br>
<br>
<button class="btn btn-lg btn-primary form-group" type="submit">Сохранить</button>
<?php ActiveForm::end() ?>
