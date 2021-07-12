<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<meta name = "viewport" content="width=device-width, initial-scale=1.0">
	<script src="http://kit.fontawesome.com/a076d05399.js"></script>
	<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
	<link rel = "stylesheet" href="css/style.css">
	<script>
	$(document).ready(function(){
		$('#icon').click(function(){
			$('ul').toggleClass('show');
		});
	});
	</script>
</head>


<body>
	<?php include 'menu.php';?>



</br></br></br>
	<center>
		<div class="main">
		  <form onsubmit="myFunction()">
			<div class="container">
			  <h1 class="r_text">Register</h1>
			  <p class="r_text">Please fill in this form to create an account.</p>
			  <hr>

			  <label for="email"><b></b></label>
			  <input type="text" placeholder="Email" name="email" id="email"
			  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="following order: characters@characters.domain"required>

			  <br>
			  <label for="Name"><b></b></label>
			  <input type="text" placeholder="Name" name="name" id="name" required>

			  <br>
			  <label for="Phone Number"><b></b></label>
			  <input type="text" placeholder="Phone Number" name="phoneNum" id="phoneNum"
			  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>

			  <br>
			  <label for="address"><b></b></label>
			  <input type="text" placeholder="Address" name="address" id="address" required>

			  <br>
			  <label for="psw"><b></b></label>
			  <input type="password" placeholder="Password" name="psw" id="psw"
				pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
				title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
				required>

			  <br>
			  <label for="psw-repeat"><b></b></label>
			  <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
			  <hr>

			  <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
			  <button type="submit" class="registerbtn">Register</button>
			</div>


		  </form>
		</div>
	  </center>


</body>


</html>