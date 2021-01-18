<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
$userid = Session::get('userid');
$usr = new User();
//$userid = $usr->getUserID();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	 $updateUser = $usr->updateUserData($userid, $_POST);
	 $usr->UpdateSessionUser();
}

?>
<style>
	.profile{width: 440px;margin: 0 auto;border: 1px solid #ddd;padding: 30px 50px 50px 60px;}
</style>

<div class="main">
<h3>Your Profile</h3>
<div class="profile">

   <?php
if (isset($updateUser)) {
	echo $updateUser;
}

	 ?>
	<form action="" method="post">
	<?php
	$getData = $usr->getUserData($userid);
	//
	if ($getData) {
	//here we can skip while loop for fetching 1 row data
	while ($result = $getData->fetch_assoc()){
	// $result = $getData->fetch_assoc();
	?>
		<table class="tbl">
		     <tr>
			   <td>Name</td>
			   <td><input name="name" type="text" value="<?php echo $result['name'] ?>" /></td>
			 </tr>
			  <tr>
			   <td>Username</td>
			   <td><input name="username" type="text" value="<?php echo $result['username'] ?>"/></td>
			 </tr>
			 <tr>
			   <td>Email</td>
			   <td><input name="email" type="text" value="<?php echo $result['email'] ?>"/></td>
			 </tr>
			  <tr>
			  <td></td>
			   <td><input class="btn btn-success" type="submit" value="Update">
			   </td>
			 </tr>
    </table>

	<?php }} ?>
	</form>
	   </div>
</div>
<?php include 'inc/footer.php'; ?>
