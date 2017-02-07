<?php

/* @var $this yii\web\View */

$this->title = 'Birds System';
require_once ('menu.php');
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
p.info
{
    font-family: fantasy;
    font-size: 28px;
}
p.info-sm
{
    font-family: COMIC SANS MS;
    font-size: 20px;
}
h1
{
    font-family: MV BOLI;
}
</style>

<div class="site-index">

    <div class="jumbotron">
        <h1>Режим разработчика!</h1>
    </div>

    <div class="body-content">
        <p class="info text-center">Добро пожаловать в режим редактирования.</p>
        <p class="info-sm text-center">Здесь вы можете добавить новые данные в базу или изменить уже существующие.</p>
        <p class="info-sm text-center">Для переключения между страницами используйте меню (кнопка в верхнем левом углу).</p>
    </div>
</div>