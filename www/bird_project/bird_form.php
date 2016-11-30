<?php
include ('header.php');
?>


<h1 style="text-align: center;">Birds create</h1>
<div class="container">
<form class="form" action="#" method="POST">
<select class="form-control">
	<option>Выберите Отряд</option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
</select>
<br>
<select class="form-control">
	<option>Выберите Семейство</option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
</select>
<br>
<select class="form-control">
	<option>Выбери род</option>
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
</select>
<br>
<h3><p>Статус:</p></h3>
<label><input type="checkbox" name="1">Редкий</label><br>
<label><input type="checkbox" name="1">Перелетный</label><br>
<label><input type="checkbox" name="1">Гнездящийся</label><br>
<label><input type="checkbox" name="1">Залетный</label><br>
<label><input type="checkbox" name="1">И т.д.</label><br>
<br>
<p><h3>Распространение:</h3></p>
<p><textarea name="2" style="width: 700px; height: 100px;"></textarea></p>
<p><h3>Миграции:</h3></p>
<p><textarea name="2" style="width: 700px; height: 100px;"></textarea></p>
<p><h3>Местообитания и численность:</h3></p>
<p><textarea name="2" style="width: 700px; height: 100px;"></textarea></p>
<br>
<button class="btn btn-lg btn-primary" type="submit">Сохранить</button>
</form>
</div>

</body>
</html>
