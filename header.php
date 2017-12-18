<?php
session_start();
 define(ok,1);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Welcom to my Blog. find out more about me as a web developer">
<meta name="keywords" content="web development, portfolio, blog, Revital Kirov">
<meta name= "robot" content=" index,all">
<meta name="author" content="Revital Kirov">
<meta name="revisit-after" content="period">
<script src="https://use.fontawesome.com/e27fccaaf6.js"></script> <!--font awsem SDN-->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="js/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" href="css/reset.css">
<!--<link rel="stylesheet" href="css/font-awesome.min.css">-->
<!--<link rel="stylesheet" href="css/paraxify.css">-->
<link rel="stylesheet" href="css/main.css">

<!--<link rel="shortcut icon" href="">-->

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js "></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js "></script>
<![endif]-->
<title>Revital Kirov Site</title>
</head>
<body>
<header>
<?php
	if($_SESSION['loged'])
	{
		require_once ('logout.php');
	}
	else
	{	
		require_once ('registration-login.php');
	}
?>
