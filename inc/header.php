<?php

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	Session::init();
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";

	});
	$db = new Database();
	$fm = new Format();
	$usr = new User();
	$exm_word = new Word_Exam();
	$exm_excel = new Excel_Exam();
	$exm_power = new Power_Exam();

	$pro_word = new Word_Process();
	$pro_excel = new Excel_Process();
	$pro_power = new Power_Process();

	$exm = new Exam();

// header("Cache-Control: no-store, no-cache, must-revalidate");
// header("Cache-Control: pre-check=0, post-check=0, max-age=0");
// header("Pragma: no-cache");
// header("Expires: Mon, 6 Dec 1977 00:00:00 GMT");
// header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<!doctype html>
<html>
<head>
	<title>Online Examination System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/main.js"></script>
	<!-- <script src="js/countdown.js"></script> -->
</head>
<body>


	<?php
	if (isset($_GET['action']) && $_GET['action'] == 'logout') {
		Session::destroy();
		header("Location:index.php");
		exit();
	}
	 ?>

<div class="phpcoding">
	<div class="headeroption">
		<div class="left">
				 area
		</div>
		<div class="mid">
			<img src="img/logo.png">
			<img src="img/name_eng.png" class="name_eng">
		</div>
		<div class="right">

		</div>
	</div>
<!--after change -->
<div>
   <style>
   ul.ul_menu {
     list-style-type: none;
     margin: 0;
     padding: 0;
     overflow: hidden;
     border: 1px solid #e7e7e7;
     background-color: #f3f3f3;
   }

   li {
     float: left;
   }

   li a {
     display: block;
     color: #666;
     text-align: center;
     padding: 10px 16px;
     text-decoration: none!important;
   }

   li a:hover:not(.active) {
     background-color: #ddd;
   }

   li a.active {
     color: white;
     background-color: #4CAF50;
   }
   </style>
   </head>
   <body>

   <ul class="ul_menu">
		 <?php
		 $login = Session::get("login");
		 if ($login == true) {?>

		 <li><a class="active" href="profile.php">Profile</a></li>
		 <li><a href="exam.php">Exam</a></li>
		 <li><a href="?action=logout">Logout</a></li>
		 <span style="float: right;color: #888;margin-top:10px; padding-right:10px;">
 			Welcome: <strong><?php echo Session::get('name'); ?></strong>
 		</span>
	 <?php } else { ?>
		 <li><a class="active" href="register.php">Register</a></li>
		 <li><a href="index.php">Login</a></li>
	 <?php } ?>
   </ul>
</div>
<!-- -->
		<section class="maincontent">
		<div class="menu">
