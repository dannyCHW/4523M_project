<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>First Page</title>
	<meta name = "viewport" content="width=device-width, initial-scale=1.0">
	<link rel = "stylesheet" href="css/style.css">
  	<link rel = "stylesheet" href="css/report.css">
	<script src="http://kit.fontawesome.com/a076d05399.js"></script>
	<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
	<script>
	$(document).ready(function(){
		$('#icon').click(function(){
			$('ul').toggleClass('show');
		});
	});
	</script>
</head>


<body>

	<?php include 'staffLoginSession.php'; ?>

	<?php

	if ($staffLogin) {
	} else {
		echo "<script type='text/javascript'>
				alert('You need to login First');
				window.location.href = 'staffLoginHTML.php';
				</script>";
	}
	?>

	<nav class="head">
		<label class = "logo">EDE Delivery</label>
			<ul>
				<li><a href="verifyHTML.php">Verify</a></li>
				<li><a href="updateHTML.php">Update</a></li>
				<li><a href="reportHTML.php">View Report</a></li>
				<li><a href="cancelHTML.php">Cancel Order</a></li>
        <li><a href="staffLogout.php">Logout</a></li>
			</ul>
			<label id="icon">
				<i class="fas fa-bars"></i>
			</label>
	</nav>

  <br/><br/><br/><br/>
  <h1>View Reprot:</h1>

	<div class="search">
		<form action="reportDB.php" method="post" class="searchForm">
			<input name="Generate" type="submit" value="Generate"class="btnSearch" />
		</form>
	</div>

</body>
</html>