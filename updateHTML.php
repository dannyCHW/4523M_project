<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>First Page</title>
	<meta name = "viewport" content="width=device-width, initial-scale=1.0">
	<link rel = "stylesheet" href="css/update.css">
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
				<li><a href="verify.html">Verify</a></li>
				<li><a href="update.html">Update</a></li>
				<li><a href="report.html">View Report</a></li>
			  <li><a href="cancel.html">Cancel Order</a></li>
        <li><a href="staffLogout.php">Logout</a></li>
			</ul>
			<label id="icon">
				<i class="fas fa-bars"></i>
			</label>
	</nav>
<!-- 偷塞位 -->
  <br/>  <br/>  <br/>  <br/>
  <h1>Update Order Location / Status:</h1>
  <br /><br /><br />
  <!-- 偷塞位 -->

  <!-- form -->
  <div class="form">
    <form action="update.php" method="post" class="updateForm">

      <input type="number"  name="billNumber" placeholder="Air Waybill Number" required/> <br />

      <input list="status" placeholder="Newest Status" name="input_status" autocomplete="off" required/>
      <datalist id="status">
        <option value="In Transit">
        <option value="Delivering">
        <option value="Completed">
      </datalist><br/>

      <input list="location" placeholder="Newest Location" name="input_location" autocomplete="off" required/>
			<datalist id="location">
        <option value="China Shanghao">
        <option value="Japan">
        <option value="Australia">
      </datalist><br/>

      <input type="submit" value="Change" class="submit" name="update"/>


  </form>
  </div>



</body>
</html>
