<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

?>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'family_name')->textInput()->label('Семейство') ?>

    <?= $form->field($model, 'family_name_lat')->textInput()->label('На латинском') ?>

    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>
