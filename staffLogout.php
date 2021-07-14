<?php
        session_start();
        session_unset();     // unset $_SESSION variable for the run-time
        echo "<script type='text/javascript'>
                alert('Log Out');
                window.location.href = 'staffLoginHTML.php';
                </script>";

        session_destroy();

?>
