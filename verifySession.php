<?php
    $verify = false;
		session_start();
		if($_SESSION['staffID'] != null)
		{
			$session = $_SESSION['staffID'];
			echo "<script type='text/javascript'>
        	alert('Have Session');
        	</script>";
            $isLogin = true;
		}el
	?>
