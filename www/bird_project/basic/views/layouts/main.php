<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<?php $this->title = "Birds"; ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<style>
    .input2
    {
        background-color:transparent;
    }
</style>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<i class="fa fa-twitter" aria-hidden="true"></i> Птички',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if(!Yii::$app->user->isGuest)
    {
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
        '<li>'
                . Html::beginForm(['/birds/search'], 'post', ['class' => 'navbar-form navbar-left'])
                . Html::input('text', 'query', Yii::$app->request->post('string'), ['class' => 'form-control input1','id' => 'form', 'placeholder' => 'Поиск'])
                . ' '
                . Html::submitButton(
                    'Поиск',
                    ['class' => 'btn btn-warning']
                )
                . Html::endForm()
                . '</li>',
        ['label' => 'Режим редактирования', 'url' => ['/birds']],
        Yii::$app->user->isGuest ? (
                ['label' => 'Войти', 'url' => ['/birds/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/birds/logout'], 'post')
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    }
    else 
    {
       echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
        '<li>'
                . Html::beginForm(['/birds/search'], 'post', ['class' => 'navbar-form navbar-left'])
                . Html::input('text', 'query', Yii::$app->request->post('string'), ['class' => 'form-control','id' => 'form'])
                .' '
                . Html::submitButton(
                    'Поиск',
                    ['class' => 'btn']
                )
                . Html::endForm()
                . '</li>',
        Yii::$app->user->isGuest ? (
                ['label' => 'Войти', 'url' => ['/birds/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/birds/logout'], 'post')
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]); 
    }
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-right"> &copy; <?= date('Y') ?> <a href="index.php?r=site/about">Разработано лабораторией программных систем</p></a>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
