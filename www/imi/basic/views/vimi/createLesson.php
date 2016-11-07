<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>


    <h1>Создание Урока: </h1>
<?php $form = ActiveForm::begin() ?>
	<?= $form->field($model, 'title')->label('Название'); ?>

	<?= $form->field($model, 'shorttitle')->label('Сокращенное Название') ?>
	
    <?= $form->field($model, 'teacher_id')->label('Преподователь') ?>

    <?= Html::submitButton('Создать', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>

