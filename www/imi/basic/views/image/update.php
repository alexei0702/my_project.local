<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Videos */

$this->title = 'Update Image: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Image', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

