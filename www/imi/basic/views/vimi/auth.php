<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\VimiUser;
use yii\helpers\ArrayHelper;
?>
<?php $form = ActiveForm::begin() ?>
<?php
	$user_fio = VimiUser::find()->all();

	    $items = ArrayHelper::map($user_fio,'user_id','user_fio');
	    $params = [
	        'prompt' => 'Выбери Себя'
	    ];
	    echo $form->field($user, 'user_id')->dropDownList($items,$params);


?>	
    <?= $form->field($user, 'user_password')->passwordInput() ?>

    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>