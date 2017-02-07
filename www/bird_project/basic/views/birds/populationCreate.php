<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
require_once ('menu.php');
?>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'population')->textInput()->label('Численность') ?>

    <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'bttn-fill bttn-md bttn-success' : 'bttn-fill bttn-md bttn-primary']) ?>

<?php ActiveForm::end() ?>