<script>
		history.pushState(null, document.title, location.href);
		window.addEventListener('popstate', function (event)
			{
				console.log("asd");
				history.pushState(null, document.title, location.href);
			});
</script>
<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();

if ($_GET['q'] == null)
{
		$_GET['q'] = 1;
}else{
		if (isset($_GET['q'])) {
			$number = (int) $_GET['q'];
		}else{
			header("Location:Power_Exam.php");
		}
}

$total = $exm_power->getTotalRows();
$question = $exm_power->getQuesByNumber($number);
?>

<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$process = $pro_power->processData($_POST);
	}

 ?>

<div class="main">
<h3>PowerPoint Question <?php echo $question['quesNo']; ?> of <?php echo $total; ?></h3>
	<div class="test">
		<form method="post" action="">
		<table>
			<tr>
				<td colspan="2">
				 <h4>Question <?php echo $question['quesNo']; ?>: <?php echo $question['ques']; ?></h4>
				</td>
			</tr>

			<?php

				$answer = $exm_power->getAnswer($number);
				if ($answer) {
					while ($result = $answer->fetch_assoc()) {

			 ?>

			<tr>
				<td>
				 <input type="radio" name="ans" value="<?php echo $result['id']; ?>" required /><?php echo $result['ans']; ?>
				</td>
			</tr>
		<?php }} ?>

			<tr>
			  <td>
				<input type="submit" name="submit" class="btn btn-info" value="Next Question"/>
				<input type="hidden" name="number" value="<?php echo $number; ?>" />
			</td>
			</tr>

		</table>
	</form>
</div>
 </div>
<?php include 'inc/footer.php'; ?>
