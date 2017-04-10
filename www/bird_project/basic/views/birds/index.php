<?php

/* @var $this yii\web\View */

$this->title = 'Birds System';
?>
<style type="text/css">
    body{
    background-image: url('http://www.zastavki.com/pictures/originals/2015/Backgrounds_Silhouette_of_the_bird_on_branch__light_background_102709_.jpg');
    background-size: cover; 
}
.footer
{
    background: rgba(255, 255, 255, 0);
}
</style>

<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 alert alert-info">
                <h3>Добавить статическую страницу</h3><br>
                <a href="index.php?r=birds/create-static-page"><button class="bttn-jelly bttn-md bttn-success">Нажми</button></a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-3 col-lg-offset-3 alert alert-success">
                <h3>Показать всех птиц</h3><br>
                <a href="index.php?r=birds/views-birds"><button class="bttn-jelly bttn-md bttn-success">Нажми</button></a>
            </div>
            <div class="col-lg-3 alert alert-success">
                <h3>Добавить птицу</h3><br>
                <a href="index.php?r=birds/create-bird"><button class="bttn-jelly bttn-md bttn-success">Нажми</button></a>
            </div>
        </div>
        <h2 align="center">Добавить/изменить</h2>
        <div class="row">
            <div class="col-lg-4 alert alert-warning">
                <h3>Семейство</h3><br>
                <a href="index.php?r=birds/create-edit&modelName=Family"><button class="bttn-jelly bttn-md bttn-warning">Нажми</button></a>
            </div>
            <div class="col-lg-4 alert alert-warning">
                <h3>Род</h3><br>
                <a href="index.php?r=birds/create-edit&modelName=Kind"><button class="bttn-jelly bttn-md bttn-warning">Нажми</button></a>
            </div>
            <div class="col-lg-4 alert alert-warning">
                <h3>Отряд</h3><br>
                <a href="index.php?r=birds/create-edit&modelName=Squad"><button class="bttn-jelly bttn-md bttn-warning">Нажми</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 alert alert-info">
                <h3>Статус</h3><br>
                <a href="index.php?r=birds/create-edit&modelName=Status"><button class="bttn-jelly bttn-md bttn-primary">Нажми</button></a>
            </div>
            <div class="col-lg-4 alert alert-info">
                <h3>Место</h3><br>
                <a href="index.php?r=birds/create-edit&modelName=Place"><button class="bttn-jelly bttn-md bttn-primary">Нажми</button></a>
            </div>
            <div class="col-lg-4 alert alert-info">
                <h3>Численность</h3><br>
                <a href="index.php?r=birds/create-edit&modelName=Population"><button class="bttn-jelly bttn-md bttn-primary">Нажми</button></a>
            </div>
        </div>
    </div>
</div>