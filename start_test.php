<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
$question = $exm_word->getQuestion();
$total = $exm_word->getTotalRows();
?>
<div class="main">
	<h3>Welcome to Online Examination System</h3>
		<div class="starttest">
				<h2>Test your knowledge</h2>
				<p>This is multiple choice quiz to test your knowledge</p>

				<ul>
						<li><strong>Number of Questions:</strong> <?php echo $total; ?></li>
				<br><li style="margin-right:500px;"><strong>Question Type:</strong> Multiple Choice</li>
				</ul>

				<div style="padding-left: 340px;" class="btn-start">
						<a style="margin-top: 90px; width: 120px;background-color:#28a745;color:#fff" href="word_test.php?q=1" class="btn btn-success" role="button">Start Test</a>
				</div>
		</div>
</div>
<?php include 'inc/footer.php'; ?>
