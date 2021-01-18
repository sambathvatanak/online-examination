<!-- disable back button on browser -->
<script>
		history.pushState(null, document.title, location.href);
		window.addEventListener('popstate', function (event)
			{
				console.log("asd");
				history.pushState(null, document.title, location.href);
			});
</script>
<script src="js/countdown.js" type="text/javascript">
		console.log("hello");
</script>
<?php include 'inc/header.php'; ?>
<script> countdown(); </script>
<p id="demo"></p>
<?php
Session::checkSession();
header("refresh:1800;url=word_final.php");


		if (isset($_GET['q'])) {
			$number = (int) $_GET['q'];
		}else{
			header("Location:Word_Exam.php");
		}

$total = $exm_word->getTotalRows();
$question = $exm_word->getQuesByNumber($number);
?>

<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$process = $pro_word->processData($_POST);
	}

 ?>

<div class="main">
	<h3>Word Question <?php echo $question['quesNo']; ?> of <?php echo $total; ?></h3>

	<div class="test">
		<form method="post" action="">
		<table>
			<tr>
				<td colspan="2">
					<div>
				 		<h4 >Question <?php echo $question['quesNo']; ?>: <?php echo $question['ques']; ?></h4>
					</div>
				</td>
			</tr>

			<?php

				$answer = $exm_word->getAnswer($number);
				if ($answer) {
					while ($result = $answer->fetch_assoc()) {

			 ?>

			<tr>
				<td>
				 <input type="radio" name="ans" value="<?php echo $result['id']; ?>" required /><?php echo $result['ans'];?>
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
