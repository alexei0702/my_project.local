<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Vimi</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>

    html,
        body {
            margin: 0;
            padding: 0;
        }
table {
            width: 100%;
            border-collapse: collapse;
        }
        th,
        td {
            border: #ccc 1px solid;
            padding: 5px 10px;
        }

</style>
</head>
<body>
<!--Навигационная лента-->
    <!--Навигационная лента-->
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand">Vimi</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                  <li role="presentation"><a href="#">Views</a></li>
                </ul>
            </div>          
        </div>      
    </nav>
    <!--HEADER'S END!!!!!-->
    <!--MAIN BEGINS-->
    <div class="container">
    <div class="row">
    <div class="col-md-4">
    <select class="form-control">
        <option>Выбери неделю</option>
        <option>Нечетная(текущая)</option>
        <option>Четная</option>
    </select>
    </div>
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Выбрать</button>
    </div>
    </div>
    <br>
</div>
    <table class='table table-striped table-hover table-bordered'>
    <thead>
        <tr>
        <th style="background-color: #59595A;"></th>
        <th style="background-color: #59595A;"></th>
        <td colspan="3" class="danger">Понедельник</td>
        <td colspan="3" class="warning">Вторник</td>
        <td colspan="3" class="success">Среда</td>
        <td colspan="2" class="info">Четверг</td>
        <td colspan="3" style="background-color: #4340E2;">Пятница</td>
        <td colspan="2" style="background-color: #B240E2;">Суббота</td>
        </tr>
        <tr>
        <th style="background-color: #59595A;"></th>
        <th style="background-color: #59595A;"></th>
        <th colspan="3">11-11-11</th>
        <th colspan="3">12-12-12</th>
        <th colspan="3">13-13-13</th>
        <th colspan="2">14-14-14</th>
        <th colspan="3">15-15-15</th>
        <th colspan="2">03-10-16</th>
        </tr>
        <tr>
            <th>№</th>
            <th>ФИО</th>

            <th>ОЗ/Верстка</th>
            <th>Матан</th>
            <th>Диффур</th>

            <th>Арх.Комп.</th>
            <th>Матан</th>
            <th>Прога</th>

            <th>Англ.яз.</th>
            <th>САКОД</th>
            <th>ООП</th>

            <th>АИС</th>
            <th>ФК</th>

            <th>ОЗ/Верстка</th>
            <th>Матан</th>
            <th>Диффур</th>

            <th>САКОД</th>
            <th>ОИК</th>
        </tr>
    </thead>
    <tbody>
<?php $j=1;
for($i=0;$i<10;$i++){ 
?>
    <tr>
        <td><?= $j?></td>
        <td>Ефимов Алексей Павлович</td>
        <td>н</td>
        <td></td>
        <td>н</td>
        <td></td>
        <td></td>
        <td></td>
        <td>н</td>
        <td>н</td>
        <td></td>
        <td>н</td>
        <td></td>
        <td>н</td>
        <td></td>
        <td></td>
        <td></td>
        <td>н</td>
    </tr>
    <tr>
        <td><?= $j+1?></td>
        <td>Серебрюхов Дмитрий Николаевич</td>
        <td>н</td>
        <td></td>
        <td>н</td>
        <td></td>
        <td></td>
        <td></td>
        <td>н</td>
        <td>н</td>
        <td></td>
        <td>н</td>
        <td></td>
        <td>н</td>
        <td></td>
        <td></td>
        <td></td>
        <td>н</td>
    </tr>
    <tr>
        <td><?= $j+2?></td>
        <td>Цыденов Баир Иванович</td>
        <td>н</td>
        <td></td>
        <td>н</td>
        <td></td>
        <td></td>
        <td></td>
        <td>н</td>
        <td>н</td>
        <td></td>
        <td>н</td>
        <td></td>
        <td>н</td>
        <td></td>
        <td></td>
        <td></td>
        <td>н</td>
    </tr>
<?php $j+=3;}?>

    </tbody>
    </table>
        





    
    <!--MAIN END-->
    <!--FOOTER BEGIN-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>