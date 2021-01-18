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
		$total = $exm_excel->getTotalRows();
	//	echo $total;
?>
<div class="main">
<h1>You are done!</h1>

<div class="starttest">
	<p>Congrats! You have just competed the test!!!</p>
	<p>Final Score:

		<?php
		if (isset($_SESSION['score'])) {
			echo $_SESSION['score']."/".$total;
			$data = $_SESSION['score'];
			$exm->addExcelScore($data);
			unset($_SESSION['score']);
		}
		 ?>



	</p>

	<div class="btn-next-exam" style="margin: 120px 310px 0 310px;">
		<!-- <a style="background-color:#28a745; color:#fff" href="word_ans_view.php" class="btn btn-success">View Ans</a> -->
		<!-- <a href="start_test.php">Start Again</a> -->
		<a style="background-color:#28a745; color:#fff" href="power_test.php?q=1" class="btn btn-success">Next to Power Point Test</a>
	</div>
</div>

  </div>
<?php include 'inc/footer.php'; ?>
