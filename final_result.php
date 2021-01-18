<!-- disable back button on browser -->
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
//
?>
<?php
	//	echo $total;
?>
<div class="main">
<h1>You are done!</h1>

<div class="starttest">
	<?php
			$word_row    = $exm_word->getTotalRows();
			$excel_row   = $exm_excel->getTotalRows();
			$power_row   = $exm_power->getTotalRows();

			$word_score  = $exm->getWordScore();
			$excel_score = $exm->getExcelScore();
			$power_score = $exm->getPowerScore();

			$total_score = $exm->getTotalScore();
			$exm->addTotalScore($total_score);
	?>
	<p>Congrats! You have just competed the test!!!</p>
	<p>Your word score is: <?php echo $word_score ?>/<?php echo $word_row; ?></p>
	<p>Your excel score is: <?php echo $excel_score ?>/<?php echo $excel_row; ?></p>
	<p>Your powerpoint score is: <?php echo $power_score ?>/<?php echo $power_row; ?></p>
	<p>Your total score and grade score is: <?php echo $total_score ?> </p>

		<a style="background-color:#28a745; color:#fff;margin-left:300px;margin-right:300px;" href="exam.php" class="btn btn-success">Exit</a>
	</div>
</div>

  </div>
<?php include 'inc/footer.php'; ?>
