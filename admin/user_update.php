
<?php
include('inc/header.php');
$userid = Session::get('user_id');

?>
<script type="text/javascript">

	$(document).ready(function(){
		$("#ModalLoginForm").modal('show');

	$("#close_button").click(function (){
		 // console.log("data works");
		 window.location.href = "users.php";
			  $('#ModalLoginForm').modal('hide');
      return false;
 	});
 });

</script>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$updateUser = $usr->updateUserAdmin($userid, $_POST);
}
?>

<?php
	if (isset($updateUser)) {
		echo $updateUser;
	}
?>
<?php
$getData = $usr->getUserData($userid);
//

//here we can skip while loop for fetching 1 row data
// while ($result = $getData->fetch_assoc()){
if($getData){
 $result = $getData->fetch_assoc();

?>
<div id="ModalLoginForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Update User Info</h3>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="name" value="<?php echo $result['name']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="username" value="<?php echo $result['username']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">E-Mail Address</label>
                        <div>
                            <input type="email" class="form-control input-lg" name="email" value="<?php echo $result['email']; ?>">
                        </div>
                    </div>
  <?php } ?>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">Update</button>
														<button class="btn btn-success" id="close_button" >cancel</button>
                        </div>
												<div>

												</div>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalLoginForm">
    Launch demo modal
</button> -->
