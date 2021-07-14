<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>First Page</title>
	<meta name = "viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href="css/style.css">
	<link rel = "stylesheet" href="css/verify.css">
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
  <br /><br /><br />
  <h1>View Finished Record:</h1>
  <!-- 偷塞位 -->

      <!-- form -->
    <div class="form">
        <table class="content-table">
          <form  action="verify.php" method="POST" id="verifyForm">
            <input type="number"  name="billNumber" placeholder="Confirmed Air Waybill Number" style="width: 20%;" required/>
						<input type="number"  name="weight"  placeholder="Actual Weight" style="width: 10%;" min="0" max="10" required><br/>
            <input style="width:15%;"id="accept" name = "accept" type="submit" value="Submit" class="accept" />
        </form>
    </div>
      <!-- form end -->

		<?php
			require_once('connectDB.php');
			$sql = "SELECT * FROM airwaybill ORDER BY airWaybillNo ASC ";
		 	$rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
			$rc = mysqli_fetch_assoc($rs);
			echo"<thead>
							<tr>
								<th>Bill NO.</th><th>Sender's Email</th><th>Receiver Name</th><th>Receiver Phone</th><th>Receiver Address</th><th>Location ID</th>
							</tr>
					<tbody>";
			while($rc = mysqli_fetch_array($rs)){
				if($rc['staffID']=== NULL){
				printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$rc['airWaybillNo'],$rc['customerEmail'],$rc['receiverName'],$rc['receiverPhoneNumber'],$rc['receiverAddress'],$rc['locationID']);
				}
			}
		echo '</tbody></thead>';
		mysqli_free_result($rs);
		mysqli_close($conn);
		?>
</body>
</html>
