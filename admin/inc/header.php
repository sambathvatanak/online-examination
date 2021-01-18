<?php
    include_once ("../lib/Session.php");
    Session::checkAdminSession();
    include_once ("../lib/Database.php");
    include_once ("../helpers/Format.php");
    include_once ("../classes/User.php");
	$db  = new Database();
	$fm  = new Format();
  $usr = new User();
?>

<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: pre-check=0, post-check=0, max-age=0");
header("Pragma: no-cache");
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<!doctype html>
<html>
<head>
	<title>Admin</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<link rel="stylesheet" href="css/admin.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
</head>
<body>
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

	<?php
	if (isset($_GET['action']) && $_GET['action'] == 'logout') {
		Session::destroy();
		header("Location:login.php");
		exit();
	}
	 ?>
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
     <li class="menuLink"><a class="active" href="index.php">Home</a></li>
     <li><a href="users.php">Manage User</a></li>
     <li><a href="manage_quesadd.php">Add Ques</a></li>
     <li><a href="manage_ques.php">Ques List</a></li>
     <li><a href="result.php">Result</a></li>
     <li><a href="?action=logout">Logout</a></li>
   </ul>
</div>

		<section class="maincontent">
  		<div class="menu1">
  		<!-- <ul>
  			<li class="menuLink"><a href="index.php">Home</a></li>
  			<li><a href="users.php">Manage User</a></li>
  			<li><a href="manage_quesadd.php">Add Ques</a></li>
  			<li><a href="manage_ques.php">Ques List</a></li>
        <li><a href="queslist.php">Result</a></li>
  			<li><a href="?action=logout">Logout</a></li>
  		</ul> -->

  	  </div>
