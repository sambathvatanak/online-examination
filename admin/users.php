<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');
	$usr = new User();
?>

<script src='js/all.js'></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('[tool-tip-toggle="tooltip-demo"]').tooltip({
            placement : 'top'

        });
    });
</script>

<?php
	if (isset($_GET['dis'])) {
		$dblid = (int)$_GET['dis'];
		$dblUser = $usr->disableUser($dblid);
	}

	if (isset($_GET['ena'])) {
		$ebllid = (int)$_GET['ena'];
		$eblUser = $usr->enableUser($ebllid);
	}

	if (isset($_GET['del'])) {
		$delid = (int)$_GET['del'];
		$delUser = $usr->deleteUser($delid);
	}

  if (isset($_GET['upUser'])){
    $upid = (int)$_GET['upUser'];
    Session::set("user_id",$upid);
    header("Location:user_update.php");
  }


 ?>

<div class="main">
	<h3>Admin Panel - Manage User</h3>

	<?php
		if (isset($dblUser)) {
			echo $dblUser;
		}

		if (isset($eblUser)) {
			echo $eblUser;
		}

		if (isset($delUser)) {
			echo $delUser;
		}

    // if(issset($upUser)) {
    //   echo $upUser;
    // }

	 ?>
<div class="manageuser">
	<table class="tblone">

		<tr>
			<th width="6%" class="text-center">No</th>
			<th width="25%" class="text-center">Name</th>
			<th width="25%" class="text-center">Username</th>
			<th width="25%" class="text-center">Email</th>
			<th class="text-center">Action</th>
		</tr>
<?php
    $msg = Session::get('message');
echo $msg ?>
<?php
$userData = $usr->getAllUser();
if ($userData) {
	$i = 0;
	while ($result = $userData->fetch_assoc()) {
		$i++;

 ?>
		<tr>
			<td><?php
				if ($result['status'] == '1') {
					echo "<span class='error'>".$i."</span>";
				}else{
					echo $i;
				}
			?>
      </td>

			<td class="text-center"><?php echo $result['name'] ; ?></td>
			<td class="text-center"><?php echo $result['username'] ; ?></td>
			<td class="text-center"><?php echo $result['email'] ; ?></td>
			<td class="text-center">


  				<?php
  					if ($result['status'] == '0') { ?>
  						<a  class="text-center" onclick="return confirm('Are You Sure to Disable')" href="?dis=<?php echo $result['userid'];?>"><i tool-tip-toggle="tooltip-demo" data-original-title="Disable User" class="fas fa-user-slash" style="font-size:20px"></i></a>
  					<?php } else{ ?>
  						<a  class="text-center" onclick="return confirm('Are You Sure to Enable')" href="?ena=<?php echo $result['userid'];?>"><i tool-tip-toggle="tooltip-demo" data-original-title="Enable User" class="fas fa-user" style="font-size:20px"></i></a>
  					<?php }?>
            |&nbsp; <a  class="text-center" onclick="return confirm('Are You Sure to Remove')" href="?del=<?php echo $result['userid'];?>"><i tool-tip-toggle="tooltip-demo" data-original-title="Delete" class="fas fa-trash-alt" style="font-size:20px"></i></span></a>
            |&nbsp; <a class="text-center" href="?upUser=<?php echo $result['userid'];?>"  role="button"><i tool-tip-toggle="tooltip-demo" data-original-title="Update" class="fas fa-user-edit" style="font-size:20px"></i></a>

  			</td>

  		</tr>

  	<?php }} ?>

	</table>

</div>


</div>
<?php include 'inc/footer.php'; ?>
