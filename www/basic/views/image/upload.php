<?php
use yii\widgets\ActiveForm;

$this->title = 'Create Image';
$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
	<?= $form->field($model, 'name')->textInput() ?>
	
    <?= $form->field($model, 'link')->fileInput() ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>