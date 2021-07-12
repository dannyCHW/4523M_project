<?php 
        $isLogin = false;
		session_start();

		
		if($_SESSION != null)
		{
			try{
				$session = $_SESSION['customerEmail'];
				echo "<script type='text/javascript'>
        		alert('Have Session');
        		</script>";
           	 	$isLogin = true;
			}catch(Exception $e){
				
			}
			
		}
		
		
	?>