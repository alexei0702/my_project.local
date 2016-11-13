<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Groups;
use yii\helpers\ArrayHelper;
?>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'Secondname')->textInput()->label('Фамилия') ?>

	<?= $form->field($model, 'Name')->textInput()->label('Имя') ?>

    <?= $form->field($model, 'Patronymic')->textInput()->label('Отчество') ?>
<?php
    $group = Groups::find()->all();
// формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
    $items = ArrayHelper::map($group,'group_id','group_name');
    $params = [
        'prompt' => 'Выберите Группу'
    ];
    echo $form->field($model, 'group_id')->dropDownList($items,$params);
?>


    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>