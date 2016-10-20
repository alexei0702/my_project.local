<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php $form = ActiveForm::begin() ?>
	<?= $form->field($user, 'username')->textInput() ?>
	
    <?= $form->field($user, 'password')->passwordInput() ?>

    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>