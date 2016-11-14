<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
<<<<<<< HEAD
=======

>>>>>>> abbcc38ac6d19139c281fe162c468f651fdfa523
?>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'group_name')->textInput()->label('Название Группы') ?>
    <?= $form->field($model, 'group_code')->textInput()->label('Код группы') ?>

    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>