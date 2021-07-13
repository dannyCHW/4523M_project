<?php 
        $isLogin = false;
		session_start();

		
		if($_SESSION != null)
		{
			try{
				$cusEmail = $_SESSION['customerEmail'];
           	 	$isLogin = true;
			}catch(Exception $e){
				
			}
			
		}
		
		
	?>