<!DOCTYPE html>
<html>
<head>
	<title>ProGeeks Cup 2.0</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<?php

	// Import the file where we defined the connection to Database.
	//require_once "connection.php";
  include_once("../lib/Database.php");
	$db = new Database;
	$limit = 1; // Number of entries to show in a page.
	// Look for a GET variable page if not found default is 1.
	if (isset($_GET["page"])) {
	$pn = $_GET["page"];
	}
	else {
	$pn=1;
	};

	$start_from = ($pn-1) * $limit;

	$sql = "SELECT * FROM tbl_user LIMIT $start_from, $limit";
	$rs_result = $db->select($sql);

?>
<div class="container">
	<br>
	<div>
	<h1>ProGeeks Cup 2.0</h1>
	<p>This page is just for demonstration of
				Basic Pagination using PHP.</p>
	<table class="table table-striped table-condensed table-bordered">
		<thead>
		<tr>
		<th width="10%">Rank</th>
		<th>Name</th>
		<th>College</th>
		<th>Score</th>
		</tr>
		</thead>
		<tbody>
		<?php
		while ($row = mysqli_fetch_array($rs_result)) {
				// Display each field of the records.
		?>
		<tr>
		<td><?php echo $row["userid"]; ?></td>
		<td><?php echo $row["name"]; ?></td>
		<td><?php echo $row["username"]; ?></td>
		<td><?php echo $row["email"]; ?></td>
		</tr>
		<?php
		};
		?>
		</tbody>
	</table>
	<ul class="pagination">
	<?php
		$sql = "SELECT COUNT(*) FROM tbl_user";
		$rs_result = $db->select($sql);
		$row = mysqli_fetch_row($rs_result);
		$total_records = $row[0];

		// Number of pages required.
		$total_pages = ceil($total_records / $limit);
		$pagLink = "";
		for ($i=1; $i<=$total_pages; $i++) {
		if ($i==$pn) {
			$pagLink .= "<li class='active'><a href='?page="
												.$i."'>".$i."</a></li>";
		}
		else {
			$pagLink .= "<li><a href='?page=".$i."'>
												".$i."</a></li>";
		}
		};
		echo $pagLink;
	?>
	</ul>
	</div>
</div>
</body>
</html>
