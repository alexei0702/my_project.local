<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
	
<?php $form = ActiveForm::begin() ?>
	<?= $form->field($user, 'user_id')->textInput()->label('Login') ?>

    <?= $form->field($user, 'user_password')->passwordInput()->label('Password') ?>

    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>