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

	<?php

	if ($verify) {
		include 'verifyHTML.php';
	} else {
		include 'menu.php'; /// not done
	}

	?>


	<nav class="head">
		<label class = "logo">EDE Delivery</label>
			<ul>
				<li><a href="verify.html">Verify</a></li>
				<li><a href="update.html">Update</a></li>
				<li><a href="report.html">View Report</a></li>
				<li><a href="cancel.html">Cancel Order</a></li>
        <li><a href="stafflogin.html">Logout</a></li>
			</ul>
			<label id="icon">
				<i class="fas fa-bars"></i>
			</label>
	</nav>
<!-- 偷塞位 -->
  <br />
  <h1>View Finished Record:</h1>
  <!-- 偷塞位 -->

      <!-- form -->
    <div class="form">
        <table class="content-table">
          <form  action="verify.php" method="POST" id="verifyForm">
            <input type="number"  name="billNumber" placeholder="Confirmed Air Waybill Number" style="width: 20%;" required/>
						<input type="number"  name="weight"  placeholder="Actual Weight" style="width: 10%;" min="0" max="1000" required><br/>
            <input style="width:15%;"id="accept" name = "accept" type="submit" value="Accept" class="accept" />
        </form>
    </div>
      <!-- form end -->

    <thead>

      <tr>
        <th>Bill NO.</th><th>Sender's Email</th><th>Receiver Name</th><th>Receiver Phone</th><th>Receiver Address</th><th>Location ID</th>
      </tr>
      <!-- fake record -->
      <tbody>
        <tr>
          <td>00000047</td><td>simonhkg2002@gmail.com</td><td>Hotchner Cheung</td><td>95567188</td><td>R.Home</td><td>xxxx</td>
        </tr>
        <tr>
          <td>00000056</td><td>simonhkg2002@gmail.com</td><td>Hotchner Cheung</td><td>95567188</td><td>R.Home</td><td>xxxx</td>
        </tr>
        <tr>
          <td>00000061</td><td>tomy0711@gmail.com</td><td>Tomy Lee</td><td>27596115</td><td>R.Home</td><td>xxxx</td>
        </tr>

      </tbody>
      <!-- fake record end -->
    </thead>
</body>
</html>
