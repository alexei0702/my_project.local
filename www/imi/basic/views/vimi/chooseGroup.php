<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<h1>Список групп:</h1>
<?php $form = ActiveForm::begin(['action' =>['vimi/msk'],'method' => 'post']); ?>
<?php
    $items = ArrayHelper::map($groups,'group_code','group_code');
    $params = [
        'prompt' => 'Выберите Группу'
    ];
    echo $form->field($model, 'group_code')->dropDownList($items,$params)->label('');
?>
<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>