<?php 
        $isLogin = false;
		session_start();
		if($_SESSION['customerEmail'] != null)
		{
			$session = $_SESSION['customerEmail'];
			echo "<script type='text/javascript'>
        	alert('Have Session');
        	</script>";
            $isLogin = true;
		}
	?>