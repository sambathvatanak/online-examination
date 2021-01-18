<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
header("refresh:30;url=excel_test.php?q=1");
$total = $exm_word->getTotalRows();


 ?>
<div class="main">
<h3>All Question & Ans:<?php echo $total; ?></h3>
	<div class="viewans">
		<table>
			<?php
			$getQues = $exm_word->getQueByOrder();
			if ($getQues) {
				while ($question = $getQues->fetch_assoc()) {


			 ?>
			<tr>
				<td colspan="2">
				 <h5>Que <?php echo $question['quesNo']; ?>: <?php echo $question['ques']; ?></h5>
				</td>
			</tr>

			<?php
				$number = $question['quesNo'];
				$answer = $exm_word->getAnswer($number);
				if ($answer) {
					while ($result = $answer->fetch_assoc()) {

			 ?>

			<tr>
				<td>
				 <input type="radio"/>
				 <?php
				 if ($result['rightAns'] == '1') {
				 	echo "<span style='color:blue'>".$result['ans']."</span>";
				 }else{
				 echo $result['ans'];
				}
				 ?>
				</td>
			</tr>
		<?php }} ?>
  <?php }} ?>


		</table>
		<a href="start_test.php">Start Again</a>
</div>
 </div>
<?php include 'inc/footer.php'; ?>
