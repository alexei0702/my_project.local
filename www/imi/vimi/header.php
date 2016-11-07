<?php
	$DBH = new PDO("mysql:host=localhost;dbname=vimi.bsu.ru", "vimi.bsu.ru", "vHW7RKhAX3");
	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
    $DBH->prepare("set character_set_client='utf8'")->execute(); 
    $DBH->prepare("set character_set_results='utf8'")->execute(); 
    $DBH->prepare("set collation_connection='utf8_general_ci'")->execute();
?>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">    
    <title>Vimi</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
.footer {
 position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 60px;
  background-color: #f5f5f5;

}
.comp
{
  text-align: right;
}
.center{  
          text-align: center;
        }
</style>
</head>
<body>
	<!--Навигационная лента-->	
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container-fluid">
			<div class="navbar-header">
			<a class="navbar-brand">Vimi</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
				  <li role="presentation"><a href="views.php">Views</a></li>
				</ul>
			</div>			
		</div>		
    </nav>
    <!--HEADER'S END!!!!!-->
	<!--MAIN BEGINS-->