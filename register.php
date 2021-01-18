<?php include 'inc/header.php'; ?>
<div class="main">
<div class="reg-h3">
	<h4>Online Testing System - User Registration</h4>
</div>
		<div class="segment" style="margin-left:210px";>
	<form action="" method="post" style="font-size:16px"; class="form-inline">
		<table>
		<tr>
           <td>Name</td>
           <td><input type="text" name="name" id="name"></td>
         </tr>
		<tr>
           <td>Username</td>
           <td><input name="username" type="text" id="username"></td>
         </tr>
         <tr>
           <td>Password</td>
           <td><input type="password" name="password" id="password"></td>
         </tr>

         <tr>
           <td>E-mail</td>
           <td><input name="email" type="text" id="email" ></td>
         </tr>
         <tr>
           <td></td>
           <td>
						 <input type="submit" id="regsubmit" value="Signup" style="background-color:#28a745; color:#fff;margin-right:65px;" class="btn btn-success">
           </td>
         </tr>
       </table>
	   </form>
	   <p>Already Registered ? <a href="index.php">Login</a> Here</p>

     <span id="state"></span>
	</div>



</div>
<?php include 'inc/footer.php'; ?>
