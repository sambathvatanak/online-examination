<?php include 'inc/header.php'; ?>

<div class="main">
<h3>Online Examination System - User Login</h3>
	<div class="segment" style="margin-right:30px;">
				<h5>Take our free computer test</h5>
				<p>The test only takes 10 minutes.Answer each of the 25 questions carefully. After each question indicate how sure you are of your answer (Certain, Fairly sure, Not sure). </p>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table class="tbl">
			 <tr>
			   <td>Email</td>
			   <td><input name="email" type="text" id="email"></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input name="password" type="password" id="password"></td>
			 </tr>

			  <tr>
			  <td></td>
			   <td><input type="submit" id="loginsubmit" value="Login" style="background-color:#28a745; color:#fff;margin-right:65px;" class="btn btn-success">
			   </td>
			 </tr>
       </table>
	   </form>
	   <p>New User ? <a href="register.php">Signup</a> Free</p>
	   <span class="empty" style="display: none;">Field must not be empty !</span>
	   <span class="error" style="display: none;">Email or Password not matched !</span>
	   <span class="disable" style="display: none;">User Id disabled !</span>
	</div>
</div>
<?php include("inc/footer.php");
