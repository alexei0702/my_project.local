<?php
use app\models\Schedule;

?>
<?php if($model->week==1)
        $week = "Четная неделя";
      else
        $week = "Нечетная неделя";

?>
<h2><?php echo $week; ?></h2>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>Понедельник (<?= $model->date?>):</h3><br>
            <?php 
                $title = Schedule::getLessonLong(1,$_GET['gr']);
                foreach ($title as $title) {
                    echo $title->title;
                    echo "<br>";
                }
            ?>
        </div>
        <div class="col-md-4">
            <h3>Вторник (<?= $model->date?>):</h3><br>
            <?php 
                $title = Schedule::getLessonLong(2,$_GET['gr']);
                foreach ($title as $title) {
                    echo $title->title;
                    echo "<br>";
                }
            ?>
        </div>
        <div class="col-md-4">
            <h3>Среда (<?= $model->date?>):</h3><br>
            <?php 
                $title = Schedule::getLessonLong(3,$_GET['gr']);
                foreach ($title as $title) {
                    echo $title->title;
                    echo "<br>";
                }
            ?>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-4">
            <h3>Четверг (<?= $model->date?>):</h3><br>
            <?php 
                $title = Schedule::getLessonLong(4,$_GET['gr']);
                foreach ($title as $title) {
                    echo $title->title;
                    echo "<br>";
                }
            ?>
        </div>
        <div class="col-md-4">
            <h3>Пятница (<?= $model->date?>):</h3><br>
            <?php 
                $title = Schedule::getLessonLong(5,$_GET['gr']);
                foreach ($title as $title) {
                    echo $title->title;
                    echo "<br>";
                }
            ?>
        </div>
        <div class="col-md-4">
            <h3>Суббота (<?= $model->date?>):</h3><br>
            <?php 
                $title = Schedule::getLessonLong(6,$_GET['gr']);
                foreach ($title as $title) {
                    echo $title->title;
                    echo "<br>";
                }
            ?>
        </div>
    </div>
</div>