<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
$this->title = 'Auditory';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>Auditory list:</h1>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'aud_id')->dropDownList($model->AudList, ['id'=>'1aud_id']) ?>
<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>