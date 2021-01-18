<link rel="stylesheet" href="css/admin.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Result_Exam.php');
  include_once ($filepath.'/../classes/Exam.php');
	$exm_result = new Result_Exam();
?>
<script src='js/all.js'></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('[tool-tip-toggle="tooltip-demo"]').tooltip({
            placement : 'top'
        });
      });

</script>

<?php
if (isset($_GET['delres'])) {
		$result_id = (int)$_GET['delres'];
		$delResult = $exm_result->deleteResult($result_id);
	}
  //for update data in table question
// if (isset($_GET['upque'])) {
//   		$quesno = (int)$_GET['upque'];
//       Session::set('quesNo',$quesno);
//       header("Location:word_ques_update.php");
// 	}
if (isset($_GET['print'])) {
  		$result_id = (int)$_GET['print'];
      Session::set('result_id',$result_id);
      header("Location:report_pdf_each.php");
	}
 ?>

<div class="main_result">
	<h3>List of Test Result</h3>
  <!-- <a class="btn btn-info" href="report_pdf_all.php" target="_blank">Print ALL</a> -->
	<?php
		if (isset($delQue)) {
			echo $delQue;
		}
    //for update data in table question
    if (isset($UpQue)) {
			echo $UpQue;
		}

    if (isset($Print)) {
			echo $Print;
		}
	 ?>


<div class="quelist">
	<table class="tblone">
		<tr class="th-align">
			<th width="6%" style="text-align:center;">No</th>
      <th width="15%" align="mid" class="text-center">Name</th>
      <th width="12%" align="mid" class="text-center">Word</th>
      <th width="12%" align="mid" class="text-center">Excel</th>
      <th width="12%" align="mid" class="text-center">PowerPoint</th>
			<th width="14%" align="mid" class="text-center">Total Score</th>
			<th width="12%" align="mid" class="text-center">Grade</th>
      <th width="12%" align="mid" class="text-center">Action</th>
		</tr>
<?php

$getData = $exm_result->getResult();
if ($getData) {
	while ($result = $getData->fetch_assoc()) {
 ?>
		<tr class="tr-align">
			<td><?php echo $result['result_id']; ?></td>
      <td><?php echo $result['name']; ?></td>
			<td><?php echo $result['word_score'];?></td>
      <td><?php echo $result['excel_score'];?></td>
      <td><?php echo $result['power_score'];?></td>
      <td><?php echo $result['total_score'];?></td>
      <td><?php echo $result['grade'];?></td>
			<td>

				<a onclick="return confirm('Are You Sure to Remove')" color= "#031A30" href="?delres=<?php echo $result['result_id'];?>"> <i tool-tip-toggle="tooltip-demo" data-original-title="Delete" class="fas fa-trash-alt" style="font-size:20px"></i> </a>
      &nbsp;|&nbsp; <a href="?print=<?php echo $result['result_id'];?>" target="_blank"> <i tool-tip-toggle="tooltip-demo" data-original-title="Print" class="fas fa-print" style="font-size:20px"></i> </a>

			</td>

		</tr>

	<?php  }} ?>

	</table>

</div>


</div>
<?php include 'inc/footer.php'; ?>
