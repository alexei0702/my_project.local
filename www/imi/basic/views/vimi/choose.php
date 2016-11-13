<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use app\models\Vimi_aud;
use yii\helpers\ArrayHelper;
?>
<h1>Auditory list:</h1>
<?php $form = ActiveForm::begin(); ?>
<?php
    $aud = Vimi_aud::find()->all();
    $items = ArrayHelper::map($aud,'aud_num','aud_num');
    $params = [
        'prompt' => 'Выберите Аудиторию'
    ];
    echo $form->field($model, 'aud_num')->dropDownList($items,$params);
?>
<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>