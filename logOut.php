<?php 
    session_start();
    if($_SESSION['customerEmail'] != null)
    {
        unset($_SESSION['customerEmail']);     // unset $_SESSION variable for the run-time 
        session_unset();
    }

    echo "<script type='text/javascript'>
            alert('Log Out');
            window.location.href = 'indexHtml.php';
            </script>";
?>