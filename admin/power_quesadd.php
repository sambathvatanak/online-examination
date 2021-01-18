<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Power_Exam.php');
	$exm = new Power_Exam();
?>
<style>
.adminpanel{width: 480px;color: #999;margin: 20px auto 0;padding: 30px;border: 1px solid #ddd;}

</style>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$addQue = $exm->addQuestions($_POST);
	}
	//Get Total
	$total = $exm->getTotalRows();
	$next = $total+1;

 ?>

<div class="main">
<h3>Add Power Point Question</h3>

<?php
if (isset($addQue)) {
	echo $addQue;
}

 ?>

<div class="adminpanel">

	<form action="" method="post">
		<table class="tr_font_size">
			<tr>
				<td>Question No</td>
				<td>:</td>
				<td><input type="number" value="<?php
					if(isset($next)){
						echo $next;
					}

					 ?>"  name="quesNo"></td>
			</tr>

			<tr>
				<td>Question</td>
				<td>:</td>
				<td><input type="text"  name="ques" placeholder="Enter Question..." required></td>
			</tr>

			<tr>
				<td>Choice 1</td>
				<td>:</td>
				<td><input type="text"  name="ans1" placeholder="Enter Question..." required></td>
			</tr>

			<tr>
				<td>Choice 2</td>
				<td>:</td>
				<td><input type="text"  name="ans2" placeholder="Enter Question..." required></td>
			</tr>

			<tr>
				<td>Choice 3</td>
				<td>:</td>
				<td><input type="text"  name="ans3" placeholder="Enter Question..." required></td>
			</tr>

			<tr>
				<td>Choice 4</td>
				<td>:</td>
				<td><input type="text"  name="ans4" placeholder="Enter Question..." required></td>
			</tr>

			<tr>
				<td>Right No</td>
				<td>:</td>
				<td><input type="number"  name="rightAns" required></td>
			</tr>

			<tr>

				<td colspan="3" align="center">
					<input id="add_ques" class="btn btn-success" type="submit" value="Add Question">
				</td>
			</tr>

		</table>


	</form>

</div>


</div>
<?php include 'inc/footer.php'; ?>
