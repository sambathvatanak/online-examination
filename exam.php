<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
?>
<div class="main">
<h3>Welcome to Online Examination System</h3>
<div class="divide-segment">
		<div class="segment">
				<h2>Start Test</h2>
				<!-- <ul>
					<li><a href="start_test.php">Start Now</a></li>
				</ul> -->
					<a style="margin-top: 105px;width: 130px;text-decoration: none;color:#fff" href="start_test.php" class="btn btn-success">Start Now</a>
		</div>
</div>
<?php include 'inc/footer.php'; ?>
