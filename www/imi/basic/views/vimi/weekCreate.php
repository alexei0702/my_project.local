<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'date')->textInput() ?>
    
    <?= $form->field($model, 'week')->dropDownList(
        ['1' => 'Четная неделя',
                '2' => 'Нечетная неделя'],
    ['prompt' => 'Выберите Аудиторию']) ?>

    <?= Html::submitButton('OK', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>