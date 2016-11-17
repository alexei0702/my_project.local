<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="container">
    <div class="row">
<?php $form = ActiveForm::begin() ?>
<div class="col-md-4">
		Дата начала:<?= $form->field($model, 'date')->textInput()->label('') ?>
</div>
<div class="col-md-4">
    <br>
    <?= $form->field($model, 'week')->dropDownList(
        ['1' => 'Четная неделя',
                '2' => 'Нечетная неделя'],
    ['prompt' => 'Выберите Аудиторию'])->label('') ?>
</div>
<div class="col-md-4">
    <br>
    <br>
    <?= Html::submitButton('OK', ['class' => 'btn btn-success btn-lg']) ?>
</div>
<?php ActiveForm::end() ?>
</div>
</div>