<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'Secondname')->textInput()->label('Фамилия') ?>

	<?= $form->field($model, 'Name')->textInput()->label('Имя') ?>

    <?= $form->field($model, 'Patronymic')->textInput()->label('Отчество') ?>

    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>