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

    <div class="jumbotron">
        <h1>This is BIRDS!</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 alert alert-success">
                <h2>Show all birds</h2>
                <br>
                <p><a class="btn btn-lg btn-info" href="index.php?r=birds/views-birds">Show</a></p>
            </div>
            <div class="col-lg-4 alert alert-danger">
                <h2>Create new birds</h2>
                <br>
                <p><a class="btn btn-lg btn-info" href="index.php?r=birds/create-bird">Create</a></p>
            </div>
            <div class="col-lg-4 alert alert-info">
                <h2>Create/edit/delete other</h2>
                <br>
                <p><a class="btn btn-lg btn-info" href="index.php?r=birds/create-edit">Click</a></p>
            </div>
        </div>

    </div>
</div>
