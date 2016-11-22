<?php
	$DBH = new PDO("mysql:host=localhost;dbname=mydb", "root", "");
	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
    $DBH->prepare("set character_set_client='utf8'")->execute(); 
    $DBH->prepare("set character_set_results='utf8'")->execute(); 
    $DBH->prepare("set collation_connection='utf8_general_ci'")->execute();
?>
<!DOCTYPE html>
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
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid container">
            <p class="navbar-text">Межсессионный контроль студентов ИМИ</p>
        </div>      
    </nav>
    <!--HEADER'S END!!!!!-->
    <!--MAIN BEGINS-->