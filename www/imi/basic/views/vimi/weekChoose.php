<div class="container">
    <div class="row">
<form action="index.php?r=vimi/week-create" method="POST" class="form">
	<div class="col-md-4">
		Дата начала:<input class="form-control" type="text" name="date">
	</div>
    <div class="col-md-4">
    <br>
    <select class="form-control" name="week">
        <option>Выбери неделю</option>
        <option value="2">Нечетная</option>
        <option value="1">Четная</option>
    </select>
    </div>
    <div class="col-md-4">
    <br>
    	<button type="submit" class="btn btn-lg btn-success">OK</button>
    </div>
</form>
</div>
</div>