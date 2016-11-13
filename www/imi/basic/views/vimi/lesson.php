<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Teacher;
use yii\helpers\ArrayHelper;
?>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'title')->textInput()->label('Название') ?>
    
    <?= $form->field($model, 'shorttitle')->textInput()->label('Сокращенное Название') ?>
<?php
    $teacher = Teacher::find()->all();
// формируем массив, с ключем равным полю 'id' и значением равным полю 'name' 
    $items = ArrayHelper::map($teacher,'teacher_id','Name');
    $params = [
        'prompt' => 'Выберите Преподователя'
    ];
    echo $form->field($model, 'teacher_id')->dropDownList($items,$params);
?>
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>