<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
<?php $form = ActiveForm::begin(['options' => ['class' => 'form']]) ?>
<?php
    $items = array('Family' => 'Семейство',
    			   'Kind' => 'Род',
    			   'Squad' => 'Отряд',
    			   'Status' => 'Статус',
    			   'Place' => 'Место',
    			   'Population' => 'Численность');
    $params = [
        'prompt' => 'Выберите Что вы ходите изменить'
    ];
    echo $form->field($create, 'modelName')->dropDownList($items,$params)->label('');
?>

<button class="btn btn-lg btn-primary form-group" type="submit">Выбрать</button>

<?php ActiveForm::end() ?>
