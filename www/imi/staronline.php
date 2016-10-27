
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Imi system</title>
      <style>
        .center{  
          text-align: center;
        }
      </style>
     <!--<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="signin.css" rel="stylesheet">-->
	</head>
<body>
	
<div class="container">

        <h2 class="form-signin-heading center">Please sign in</h2>
        <?php
        $dbh = new PDO("mysql:host=localhost;dbname=vimi", "root", "");
        $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
        $dbh->prepare("set character_set_client='utf8'")->execute(); 
        $dbh->prepare("set character_set_results='utf8'")->execute(); 
        $dbh->prepare("set collation_connection='utf8_general_ci'")->execute();
        $students=$dbh->prepare("SELECT * FROM vimi_user");
        $students->execute();
        ?>
        <form class="center" action="staronlineprocessor.php" method="POST"> 
        <select name='user_id'>
        <option>Выбери себя</option> 
        <?php
        while ($row=$students->fetch())
          { 
            echo "<option value='".$row['user_id']."'>".$row["user_fio"]."</option>"; 
          }
        ?>
        </select> 
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <input type="hidden" name="aud_num" value="<?php echo $_GET['audNum']; ?>">
        <br>
        <span style="color : red;"><h1>
        <?php echo @$_GET['messege'] ?>
        </h1>
        </span>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>


</html>
