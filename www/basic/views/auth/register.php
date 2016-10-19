<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Videos */

$this->title = 'Register User';
$this->params['breadcrumbs'][] = $this->title;
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'user' => $user,
    ]) ?>


