<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Power_Exam.php');
  $exm_power = new Power_Exam();
  $quesNo = Session::get('quesNo');
?>
<style>
.adminpanel{width: 480px;color: #999;margin: 20px auto 0;padding: 30px;border: 1px solid #ddd;}

</style>

<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
	   $UpQue = $exm_power->updateQuestion($quesNo,$_POST);
}

	// //Get Total
	// $total = $exm_word->getTotalRows();
	// $next = $total+1;

 ?>

<div class="main">
  <div class="starttest">
			<div class="menu">
		<ul>
			<li><a href="word_queslist.php">word</a></li>
			<li><a href="excel_queslist.php">excel</a></li>
			<li><a href="power_queslist.php">powerpoint</a></li>
		</ul>
		<!-- <a href="word_test.php?q=1" <?php echo $question['quesNo']; ?>" class="btn btn-info" role="button">Start Test</a> -->
		</div>
</div>
<h4>Admin Panel - Add Word Question</h4>

<?php
if (isset($UpQue)) {
	echo $UpQue;
}
?>

<?php
$getQues = $exm_power->getQues($quesNo);
//here we can skip while loop for fetching 1 row data
while ($result = $getQues->fetch_assoc()){
// $result = $getData->fetch_assoc();

 ?>

<div class="adminpanel">

	<form action="" method="post">
		<table class="tr_font_size">
			<tr>
				<td>Question No</td>
				<td>:</td>
				<td><input type="number" name="quesNo" value="<?php	echo	$result['quesNo']	?>"  disabled></td>
			</tr>

			<tr>
				<td>Question</td>
				<td>:</td>
				<td><input type="text"  type="text" name="ques" placeholder="Enter Question..." value="<?php echo $result['ques']; ?>" required></td>
			</tr>
<?php } ?>

<!-- for bind answer to form -->
<?php
$getAns = $exm_power->getAns($quesNo);
  while ($result = $getAns->fetch_assoc()){
    $ans[] = $result['ans'];
    if($result['rightAns'] = 1){
        $right = $result['rightAns'];
    }
  }
   $rightAns = $exm_power->getRightAns($quesNo);
    while($result = $rightAns->fetch_assoc()){
      if($result['T_rightAns'] != ""){
        $AnsID = $result['T_rightAns'];
      }
    }
 ?>
			<tr>
				<td>Choice 1</td>
				<td>:</td>
				<td><input type="text"  name="ans1" placeholder="Enter Answer..." value="<?php echo $ans[0]; ?>" required></td>
			</tr>

			<tr>
				<td>Choice 2</td>
				<td>:</td>
				<td><input type="text"  name="ans2" placeholder="Enter Answer..." value="<?php echo $ans[1]; ?>" required></td>
			</tr>

			<tr>
				<td>Choice 3</td>
				<td>:</td>
				<td><input type="text"  name="ans3" placeholder="Enter Answer" value="<?php echo $ans[2]; ?>" required></td>
			</tr>

			<tr>
				<td>Choice 4</td>
				<td>:</td>
				<td><input type="text"  name="ans4" placeholder="Enter Answer..." value="<?php echo $ans[3]; ?>" required></td>
			</tr>

			<tr>
				<td>Right No</td>
				<td>:</td>
				<td><input type="number" value="<?php echo $AnsID; ?>" name="rightAns" required></td>
			</tr>
<!-- end bind anser -->

			<tr>

				<td colspan="3" align="center">
					<input id="add_ques" class="btn btn-success" type="submit" value="Update Question">
				</td>
			</tr>

		</table>


	</form>

</div>


</div>

<?php
//end if of updateQuestion function
include 'inc/footer.php';
?>
