<?php
  
    $staffLogin = false;
    session_start();
    if ($_SESSION != null) {
        try {
            if (isset($_SESSION['staffID'])) {
                $stfID = $_SESSION['staffID'];
                $staffLogin = true;
            }
        } catch (Exception $e) {
        }
    }

	?>
